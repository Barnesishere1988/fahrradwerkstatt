<?php

include (__DIR__ . '/../src/controller/WorkorderController.php');

$wo = new WorkorderController();
$workorders = $wo->showAll();
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
            <th scope="col">Marke</th>
            <th scope="col">Modell</th>
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
                    <td colspan="10" class="text-center">Keine Aufträge vorhanden</td>
                </tr>
            <?php else : ?>
                <?php foreach ($workorders as $workorder) : ?>
                    <tr>
                        <th scope="row"><?= $workorder['ID'] ?></th>
                        <td><?= $workorder['firstname'] ?> <?= $workorder['lastname'] ?></td>
                        <td><?= $workorder['phone'] ?></td>
                        <td><?= $workorder['description'] ?></td>
                        <td><?= $workorder['brand'] ?></td>
                        <td><?= $workorder['modell'] ?></td>
                        <td><?= $workorder['checkindate'] ?></td>
                        <td><?= $workorder['checkoutdate'] ?? '-' ?></td>
                        <td><?= $workorder['repaicost'] ?? '-' ?></td>
                        <td>
                            <a href="/edit/<?= $workorder['ID'] ?>" class="btn btn-primary btn-sm">Bearbeiten</a>
                            <a href="/delete/<?= $workorder['ID'] ?>" class="btn btn-danger btn-sm">Löschen</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';