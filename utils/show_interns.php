<?php
require_once("../utils/intern_table_config.php");
$sql = "SELECT * FROM interns";
$result_select = mysqli_query($mysqli, $sql);
echo "<select name = 'full_name'>";
echo "<option value='0'>Стажер</option>";
while($object = mysqli_fetch_object($result_select)){
echo "<option value = '$object->id' >$object->id $object->full_name </option>";}
echo "</select>";
?>