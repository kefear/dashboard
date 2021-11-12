<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Departments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Department'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departments view content">
            <h3><?= __('Structure') ?></h3>
            <ul>
                <?php foreach ($structure as $department) :?>
                    <li><?= $department->name ?></li>
                    <?php if (!empty($department->teams)) :?>
                        <ul>
                            <?php foreach ($department->teams as $team) :?>
                                <li><?= $team->name ?></li>
                                <?php if (!empty($team->employees)) :?>
                                    <ul>
                                        <?php foreach($team->employees as $employee) :?>
                                            <li><?= $employee->name ?> — <?= $employee->role->name ?></li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>