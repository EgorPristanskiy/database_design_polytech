<?php
require_once("../utils/intern_table_config.php");
function insert_data($mysqli, $data )
{
	$key_intern_table = array("full_name");
	$key_programming_languages_table = array("language_name");
	foreach($key_intern_table as $key) {
    	$value_intern_table[] = $data[$key];}
    foreach($key_programming_languages_table as $key) {
    	$value_programming_languages_table[] = $data[$key];}
    if ($data['full_name'])
    {
		$user_id = $data['full_name'];
		$keys = array('intern_id', 'programming_language_id');
		$values = array($user_id, $value_programming_languages_table[0]);
		$query_ = "INSERT INTO intern_skills ( ". implode(',' , $keys) .") VALUES('". implode("','" , $values) ."')";
		echo $query_;
		mysqli_query($mysqli, $query_);
	}
}
?>