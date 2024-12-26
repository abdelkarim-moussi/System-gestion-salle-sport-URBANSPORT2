<?php
ob_start()
?>
<div>Content for page details de activité</div>

<?php
$content = ob_get_clean();
require_once("Views/layoutVisiteur.php");