<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OneOnOne[]|\Cake\Collection\CollectionInterface $oneOnOne
 */
?>
<div class="oneOnOne index content">
    <?= $this->Html->link(__('New One On One'), ['action' => 'add'], ['class' => 'button float-right button-outline']) ?>
    <h3><?= __('One On One') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('manager_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oneOnOne as $oneOnOne): ?>
                <tr>
                    <td><?= h($oneOnOne->date) ?></td>
                    <td><?= $oneOnOne->has('employee') ? $this->Html->link($oneOnOne->employee->name, ['controller' => 'Employees', 'action' => 'view', $oneOnOne->employee->id]) : '' ?></td>
                    <td><?= $oneOnOne->has('manager') ? $this->Html->link($oneOnOne->manager->name, ['controller' => 'Employees', 'action' => 'view', $oneOnOne->manager->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $oneOnOne->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $oneOnOne->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oneOnOne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oneOnOne->id)]) ?>
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
