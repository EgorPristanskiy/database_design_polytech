<?php
require_once("../utils/intern_table_config.php");
$sql = "SELECT * FROM vacancy";
$result =  mysqli_query($mysqli, $sql);
echo '<form action="view.php" method="POST">';
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
?>