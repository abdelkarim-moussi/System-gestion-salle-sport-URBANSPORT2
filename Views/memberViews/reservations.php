<?php
ob_start()
?>
<div>Content for page reservations de membre</div>

<?php
$content = ob_get_clean();
require_once("Views/layoutMember.php");