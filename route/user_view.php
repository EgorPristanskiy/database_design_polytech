<?php
require_once("../utils/user_header.php");
?>
<html>
<body>
<form action="user_view.php" method="POST">
<?php include("../utils/show_interns.php")?>
<select name="criteria">
<option value='it_skills'>IT Навыки </option> 
<option value='date'> Дата стажировки </option>
<option value='all'>Все </option>
</select>
<input type="submit" value="Показать информацию">
</form>
</body>
<?php
require_once("../utils/intern_table_config.php");
if ($_POST["criteria"] == "it_skills")
{
	$intern_id = $_POST["full_name"];
	$result_table_head = array("ФИО", "Языки программирования");
	$result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $intern_name =$result->fetch_assoc()['full_name'];
    $result = mysqli_query($mysqli, "SELECT * FROM intern_skills WHERE intern_id = '$intern_id'");
    $language_id_array = array();
    while ($row = $result->fetch_assoc()) {
        array_push($language_id_array, $row["programming_language_id"]);
    }
    $programming_language_array = array();
    foreach($language_id_array as $programming_language_id)
    {
        $result_ = mysqli_query($mysqli, "SELECT * FROM programming_languages WHERE id = '$programming_language_id'");
        array_push($programming_language_array, $result_->fetch_assoc()['language_name']);
    }
    $result_language_string = '';
    foreach($programming_language_array as $language)
    {
        $result_language_string .= $language;
        $result_language_string .= ' ';
    }
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
    	echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $intern_name, "</td>";
    echo "<td>", $result_language_string, "</td>";
    echo "</tr>";
    echo "</table>";}
elseif ($_POST["criteria"] == "date") {
    $intern_id = $_POST["full_name"];
	$result_table_head = array("ФИО", "Дата начала стажировки", "Дата окончания стажировки");
    $result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $intern_name = $result -> fetch_assoc()["full_name"];
    $result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $start_time =$result->fetch_assoc()['start_time'];
    $result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $end_time = $result -> fetch_assoc()['end_time'];
    if($end_time === NULL)
    {
        $end_time = "Еще не закончил стажировку";
    }
    if ($start_time === NULL)
    {
        $start_time = "Нет информации о дате начала стажировки";
    }
    echo $end_time;
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
    	echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $intern_name, "</td>";
    echo "<td>", $start_time, "</td>";
    echo "<td>", $end_time, "</td>";
    echo "</tr>";
    echo "</table>";
}
elseif ($_POST["criteria"] == "all") {
    $intern_id = $_POST["full_name"];
	$result_table_head = array("ФИО", "Языки программирования", "Дата начала стажировки", "Дата окончания стажировки");
	$result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $intern_name =$result->fetch_assoc()['full_name'];
    $result = mysqli_query($mysqli, "SELECT * FROM intern_skills WHERE intern_id = '$intern_id'");
    $language_id_array = array();
    while ($row = $result->fetch_assoc()) {
        array_push($language_id_array, $row["programming_language_id"]);
    }
    $programming_language_array = array();
    foreach($language_id_array as $programming_language_id)
    {
        $result_ = mysqli_query($mysqli, "SELECT * FROM programming_languages WHERE id = '$programming_language_id'");
        array_push($programming_language_array, $result_->fetch_assoc()['language_name']);
    }
    $result_language_string = '';
    foreach($programming_language_array as $language)
    {
        $result_language_string .= $language;
        $result_language_string .= ' ';
    }
    $result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $start_time =$result->fetch_assoc()['start_time'];
    $result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
    $end_time = $result -> fetch_assoc()['end_time'];
    if($end_time === NULL)
    {
        $end_time = "Еще не закончил стажировку";
    };
    if ($start_time === NULL)
    {
        $start_time = "Нет информации о дате начала стажировки";
    }
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
    	echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $intern_name, "</td>";
    echo "<td>", $result_language_string, "</td>";
    echo "<td>", $start_time, "</td>";
    echo "<td>", $end_time, "</td>";
    echo "</tr>";
    echo "</table>";
}
?>