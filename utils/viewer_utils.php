<?php
require_once("../utils/intern_table_config.php");
if ($_POST["criteria"] == "it_skills")
{
	$intern_id = $_POST["full_name"];
	$result = mysqli_query($mysqli, "SELECT * FROM interns WHERE id = '$intern_id'");
	$intern_name =$result->fetch_assoc()['full_name'];
	$result = mysqli_query($mysqli, "SELECT * FROM intern_skills WHERE intern_id = '$intern_id'");
	$programming_language_id = $result->fetch_assoc()['programming_language_id'];
    $result_ = mysqli_query($mysqli, "SELECT * FROM programming_languages WHERE id = '$programming_language_id'");
	$programming_language = $result_->fetch_assoc()['language_name'];
	return $intern_name .' '.$programming_language;
}
?>