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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $telegramUpdate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $telegramUpdate->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Telegram Updates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telegramUpdates form content">
            <?= $this->Form->create($telegramUpdate) ?>
            <fieldset>
                <legend><?= __('Edit Telegram Update') ?></legend>
                <?php
                    echo $this->Form->control('update_id');
                    echo $this->Form->control('message');
                    echo $this->Form->control('channel_post');
                    echo $this->Form->control('inline_query');
                    echo $this->Form->control('chosen_inline_result');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
