<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelegramUpdate[]|\Cake\Collection\CollectionInterface $telegramUpdates
 */
?>
<div class="telegramUpdates index content">
    <?= $this->Html->link(__('New Telegram Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Telegram Updates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('update_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($telegramUpdates as $telegramUpdate): ?>
                <tr>
                    <td><?= $this->Number->format($telegramUpdate->id) ?></td>
                    <td><?= $this->Number->format($telegramUpdate->update_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $telegramUpdate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $telegramUpdate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $telegramUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telegramUpdate->id)]) ?>
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
