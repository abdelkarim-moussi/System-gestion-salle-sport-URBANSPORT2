<?php
ob_start()
?>
<div>Content for page list members </div>
<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   ?>
<div><?=$row["label"]?></div>


<?php
}
?>
<?php
$content = ob_get_clean();
require_once("Views/layoutAdmin.php");