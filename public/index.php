<?php

include (__DIR__ . '/../src/controller/WorkorderController.php');

$wo = new WorkorderController();

if(isset($_POST['delete'])) {
    $wo->delete($_POST);
}

if(isset($_GET['category'])) {
    $workorders = $wo->showSearch($_GET);
} elseif(isset($_GET['filter'])) {
    $workorders = $wo->showFilter($_GET);
} else {
    $workorders = $wo->showAll();
}

function desc_status($status) {
    switch($status) {
        case 0:
            return "Offen";
        case 1:
            return "In Bearbeitung";
            break;
        case 2:
            return "Abgeschlossen";
        case 3:
            return "Abgeholt";
            break;
        default:
            return "unbekannt";
            break;
    }
}
?>

<?php 
ob_start();
?>
<div class="row">
    <div class="col">
        <form method="GET">
            <label for="filter" class="form-label">Filter</label>
            <select name="filter" id="filter" onchange="this.form.submit()">
                <option value="">Alle</option>
                <option value="0" <?= isset($_GET['filter']) && $_GET['filter'] == 0 ? 'selected' : '' ?>>Offen</option>
                <option value="1" <?= isset($_GET['filter']) && $_GET['filter'] == 1 ? 'selected' : '' ?>>In Bearbeitung</option>
                <option value="2" <?= isset($_GET['filter']) && $_GET['filter'] == 2 ? 'selected' : '' ?>>Abgeschlossen</option>
                <option value="3" <?= isset($_GET['filter']) && $_GET['filter'] == 3 ? 'selected' : '' ?>>Abgeholt</option>
            </select>
        </form>
    </div>
    <div class="col text-end">
        <form method="GET">
            <select name="category" id="category">
                <option value="id">Auftragsnummer</option>
                <option value="person">Kundenname</option>
            </select>
            <input type="text" class="form-input" name="phrase" id="phrase">
            <button type="submit" class="btn btn-primary">Suchen</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
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
            <th scope="col">Status</th>
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
                            <?= desc_status($workorder['status']) ?? '-' ?></td>
                        <td>
                            <a href="/edit/<?= $workorder['ID'] ?>" class="btn btn-primary btn-sm">Bearbeiten</a>
                            <?php if($workorder['status'] == 0) : ?>
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $workorder['ID'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Soll dieser Eintrag wirklich gelöscht werden?');">Löschen</a>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>
    </div>
</div>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';