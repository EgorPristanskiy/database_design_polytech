<?php
require_once("../utils/header_admin.php");
require_once("../utils/add_line.php");
require_once("../utils/intern_table_config.php");
insert_data($mysqli, "vacancy", $_POST);
?>

<html>
<body>
<form action="add_data.php" method="POST">
Название вакансии: <input type="text" name="name"> <br>
<?php include('../utils/show_languages_data.php')?>
<br>
Минмальный возраст: <input type="number" name="min_age"><br>
Максимальный возраст: <input type="number" name="max_age"><br>
Зарплата: <input type="number" name="salary">
<input type="submit" value="Записать">
</form>
</body>