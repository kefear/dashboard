<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OneOnOne $oneOnOne
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit One On One'), ['action' => 'edit', $oneOnOne->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete One On One'), ['action' => 'delete', $oneOnOne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oneOnOne->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List One On One'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New One On One'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="oneOnOne view content">
            <h3><?= h($oneOnOne->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Employee') ?></th>
                    <td><?= $oneOnOne->has('employee') ? $this->Html->link($oneOnOne->employee->name, ['controller' => 'Employees', 'action' => 'view', $oneOnOne->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Manager Id') ?></th>
                    <td><?= $this->Html->link($oneOnOne->manager->name, ['controller' => 'Employees', 'action' => 'view', $oneOnOne->manager->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($oneOnOne->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration') ?></th>
                    <td><?= $this->Number->format($oneOnOne->duration) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($oneOnOne->name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Agenda') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($oneOnOne->agenda)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Resume') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($oneOnOne->resume)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Manager Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($oneOnOne->manager_notes)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
