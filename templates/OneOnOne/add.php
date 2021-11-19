<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OneOnOne $oneOnOne
 * @var \Cake\Collection\CollectionInterface|string[] $employees
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List One On One'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="oneOnOne form content">
            <?= $this->Form->create($oneOnOne) ?>
            <fieldset>
                <legend><?= __('Add One On One') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('employee_id', ['options' => $employees]);
                    echo $this->Form->control('manager_id');
                    echo $this->Form->control('agenda');
                    echo $this->Form->control('date', ['empty' => true]);
                    echo $this->Form->control('duration');
                    echo $this->Form->control('resume');
                    echo $this->Form->control('manager_notes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
