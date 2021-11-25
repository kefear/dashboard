<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TelegramUpdate Entity
 *
 * @property int $id
 * @property int $update_id
 * @property string|null $message
 * @property string|null $channel_post
 * @property string|null $inline_query
 * @property string|null $chosen_inline_result
 *
 * @property \App\Model\Entity\Update $update
 */
class TelegramUpdate extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'update_id' => true,
        'message' => true,
        'channel_post' => true,
        'inline_query' => true,
        'chosen_inline_result' => true,
        'update' => true,
    ];
}
