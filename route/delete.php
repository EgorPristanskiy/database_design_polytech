<?php
require_once("../utils/header_admin.php");?>
<html>
<body>
<form action="delete.php" method="POST">
<?php include("../utils/show_interns.php")?>
<input type="submit" value="Удалить">
</form>
</body>
<?php
require_once("../utils/intern_table_config.php");
$intern_id = $_POST["full_name"];
$command = "DELETE FROM interns WHERE id = '$intern_id'";
mysqli_query($mysqli, $command);
?>
