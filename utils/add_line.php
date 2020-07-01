<?php
require_once("../utils/intern_table_config.php");
function insert_data($mysqli, $table_name, $data )
{
	$key_intern_table = array("name", "min_age", "max_age", "salary", "id_department", "id_positions");
	$key_programming_languages_table = array("language_name");
	foreach($key_intern_table as $key) {
    	$value_intern_table[] = $data[$key];}

    if ($data['name'])
    {
		$query ="INSERT INTO $table_name ( ". implode(',' , $key_intern_table) .") VALUES('". implode("','" , $value_intern_table) ."')";
		$result =mysqli_query($mysqli, $query);
		$name = $data['full_name'];
	}
}
?>