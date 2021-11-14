<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="employees index content">
    <h3><?= __('Employees') ?>: <?= $this->Paginator->counter('{{count}}') ?></h3>
    <div class="button-wrapper">
        <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'button button-outline']) ?>
        <?= $this->Html->link(__('Candidates'), ['action' => 'index', 'candidates'], ['class' => 'button button-clear']) ?>
        <?= $this->Html->link(__('Vacancies'), ['action' => 'index', 'vacancies'], ['class' => 'button button-clear']) ?>
        <?= $this->Html->link(__('Employed'), ['action' => 'index', 'employed'], ['class' => 'button button-clear']) ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('team_id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('report_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee->name ?></td>
                    <td><?= $employee->has('team') ? $this->Html->link($employee->team->name, ['controller' => 'Teams', 'action' => 'view', $employee->team->id]) : '' ?></td>
                    <td><?= $employee->has('role') ? $this->Html->link($employee->role->name, ['controller' => 'Roles', 'action' => 'view', $employee->role->id]) : '' ?></td>
                    <td><?= $employee->has('report_id') ? $this->Html->link($employee->report->name, ['controller' => 'Employees', 'action' => 'view', $employee->report->id]) : '' ?></td>
                    <td><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                    </td>
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
