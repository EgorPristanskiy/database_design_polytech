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
  $sql = "SELECT * FROM programming_languages";
  $result_select = mysqli_query($mysqli, $sql);
  echo "<select name = 'language_name'>";
  echo "<option value='0'>Язык Программирования</option>";
  while($object = mysqli_fetch_object($result_select)){
  echo "<option value = '$object->id' > $object->language_name </option>";}
  echo "</select>";
  ?>