<?php
ob_start()
?>
<div>Content for page list Activities </div>

<?php
$content = ob_get_clean();
require_once("Views/layoutAdmin.php");