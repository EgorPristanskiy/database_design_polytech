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
  <a class="active" >User</a>
  <a href="../route/user_view.php">Просмотр</a>
  <a href="../route/user_view_wanted_vacancy.php"> Просмотр желаемых вакансий </a>
  <a class="exit" href="../route/login.php"> Выход </a>
</div> 