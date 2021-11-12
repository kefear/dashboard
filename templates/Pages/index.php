<div class="employees index content">
    <table>
        <?php foreach ($employees as $status => $employee) :?>
            <tr>
                <td><?= $status ?></td>
                <td><?= count($employee) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>