<?php
ob_start()
?>
<div>Content for page login</div>
<img src="" alt="" srcset="">
<?php
$content = ob_get_clean();
require_once("Views/layoutVisiteur.php");