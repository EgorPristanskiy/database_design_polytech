<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DataBase</title>
  <style type="text/css">
    .topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.topnav a.exit {
  background-color: #ff3333;
  color: white;
  position: fixed;
  right: 0;
}
  </style>
</head>
<body>
 <div class="topnav">
  <a class="active" >Админ</a>
  <a href="../route/view.php">Просмотр</a>
  <a href="../route/delete.php">Удаление</a>
  <a href="../route/add_data.php"> Добавить стажера </a>
  <a href="../route/update.php"> Редактирование </a>
  <a class="exit" href="../route/login.php"> Выход </a>
</div> 