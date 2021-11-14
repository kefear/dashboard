<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Mechta.kz </span> Dashboard</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link(__('Projects'),       ['controller' => 'projects', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Employees'),      ['controller' => 'employees', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Departments'),    ['controller' => 'departments', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Teams'),          ['controller' => 'teams', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Roles'),          ['controller' => 'roles', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Statuses'),       ['controller' => 'statuses', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Users'),          ['controller' => 'users', 'action' => 'index']) ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
