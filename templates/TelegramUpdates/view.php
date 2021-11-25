<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelegramUpdate $telegramUpdate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Telegram Update'), ['action' => 'edit', $telegramUpdate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Telegram Update'), ['action' => 'delete', $telegramUpdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telegramUpdate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Telegram Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Telegram Update'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telegramUpdates view content">
            <h3><?= h($telegramUpdate->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($telegramUpdate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Id') ?></th>
                    <td><?= $this->Number->format($telegramUpdate->update_id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($telegramUpdate->message)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Channel Post') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($telegramUpdate->channel_post)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Inline Query') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($telegramUpdate->inline_query)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Chosen Inline Result') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($telegramUpdate->chosen_inline_result)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
