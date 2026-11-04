<?php 

include (__DIR__ . '/../src/controller/WorkorderController.php');

$workorderController = new WorkorderController();

if(isset($_POST['editworkorder'])) {
    $result = $workorderController->edit($_POST);
    if($result['type'] == 'success') {
        unset($_POST);
        header('Location: /');
    }
}

if(!isset($_GET['id'])) {
    header('Location: /');
}

$workorder = $workorderController->showwithId($_GET['id']);

if(count($workorder) == 0) {
    header('Location: /');
}

ob_start();
?>
<h1>Auftrag bearbeiten</h1>
<?php if(isset($result) && count($result) > 0) : ?>
    <div class="alert alert-<?= $result['type'] == 'success' ? 'success' : 'danger' ?>" role="alert">
        <?= htmlspecialchars($result['msg']) ?>
    </div>
<?php endif; ?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $workorder['ID'] ?>">
  <div class="mb-3">
    <label for="firstname" class="form-label">Vorname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= htmlspecialchars($_POST['firstname'] ?? $workorder['firstname'] ?? '') ?>">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Nachname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?=  htmlspecialchars($_POST['lastname'] ?? $workorder['lastname'] ?? '') ?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefonnummer</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?=  htmlspecialchars($_POST['phone'] ?? $workorder['phone'] ?? '') ?>">
  </div>
  <div class="mb-3">
    <label for="brand" class="form-label">Marke</label>
    <input type="text" class="form-control" id="brand" name="brand" value="<?=  htmlspecialchars($_POST['brand'] ?? $workorder['brand'] ?? '') ?>">
  </div>
  <div class="mb-3">
    <label for="modell" class="form-label">Modell</label>
    <input type="text" class="form-control" id="modell" name="modell" value="<?=  htmlspecialchars($_POST['modell'] ?? $workorder['modell'] ?? '') ?>">
  </div>
  <div class="mb-3">
    <label for="modell" class="form-label">Beschreibung</label>
    <textarea class="form-control" id="description" name="description"><?=  htmlspecialchars($_POST['description'] ?? $workorder['description'] ?? '') ?></textarea>
  </div>
  <div class="mb-3">
    <label for="checkindate" class="form-label">Annahmedatum</label>
    <input type="date" class="form-control" id="checkindate" name="checkindate" value="<?=  htmlspecialchars($_POST['checkindate'] ?? $workorder['checkindate'] ?? date('Y-m-d')) ?>" readonly>
  </div>
  <div class="mb-3">
    <label for="checkoutdate" class="form-label">Vorauss. Abschlussdatum</label>
    <input type="date" class="form-control" id="checkoutdate" name="checkoutdate" value="<?= htmlspecialchars($_POST['checkoutdate'] ?? $workorder['checkoutdate'] ?? '') ?>">
  </div>
  <div class="mb-3">
    <label for="repaircost" class="form-label">Vorauss. Kosten</label>
    <input type="text" class="form-control" id="repaircost" name="repaircost" value="<?=  htmlspecialchars($_POST['repaircost'] ?? $workorder['repaircost'] ?? '') ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="editworkorder">Auftrag bearbeiten</button>
</form>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';