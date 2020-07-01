<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DataBase</title>

  <style type="text/css">
    .topnav {
  background-color: #faf0e6;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #222222;
  text-align: center;
  padding: 18px 17px;
  text-decoration: none;
  font-family: sans-serif;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #fadadd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #db7093;
  color: white;
}
.topnav a.exit {
  background-color: #560319;
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
  <a href="../route/add_data.php"> Добавить вакансию </a>
  <a href="../route/add_vacancy_summary.php"> Добавить желаемую вакансию </a>
  <a href="../route/view_vacancy_summary.php"> Просмотр желаемых вакансий </a>
  <a href="../route/update.php"> Редактирование </a>
  <a class="exit" href="../route/login.php"> Выход </a>
</div>