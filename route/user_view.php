<?php
require_once("../utils/user_header.php");
?>
<?php
require_once("../utils/intern_table_config.php");
if ($_POST)
{
    $id = array_search("Выбрать", $_POST);
    if ($_POST["action"] == "age")
    {   
        $result_table_head = array("Название вакансии", "Минмиальный возраст", "Максимальный возраст");
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $name = $result -> fetch_assoc()["name"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $min_age = $result->fetch_assoc()["min_age"];
        //echo $min_age.' ';
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $max_age = $result->fetch_assoc()["max_age"];
        //echo $max_age.' ';    
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
    }
    elseif ($_POST["action"] == "salary")
    {   
        $result_table_head = array("Название вакансии", "Зарплата");
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $name = $result -> fetch_assoc()["name"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $salary = $result->fetch_assoc()["salary"];
        echo '<table border=2>';
        echo "<tr>";
        foreach ($result_table_head as $key ) {
            echo "<td>", $key, "</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td>", $name, "</td>";
        echo "<td>", $salary, "</td>";;
        echo "</tr>";
        echo "</table>";
    }
    elseif ($_POST["action"] == "all")
    {   
        $result_table_head = array("Название вакансии", "Минмиальный возраст", "Максимальный возраст", "Зарплата", "Должность", "Отдел");
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $name = $result -> fetch_assoc()["name"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $salary = $result->fetch_assoc()["salary"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $min_age = $result->fetch_assoc()["min_age"];
        //echo $min_age.' ';
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $max_age = $result->fetch_assoc()["max_age"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $id_position = $result->fetch_assoc()["id_positions"];
        $sql = "SELECT * FROM positions WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $position_name = $result->fetch_assoc()["name"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $id_position = $result->fetch_assoc()["id_department"];
        $sql = "SELECT * FROM department WHERE id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $department_name = $result->fetch_assoc()["name"];
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
        echo "<td>", $salary, "</td>";
        echo "<td>", $position_name, "</td>";
        echo "<td>", $department_name, "</td>";
        echo "</tr>";
        echo "</table>";
    }
}
else{
    $sql = "SELECT * FROM vacancy";
    $result =  mysqli_query($mysqli, $sql);
    echo '<form action="user_view.php" method="POST">';
    echo "<select name = 'action'>"; 
    echo "<option value='age'> Возраст </option>"; 
    echo "<option value='salary'> Зарплата </option>";
    echo "<option value='all'> Все </opion>";
    echo "</select>";
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
/*
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
}*/
?>