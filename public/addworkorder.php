<?php 

include (__DIR__ . '/../src/controller/WorkorderController.php');

if(isset($_POST['addworkorder'])) {
    $workorderController = new WorkorderController();
    $result = $workorderController->add($_POST);
    if($result['type'] == 'success') {
        unset($_POST);
        header('Location: ?success=true');
    }
}

if(isset($_GET['success']) && $_GET['success'] == true) {
    $result['type'] = "success";
    $result['msg'] = 'Auftrag erfolgreich hinzugefügt';
}


ob_start();
?>
<h1>Auftrag hinzufügen</h1>
<?php if(isset($result) && count($result) > 0) : ?>
    <div class="alert alert-<?= $result['type'] == 'success' ? 'success' : 'danger' ?>" role="alert">
        <?= htmlspecialchars($result['msg']) ?>
    </div>
<?php endif; ?>
<form method="POST">
  <div class="mb-3">
    <label for="firstname" class="form-label">Vorname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Nachname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefonnummer</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
  </div>
  <div class="mb-3">
    <label for="brand" class="form-label">Marke</label>
    <input type="text" class="form-control" id="brand" name="brand" value="<?= isset($_POST['brand']) ? htmlspecialchars($_POST['brand']) : '' ?>">
  </div>
  <div class="mb-3">
    <label for="modell" class="form-label">Modell</label>
    <input type="text" class="form-control" id="modell" name="modell" value="<?= isset($_POST['modell']) ? htmlspecialchars($_POST['modell']) : '' ?>">
  </div>
  <div class="mb-3">
    <label for="modell" class="form-label">Beschreibung</label>
    <textarea class="form-control" id="description" name="description"><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
  </div>
  <div class="mb-3">
    <label for="checkindate" class="form-label">Annahmedatum</label>
    <input type="date" class="form-control" id="checkindate" name="checkindate" value="<?= $_POST['checkindate'] ?? date('Y-m-d') ?>">
  </div>
  <div class="mb-3">
    <label for="checkoutdate" class="form-label">Vorauss. Abschlussdatum</label>
    <input type="date" class="form-control" id="checkoutdate" name="checkoutdate" value="<?= $_POST['checkoutdate'] ?? '' ?>">
  </div>
  <div class="mb-3">
    <label for="repaircost" class="form-label">Vorauss. Kosten</label>
    <input type="text" class="form-control" id="repaircost" name="repaircost" value="<?= isset($_POST['repaircost']) ? htmlspecialchars($_POST['repaircost']) : 0 ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="addworkorder">Auftrag erzeugen</button>
</form>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';