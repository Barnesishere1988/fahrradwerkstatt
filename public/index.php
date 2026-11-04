<?php



$workorders = [];
?>

<?php 
ob_start();
?>
<table class="table">
        <thead>
            <tr>
            <th scope="col">#ANr.</th>
            <th scope="col">Name</th>
            <th scope="col">Telefon</th>
            <th scope="col">Problem</th>
            <th scope="col">Annahmedatum</th>
            <th scope="col">~ Abschlussdatum</th>
            <th scope="col">~ Kosten</th>
            <th scope="col">Aktionen</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($workorders) == 0) : ?>
                <tr>
                    <td colspan="8" class="text-center">Keine Aufträge vorhanden</td>
                </tr>
            <?php else : ?>
                <?php foreach ($workorders as $workorder) : ?>
                    <tr>
                        <th scope="row"><?= $workorder['id'] ?></th>
                        <td><?= $workorder['name'] ?></td>
                        <td><?= $workorder['phone'] ?></td>
                        <td><?= $workorder['problem'] ?></td>
                        <td><?= $workorder['created_at'] ?></td>
                        <td><?= $workorder['completed_at'] ?? '-' ?></td>
                        <td><?= $workorder['costs'] ?? '-' ?></td>
                        <td>
                            <a href="/edit/<?= $workorder['id'] ?>" class="btn btn-primary btn-sm">Bearbeiten</a>
                            <a href="/delete/<?= $workorder['id'] ?>" class="btn btn-danger btn-sm">Löschen</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';