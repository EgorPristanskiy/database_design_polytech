<?php
require_once("../utils/header_admin.php");
require_once("../utils/add_line.php");
require_once("../utils/intern_table_config.php");
insert_data($mysqli, "vacancy", $_POST);
?>

<?php
if ($_POST)
{
    $id_summary = $_POST["choose_summary"];
    $id_vacancy = $_POST["choose_vacancy"];
    $key_intern_table = array('id_summary', 'id_vacancy');
    $key_programming_languages_table[] = $id_summary;
    $key_programming_languages_table[] = $id_vacancy;
    $table_name = 'wanted_vacancy';
    $query ="INSERT INTO $table_name ( ". implode(',' , $key_intern_table) .") VALUES('". implode("','" , $key_programming_languages_table) ."')";
    mysqli_query($mysqli, $query);
    $name = $data['full_name'];
    mysqli_query($mysqli, $sql);
}
else
{
    echo "<form action='add_vacancy_summary.php' method=POST>";
    $sql = "SELECT * FROM summary";
    $result =  mysqli_query($mysqli, $sql);
    echo "<select name='choose_summary'>";
    echo "<option value=0> Резюме </option>";
    while($object = mysqli_fetch_object($result)){
        echo "<option value = '$object->id' >$object->id $object->full_name </option>";}    
    echo "</select>";
    echo "<select name='choose_vacancy'>";
    echo "<option value=0> Вакансия </option>";
    $sql = "SELECT * FROM vacancy";
    $result =  mysqli_query($mysqli, $sql);
    while($object = mysqli_fetch_object($result)){
        echo "<option value = '$object->id' >$object->id $object->name </option>";}    
    echo "</select>";
    echo '<input type="submit" value="Записать">';
    echo "</form>";
}
?>