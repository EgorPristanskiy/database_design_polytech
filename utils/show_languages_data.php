<?php
  // Подключение к базе данных MySQL.
  require_once("intern_table_config.php");
  if (!$mysqli) {
  echo "Ошибка соединения с сервером MySQL!";
  exit;
  }
  mysqli_set_charset($mysqli, "utf8");
// изменение набора символов на utf8
// Выбираем БД для работы в MySQL.
// Делаем выборку из таблицы.
  $sql = "SELECT * FROM  department";
  $result_select = mysqli_query($mysqli, $sql);
  echo "<select name = 'id_department'>";
  echo "<option value=0> Отдел</option>";
  while($object = mysqli_fetch_object($result_select)){
  echo "<option value = '$object->id' > $object->name </option>";}
  echo "</select>";
  $sql = "SELECT * FROM  positions";
  $result_select = mysqli_query($mysqli, $sql);
  echo "<select name = 'id_positions'>";
  echo "<option value=0> Должность </option>";
  while($object = mysqli_fetch_object($result_select)){
  echo "<option value = '$object->id' > $object->name </option>";}
  echo "</select>";
  ?>