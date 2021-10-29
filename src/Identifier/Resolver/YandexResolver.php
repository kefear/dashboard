<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         1.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Identifier\Resolver;

use Cake\Core\InstanceConfigTrait;
use Cake\ORM\Locator\LocatorAwareTrait;
use Authentication\Identifier\Resolver\ResolverInterface;
use Cake\Http\Client;

class YandexResolver implements ResolverInterface
{
    use InstanceConfigTrait;
    use LocatorAwareTrait;

    /**
     * Default configuration.
     * - `userModel` The alias for users table, defaults to Users.
     * - `finder` The finder method to use to fetch user record. Defaults to 'all'.
     *   You can set finder name as string or an array where key is finder name and value
     *   is an array passed to `Table::find()` options.
     *   E.g. ['finderName' => ['some_finder_option' => 'some_value']]
     *
     * @var array
     */
    protected $_defaultConfig = [
        'userModel'     => 'Users',
        'finder'        => 'login',
    ];

    /**
     * Constructor.
     *
     * @param array $config Config array.
     */
    public function __construct(array $config = [])
    {
        $this->setConfig($this->_defaultConfig);
    }

    /**
     * @inheritDoc
     */
    public function find(array $conditions, $type = self::TYPE_AND)
    {
        $table = $this->getTableLocator()->get($this->_config['userModel']);
        $query = $table->query();
        $result = $query->find($this->_config['finder'], $conditions)->first();
        if (!empty($result)) {
            return $result;
        }

        // get user from yandex
        $http = new Client();
        $response = $http->get('https://login.yandex.ru/info', ['format' => 'json'], [
            'headers' => ['Authorization' => "OAuth {$conditions['token']}"]
        ]);
        // if yandex is not error, create new user 
        if ($response->isOk()) 
        {
            $user = $table->find()->where(['Users.y_id' => $response->getJson()['id']])->first();
            if (!empty($user)) {
                $user->token = $conditions['token'];
                $table->save($user);
                return $user;
            }
            if ($response->getJson()['login'] == 'yevgeniy.gavrilov@mechta.kz') 
            {
                $user               = $table->newEmptyEntity();
                $user->name         = $response->getJson()['real_name'];
                $user->email        = $response->getJson()['login'];
                $user->y_id         = $response->getJson()['id'];
                $user->y_client_id  = $response->getJson()['client_id'];
                $user->token        = $conditions['token'];
                $table->save($user);
                return $query->where([$type => $where])->first();
            }
            return false;
        }
    }
}
