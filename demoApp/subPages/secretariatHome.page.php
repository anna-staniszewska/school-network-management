<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Sekretariatu</title>
    <link rel="stylesheet" type="text/css" href="../css/secretariatHome.css">
    <link rel="shortcut icon" href="../css/logo.jpg">
</head>
<body>
<header>
  <div class="headerContainer">
      <div id="logo">
          <img src="../css/logo.jpg" width=150px>
      </div>

      <div id="welcome">
          <h1>Cześć, <?php
              echo $_SESSION["Imie"];
              ?>!
          </h1>
      </div>

      <div id="zegar">
          <p id="data">
              <script language="JavaScript">
                  DayName = new Array(7)
                  DayName[0] = "niedziela"
                  DayName[1] = "poniedziałek"
                  DayName[2] = "wtorek"
                  DayName[3] = "środa"
                  DayName[4] = "czwartek"
                  DayName[5] = "piątek"
                  DayName[6] = "sobota"

                  MonthName = new Array(12)
                  MonthName[0] = "stycznia"
                  MonthName[1] = "lutego"
                  MonthName[2] = "marca"
                  MonthName[3] = "kwietnia"
                  MonthName[4] = "maja"
                  MonthName[5] = "czerwca"
                  MonthName[6] = "lipca"
                  MonthName[7] = "sierpnia"
                  MonthName[8] = "września"
                  MonthName[9] = "października"
                  MonthName[10] = "listopada"
                  MonthName[11] = "grudnia"

                  function getDateStr(){
                      var Today = new Date()
                      var WeekDay = Today.getDay()
                      var Month = Today.getMonth()
                      var Day = Today.getDate()
                      var Year = Today.getFullYear()

                      if(Year <= 99)
                          Year += 1900

                      return DayName[WeekDay] + "," + " " + Day + " " + MonthName[Month] + " " + Year
                  }
              </script>

              <script>document.write("Dzisiaj jest        " + getDateStr())</script>
          </p>

          <p id="czas"></p>
          <script>
              setInterval(myTimer, 1000);

              function myTimer(){
                  const date = new Date();
                  document.getElementById("czas").innerHTML = date.toLocaleTimeString();
              }
          </script>
      </div>
  </div>
    <a href="../includes/logout.inc.php">Wyloguj</a>
</header>
    <div class="main">
        <div id="nav">
            <ul class="menu">
                <li><a href="../includes/entries.inc.php">Zgłoszenia pracowników</a></li>
                <li><a href="subSubPages/newOrder.page.php">Nowe zamówienie</a></li>
                <li><a href="../includes/orders.inc.php">Lista zamównień</a></li>
                <li><a href="subSubPages/newEmployee.page.php">Rejestracja pracownika</a></li>

            </ul>
        </div>
    </div>


    <footer>&copy; 2023 Sieć szkół</footer>
</body>
</html>
