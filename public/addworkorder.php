<?php 
ob_start();
?>
<h1>Auftrag hinzufügen</h1>
<form method="POST" action="/addworkorder.php">
  <div class="mb-3">
    <label for="firstname" class="form-label">Vorname</label>
    <input type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Nachname</label>
    <input type="text" class="form-control" id="lastname" name="lastname">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefonnummer</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="mb-3">
    <label for="checkindate" class="form-label">Annahmedatum</label>
    <input type="date" class="form-control" id="checkindate" name="checkindate">
  </div>
  <div class="mb-3">
    <label for="checkoutdate" class="form-label">Vorauss. Abschlussdatum</label>
    <input type="date" class="form-control" id="checkoutdate" name="checkoutdate">
  </div>
  <div class="mb-3">
    <label for="repaircost" class="form-label">Vorauss. Kosten</label>
    <input type="number" min="0" step="0.01" class="form-control" id="repaircost" name="repaircost">
  </div>
  <button type="submit" class="btn btn-primary">Auftrag erzeugen</button>
</form>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';