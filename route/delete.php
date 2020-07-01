<?php
require_once("../utils/header_admin.php");
require_once("../utils/intern_table_config.php");?>
<?php
$sql = "SELECT * FROM vacancy";
$result =  mysqli_query($mysqli, $sql);
echo '<form action="delete.php" method="POST">';
while($row = mysqli_fetch_array($result))
{
    $id = $row["id"];
    echo $id.' ';
    echo $row["name"]. ' ';
    echo '<input type="submit" name='.$id.' value="Удалить">';
    echo '<br>';
}
echo '</form>';
if ($_POST)
{
require_once("../utils/intern_table_config.php");
$id = array_search("Удалить", $_POST);
$command = "DELETE FROM vacancy WHERE id = '$id'";
mysqli_query($mysqli, $command);
}
?>
