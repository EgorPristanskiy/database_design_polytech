<?php
require_once("../utils/user_header.php");
require_once("../utils/add_line.php");
require_once("../utils/intern_table_config.php");
insert_data($mysqli, "vacancy", $_POST);
?>
<?php
if ($_POST)
{
    $id_summary = $_POST["choose_summary"];
    $result_table_head = array("ФИО",  "Вакансии");
    $sql = "SELECT * FROM summary WHERE id='$id_summary'";
    $result = mysqli_query($mysqli, $sql);
    $name = $result -> fetch_assoc()["full_name"];
    $sql = "SELECT * FROM wanted_vacancy WHERE wanted_vacancy.id_summary='$id_summary'";
    $result = mysqli_query($mysqli, $sql);
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
        echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $name, "</td>";
    echo "<td>". ' ';
    while($row = $result->fetch_assoc())
    {
        $id = $row["id_vacancy"];
        $sql = "SELECT * FROM vacancy WHERE id='$id'";
        $result_ = mysqli_query($mysqli, $sql);
        $vacancy_name = $result_ -> fetch_assoc()["name"];
        echo $vacancy_name. ' ';
    }
}
else
{
    echo "<form action='user_view_wanted_vacancy.php' method=POST>";
        $sql = "SELECT * FROM summary";
        $result =  mysqli_query($mysqli, $sql);
        echo "<select name='choose_summary'>";
        echo "<option value=0> Резюме </option>";
        while($object = mysqli_fetch_object($result)){
            echo "<option value = '$object->id' >$object->id $object->full_name </option>";}    
        echo "</select>";
        echo '<input type="submit" value="Просмотр">';
        echo "</form>";
}
?>