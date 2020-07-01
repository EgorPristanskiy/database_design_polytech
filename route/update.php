<?php
require_once("../utils/header_admin.php");
require_once("../utils/add_extra_line.php");
require_once("../utils/intern_table_config.php");

?>
<!--html>
<body>
<form action="update.php" method="POST">
<select name="criteria">
<option value='chage_age'> Изменить возраст</option>
<option value='chage_salary'> Изменить изменить зарплату</option>
<option value='chage_department'> Изменить отдел</option>
<option value='chage_department'> Изменить должность</option>
</select>
<input type="submit" value="Принять">
</form>
</body-->
<?php
if ($_POST["criteria"] == "chage_age")
{
    require_once("../utils/intern_table_config.php");
    $id = array_search("Принять", $_POST);
    $sql = "SELECT * FROM vacancy WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row =  $result ->fetch_assoc();
    $name = $row["name"];
    $min_age = $row["min_age"];
    $max_age = $row["max_age"];
    $result_table_head = array("Название вакансии", "Минмиальный возраст", "Максимальный возраст");
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $name, "</td>";
    echo "<td>", $min_age, "</td>";
    echo "<td>", $max_age, "</td>";
    echo "</tr>";
    echo "</table>";
    echo '<form action="update.php" method="POST">';
    echo 'Минмальный возраст: <input type="number" name="min_age"><br>';
    echo 'Максимальный возраст: <input type="number" name="max_age"><br>';
    echo '<input type="submit" name='.$id.' value="Записать возраст">';
    echo '</form>';
}
elseif ($_POST["criteria"] == "chage_salary")
{
    require_once("../utils/intern_table_config.php");
    $id = array_search("Принять", $_POST);
    $sql = "SELECT * FROM vacancy WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row =  $result ->fetch_assoc();
    $name = $row["name"];
    $salary = $row["salary"];
    $result_table_head = array("Название вакансии", "Зарплата");
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $name, "</td>";
    echo "<td>", $salary, "</td>";
    echo "</tr>";
    echo "</table>";
    echo '<form action="update.php" method="POST">';
    echo 'Зарплата: <input type="number" name="salary"><br>';
    echo '<input type="submit" name='.$id.' value="Записать зарплату">';
    echo '</form>';
}
elseif ($_POST["criteria"] == "chage_department")
{
    require_once("../utils/intern_table_config.php");
    $id = array_search("Принять", $_POST);
    $sql = "SELECT * FROM vacancy WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row =  $result ->fetch_assoc();
    $name = $row["name"];
    $department_id = $row["id_department"];
    $sql = "SELECT name FROM department WHERE id='$department_id'";
    $result = mysqli_query($mysqli, $sql);
    $row =  $result ->fetch_assoc();
    $department_name = $row["name"];
    echo $department_name;
    $result_table_head = array("Название вакансии", "Отдел");
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $name, "</td>";
    echo "<td>", $department_name, "</td>";
    echo "</tr>";
    echo "</table>";
    echo '<form action="update.php" method="POST">';
    $sql = "SELECT * FROM  department";
    $result_select = mysqli_query($mysqli, $sql);
    echo "<select name = 'id_department'>";
    echo "<option value=0> Отдел</option>";
    while($object = mysqli_fetch_object($result_select)){
    echo "<option value = '$object->id' >$object->id $object->name </option>";}
    echo "</select>";
    echo '<input type="submit" name='.$id.' value="Записать отдел">';
    echo '</form>';
}
elseif(isset($_POST[array_search("Записать отдел", $_POST)]))
{
    $id = array_search("Записать отдел", $_POST);
    $salary = $_POST["id_department"];
    $sql = "UPDATE vacancy SET id_department='$salary' WHERE id='$id'";
    mysqli_query($mysqli, $sql);

}
elseif ($_POST["criteria"] == "chage_position")
{
    require_once("../utils/intern_table_config.php");
    $id = array_search("Принять", $_POST);
    $sql = "SELECT * FROM vacancy WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row =  $result ->fetch_assoc();
    $name = $row["name"];
    $positions_id = $row["id_positions"];
    $sql = "SELECT name FROM department WHERE id='$positions_id'";
    $result = mysqli_query($mysqli, $sql);
    $row =  $result ->fetch_assoc();
    $positions_name = $row["name"];
    $result_table_head = array("Название вакансии", "Должность");
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $name, "</td>";
    echo "<td>", $positions_name, "</td>";
    echo "</tr>";
    echo "</table>";
    echo '<form action="update.php" method="POST">';
    $sql = "SELECT * FROM  positions";
    $result_select = mysqli_query($mysqli, $sql);
    echo "<select name = 'id_positions'>";
    echo "<option value=0> Должность</option>";
    while($object = mysqli_fetch_object($result_select)){
    echo "<option value = '$object->id' >$object->id $object->name </option>";}
    echo "</select>";
    echo '<input type="submit" name='.$id.' value="Записать должность">';
    echo '</form>';
}
elseif(isset($_POST[array_search("Записать должность", $_POST)]))
{
    $id = array_search("Записать должность", $_POST);
    $salary = $_POST["id_positions"];
    $sql = "UPDATE vacancy SET id_positions='$salary' WHERE id='$id'";
    mysqli_query($mysqli, $sql);

}
elseif(isset($_POST[array_search("Записать зарплату", $_POST)]))
{
    $id = array_search("Записать зарплату", $_POST);
    $salary = $_POST["salary"];
    $sql = "UPDATE vacancy SET salary='$salary' WHERE id='$id'";
    mysqli_query($mysqli, $sql);

}
elseif(isset($_POST[array_search("Записать возраст", $_POST)]))
{
    $id = array_search("Записать возраст", $_POST);
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    $sql = "UPDATE vacancy SET min_age='$min_age' WHERE id='$id'";
    mysqli_query($mysqli, $sql);
    $sql = "UPDATE vacancy SET max_age='$max_age' WHERE id='$id'";
    mysqli_query($mysqli, $sql);
}
elseif (isset($_POST['Write']))
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
elseif(isset($_POST['chage_salary']))
{
    $id = $_POST["full_name"];
    $date = $_POST["start_time"];
    $sql = "UPDATE interns SET start_time='$date' WHERE id='$id'";
    mysqli_query($mysqli, $sql);
}
elseif ($_POST['criteria'] == "chage_department")
{
    echo '<form action="update.php" method="POST">';
    include("../utils/show_interns.php");
    include("../utils/end_date_form.php");
    echo '<input type="submit" name="chage_department" value="Установить дату">';
    echo '</form>';
}
elseif(isset($_POST['chage_department']))
{
    $id = $_POST["full_name"];
    $date = $_POST["end_time"];
    $sql = "UPDATE interns SET end_time='$date' WHERE id='$id'";
    mysqli_query($mysqli, $sql);
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
elseif($_POST)
{
    require_once("../utils/intern_table_config.php");
    $id =  array_search("Выбрать", $_POST);
    $sql = "SELECT * FROM vacancy WHERE id='$id'";
    $result =  mysqli_query($mysqli, $sql);
    $name = $result -> fetch_assoc()["name"];
    echo $name;
    echo '<form action="update.php" method="POST">';
    echo '<select name="criteria">';
    echo '<option value="chage_age"> Изменить возраст</option>';
    echo '<option value="chage_salary"> Изменить зарплату</option>';
    echo '<option value="chage_department"> Изменить отдел</option>';
    echo '<option value="chage_position"> Изменить должность</option>';
    echo '</select>';
    echo '<input type="submit" name='.$id.' value="Принять">';
    echo '</form>';
}
else{
    require_once("../utils/intern_table_config.php");
    $sql = "SELECT * FROM vacancy";
    $result =  mysqli_query($mysqli, $sql);
    echo '<form action="update.php" method="POST">';
    echo "<br>";
    while($row = mysqli_fetch_array($result))
    {
        $id = $row["id"];
        echo $id.' ';
        echo $row["name"]. ' ';
        echo '<input type="submit" name='.$id.' value="Выбрать">';
        echo '<br>';
    }
    echo '</form>';
}
?>