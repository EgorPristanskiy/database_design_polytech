<?php
require_once("../utils/user_header.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<html>
<body>
<form action="user_view.php" method="POST">
<?php include("../utils/show_interns.php")?>
<select name="criteria">
<option value='it_skills'>IT Навыки </option> 
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
	$programming_language_id = $result->fetch_assoc()['programming_language_id'];
    $result_ = mysqli_query($mysqli, "SELECT * FROM programming_languages INNER JOIN intern_skills ON programming_languages.id = intern_skills.programming_language_id WHERE programming_languages.id = '$programming_language_id'");
  /* while($row = mysqli_fetch_array($result_))
     {
        print_r($row);
     } */
    $programming_language = $result_->fetch_assoc()['language_name'];
    echo '<table border=2>';
    echo "<tr>";
    foreach ($result_table_head as $key ) {
    	echo "<td>", $key, "</td>";
    }
    echo "</tr>";
    echo "<tr>";
    echo "<td>", $intern_name, "</td>";
    echo "<td>", $programming_language, "</td>";
    echo "</tr>";
    echo "</table>";
}
?>