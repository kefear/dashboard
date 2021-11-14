<div class="employees index content">
    <div class="button-wrapper">
        <?= $this->Html->link(__('Department structure'), ['controller' => 'departments', 'action' => 'structure'], ['class' => 'button button-outline']) ?>
    </div>
    <table>
        <?php foreach ($employees as $status => $employee) :?>
            <tr>
                <td><?= $status ?></td>
                <td><?= count($employee) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>