<?php
ob_start()
?>
<div>Content for page dashboard </div>

<?php
$content = ob_get_clean();
require_once("Views/layoutAdmin.php");