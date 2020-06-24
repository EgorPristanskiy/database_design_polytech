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
<option value='change_language'> Изменить язык </option>
<option value='delete_language'> Удалить запись о языке </option> 
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
    echo '</form>';
}
elseif ($_POST["criteria"] == "change_language")
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    echo '<input type="submit" name="сhoose_intern" value="Выбрать Стажера">';
    echo '</form>';
}
if (isset($_POST['Write']))
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    include("../utils/show_languages_data.php");
    echo '<input type="submit" value="Записать">';
    echo '</form>';
    insert_data($mysqli, $_POST);
}
elseif ($_POST['criteria'] == 'delete_language')
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    echo '<input type="submit" name="delete_data" value="Выбрать Стажера">';
    echo '</form>';
}
elseif (isset($_POST['сhoose_intern'])) {
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    echo '<input type="submit" name="сhoose_intern" value="Выбрать Стажера">';
    echo '</form>';
    $user_id = $_POST["full_name"];
    $sql = "SELECT * FROM intern_skills WHERE intern_id = '$user_id'";
    $result_select = mysqli_query($mysqli, $sql);
    echo '<form action="update.php" method="POST">';
    echo "<select name = 'init_language_name'>";
    echo "<option value='0'>Исходный язык программирования</option>";
    while ($row = $result_select->fetch_assoc()) {
        $language_id = $row['programming_language_id'];
        $id = $row['id'];
        $sql = "SELECT * FROM programming_languages WHERE id = '$language_id'";
        $result_ = mysqli_query($mysqli, $sql);
        $language_name =  $result_ -> fetch_assoc()['language_name'];
        echo "<option value = '$id' > $language_name </option>";
    }
    echo "</select>";
    include("../utils/show_languages_data.php");
    echo '<input type="submit" name="update_language" value="Заменить язык">';
    echo "</form>";
}
elseif (isset($_POST['update_language']))
{
    $data_id = $_POST['init_language_name'];
    $language_id =  $_POST['language_name'];
    $sql = "UPDATE intern_skills SET programming_language_id='$language_id' WHERE id='$data_id'";
    mysqli_query($mysqli, $sql);
}
elseif (isset($_POST['delete_data']))
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    echo '<input type="submit" name="сhoose_intern" value="Выбрать Стажера">';
    echo '</form>';
    $user_id = $_POST["full_name"];
    $sql = "SELECT * FROM intern_skills WHERE intern_id = '$user_id'";
    $result_select = mysqli_query($mysqli, $sql);
    echo '<form action="update.php" method="POST">';
    echo "<select name = 'delete_language_name'>";
    echo "<option value='0'>Исходный язык программирования</option>";
    while ($row = $result_select->fetch_assoc()) {
        $language_id = $row['programming_language_id'];
        $id = $row['id'];
        $sql = "SELECT * FROM programming_languages WHERE id = '$language_id'";
        $result_ = mysqli_query($mysqli, $sql);
        $language_name =  $result_ -> fetch_assoc()['language_name'];
        echo "<option value = '$id' > $language_name </option>";
    }
    echo "</select>";
    echo '<input type="submit" name="delete_row" value="Удалить язык">';
    echo "</form>";
}
elseif (isset($_POST['delete_row']))
{
    $id = $_POST['delete_language_name'];
    echo $id;
    $sql = "DELETE FROM intern_skills WHERE id='$id'";
    echo $sql;
    mysqli_query($mysqli, $sql);
}
?>