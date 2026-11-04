<?php 
ob_start();
?>

<?php

$content = ob_get_clean();

include_once __DIR__ . '/../src/views/layouts/app.php';