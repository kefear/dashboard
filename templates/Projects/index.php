<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="projects index content">
    <h3><?= __('Projects') ?></h3>
    <div class="button-wrapper">
        <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button button-outline']) ?>
        <?= $this->Html->link(__('Active'), ['action' => 'index', 'active'], ['class' => 'button button-clear']) ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('manager_id') ?></th>
                    <th><?= $this->Paginator->sort('team_id') ?></th>
                    <th><?= $this->Paginator->sort('date_start') ?></th>
                    <th><?= $this->Paginator->sort('date_due') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $this->Html->link($project->name, ['action' => 'view', $project->id]) ?></td>
                    <td><?= $project->has('manager') ? $project->manager->name : __('Not assigned') ?></td>
                    <td><?= $project->has('team') ? $this->Html->link($project->team->name, ['controller' => 'Teams', 'action' => 'view', $project->team->id]) : __('Not assigned') ?></td>
                    <td><?= h($project->date_start) ?></td>
                    <td><?= h($project->date_due) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
