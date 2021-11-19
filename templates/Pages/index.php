<div class="employees index content">
    <div class="button-wrapper">
        <?= $this->Html->link(__('Department structure'), ['controller' => 'departments', 'action' => 'structure'], ['class' => 'button button-outline']) ?>
    </div>
    <h3><?= __('Employees') ?></h3>
    <table class='table table-responsive'>
        <?php foreach ($statuses as $status) :?>
            <?php if (count($status->employees) > 0) :?>
                <tr>
                    <td><?= $status->name ?></td>
                    <td><?= count($status->employees) ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</div>