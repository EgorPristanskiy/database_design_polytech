<?php
require_once("../utils/header_admin.php");
require_once("../utils/add_line.php");
require_once("../utils/intern_table_config.php");
insert_data($mysqli, "interns", $_POST);
?>

<html>
<body>
<form action="add_data.php" method="POST">
ФИО: <input type="text" name="full_name">
<?php include("../utils/show_languages_data.php")?> <br>
<input type="submit" value="Записать">
</form>
</body>