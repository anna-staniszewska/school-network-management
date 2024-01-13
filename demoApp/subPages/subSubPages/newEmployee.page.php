<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zgłoszenia produktów</title>
    <link rel="stylesheet" type="text/css" href="../../css/inputProducts.css">
    <link rel="shortcut icon" href="../../css/logo.jpg">
    <!-- <style>
        main{
            height: auto;
        }
    </style> -->
</head>

<body>
<header>
    <div class="headerContainer">
        <div id="logo">
            <img src="../../css/logo.jpg" width=150px>
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

                <script>document.write("Dzisiaj jest " + getDateStr())</script>
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

    <a class="button" href="../../includes/logout.inc.php">Wyloguj</a>
    <a class="button" href="../secretariatHome.page.php">HOME</a>
</header>

<main>
    <p id="feedback">
        <?php
        if(isset($_SESSION["feedbackNewEmployee"])) {
            echo $_SESSION["feedbackNewEmployee"];
        }
        ?>
    </p>
    <h2>Zarejestruj nowego pracownika:</h2>
    <form action="../../includes/newEmployee.inc.php" method="post">
        <label>Podaj imię:</label>
        <br>
        <input type="text" name="name" placeholder="imię" minlength="2" maxlength="30" onclick="hide()">
        <br>
        <label>Podaj nazwisko:</label>
        <br>
        <input type="text" name="surname" placeholder="nazwisko" minlength="2" maxlength="30" onclick="hide()">
        <br>
        <label>Podaj stanowisko:</label>
        <br>
        <select name="position" onclick="hide()">
            <option value="pracownik">pracownik</option>
            <option value="pracownikSekretariatu">pracownik sekretariatu</option>
            <option value="pracownikDzialuzakupow">pracownik działu zakupów</option>
            <option value="specjalistaDsDostaw">specjalista ds dostaw</option>
            <option value="ksiegowa">ksiegowa</option>
        </select>
        <br>
        <label>Podaj datę urodzenia:</label>
        <br>
        <input type="date" name="dateOfBirth" min="01-01-1923" max="01-01-2023" placeholder="dd-mm-yyyy" onclick="hide()">
        <br>
        <label>Podaj PESEL:</label>
        <br>
        <input type="text" name="pesel" placeholder="PESEL" minlength="11" maxlength="11" onclick="hide()">
        <br>
        <label>Podaj adres e-mail:</label>
        <br>
        <input type="email" name="email" placeholder="adres e-mail" minlength="2" onclick="hide()">
        <br>
        <label>Podaj numer telefonu:</label>
        <br>
        <input type="text" name="phone" placeholder="numer telefonu" minlength="9" maxlength="9" onclick="hide()">
        <br>
        <label>Podaj login:</label>
        <br>
        <input type="text" name="login" placeholder="login" minlength="2" maxlength="20" onclick="hide()">
        <br>
        <label>Podaj hasło: (hasło musi zawierać wielką literę, małą literę, liczbę i musi mieć co najmniej 8 znaków)</label>
        <br>
        <input type="text" name="password" placeholder="hasło" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="-webkit-text-security: disc" minlength="8" maxlength="20" onclick="hide()">
        <br>
        <label>Powtórz hasło: </label>
        <br>
        <input type="text" name="passwordCheck" placeholder="hasło" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="-webkit-text-security: disc" minlength="8" maxlength="20" onclick="hide()">
        <br>
        <label>Podaj miejscowość:</label>
        <br>
        <input type="text" name="town" placeholder="miejscowość" minlength="2" maxlength="30" onclick="hide()">
        <br>
        <label>Podaj ulicę:</label>
        <br>
        <input type="text" name="road" placeholder="ulica" maxlength="30" onclick="hide()">
        <br>
        <label>Podaj numer budynku:</label>
        <br>
        <input type="number" name="building" placeholder="budynek" onclick="hide()">
        <br>
        <label>Podaj numer lokalu:</label>
        <br>
        <input type="number" name="apartment" placeholder="lokal" onclick="hide()">
        <br>


        <button type = "submit" name = "submit">Zarejestruj</button>
    </form>

    <script>
        function hide(){
            document.getElementById("feedback").style.display="none";
        }
    </script>

</main>

<footer>&copy; 2023 Sieć szkół</footer>
</body>
