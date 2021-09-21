<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employees view content">
            <h3><?= h($employee->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Team') ?></th>
                    <td><?= $employee->has('team') ? $this->Html->link($employee->team->name, ['controller' => 'Teams', 'action' => 'view', $employee->team->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $employee->has('role') ? $this->Html->link($employee->role->name, ['controller' => 'Roles', 'action' => 'view', $employee->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($employee->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Report Id') ?></th>
                    <td><?= $this->Number->format($employee->report_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salary') ?></th>
                    <td><?= $this->Number->format($employee->salary) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dob') ?></th>
                    <td><?= h($employee->dob) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($employee->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($employee->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Email') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($employee->email)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Phone') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($employee->phone)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Status Changes') ?></h4>
                <?php if (!empty($employee->status_changes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Employee Id') ?></th>
                            <th><?= __('Old Status Id') ?></th>
                            <th><?= __('New Status Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($employee->status_changes as $statusChanges) : ?>
                        <tr>
                            <td><?= h($statusChanges->id) ?></td>
                            <td><?= h($statusChanges->created) ?></td>
                            <td><?= h($statusChanges->employee_id) ?></td>
                            <td><?= h($statusChanges->old_status_id) ?></td>
                            <td><?= h($statusChanges->new_status_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StatusChanges', 'action' => 'view', $statusChanges->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StatusChanges', 'action' => 'edit', $statusChanges->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StatusChanges', 'action' => 'delete', $statusChanges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statusChanges->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
