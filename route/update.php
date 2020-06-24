<?php
require_once("../utils/header_admin.php");
require_once("../utils/add_extra_line.php");
require_once("../utils/intern_table_config.php");
?>
<html>
<body>
<form action="update.php" method="POST">
<select name="criteria">
<option value='add_language'>Добавить язык</option> 
</select>
<input type="submit" value="Принять">
</form>
</body>
<?php
require_once("../utils/intern_table_config.php");
if ($_POST["criteria"] == "add_language")
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    include("../utils/show_languages_data.php");
    echo '<input type="submit" name="Write" value="Записать">';
    echo '</form>';}
if (isset($_POST['Write']))
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    include("../utils/show_languages_data.php");
    echo '<input type="submit" value="Записать">';
    echo '</form>';
    insert_data($mysqli, $_POST);
}
?>