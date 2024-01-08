<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tworzenie zamówienia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../../css/newOrder.css">
        <link rel="shortcut icon" href="../../css/logo.jpg">
    </head>

    <body>
        <header>
            <div class="headerContainer">
                <div id="logo">
                    <img src="../../css/logo.jpg" width=150px>
                </div>

                <h1>Tworzenie zamówienia</h1>

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

            <footer>&copy; 2023 Sieć szkół</footer>
            <a class="button" id="logout" href="../../includes/logout.inc.php">Wyloguj</a>
            <a class="button" href="../secretariatHome.page.php">HOME</a>
        </header>

        <main>
            <h2>Utwórz zamówienie</h2>
            <form method="POST" action="../../includes/makeOrder.inc.php">
                <div id="changeTable">
                    <div id="add">
                        <button class="button" type="button" onclick="addItem();">+</button>
                    </div>

                    <table>
                        <tr>
                            <th>Nazwa</th>
                            <th>Ilość</th>
                            <th>Cena netto</th>
                            <th>VAT</th>
                            <th>Cena brutto</th>
                            <th>Usuń</th>
                        </tr>
                        <tbody id="tbody"></tbody>
                    </table>
                </div>

                <input class="button" id="validate" type="submit" name="addOrder" value="Potwierdź zamówienie">
            </form>


            <script>
                var items = 0;
                var i = 0;

                function addItem() {
                    items++;
                    i++;

                    let net = "net" + i;
                    let vat = "vat" + i;
                    let gross = "gross" + i;

                    var html = "<tr>";
                    html += "<td><input type='text' name='Nazwa[]' required></td>";
                    html += "<td><input type='number' name='Ilosc[] required'></td>";
                    html += "<td><input type='number' id='" + net + "' step=0.01 name='CenaNetto[]' required></td>";
                    html += "<td><input type='number' id='" + vat + "' name='VAT[]' onkeyup=calculateGrossValue('" + net + "','" + vat + "','" + gross + "') required ></td>";
                    html += "<td><input type='number' id='" + gross + "' step=0.01 name='CenaBrutto[]'  required ></td>";
                    html += "<td><button type='button' onclick='deleteRow(this);'>X</button></td>"
                    html += "</tr>";

                    console.log(html);

                    var row = document.getElementById("tbody").insertRow();
                    row.innerHTML = html;
                }

                function deleteRow(button) {
                    items--;
                    button.parentElement.parentElement.remove();
                }

                function calculateGrossValue(netId, vatId, grossId) {
                    const net = document.getElementById(netId).value;
                    const vat = document.getElementById(vatId).value;
                    //console.log(netId, "  ", vatId);
                    const gross = net * (1 + vat / 100)
                    document.getElementById(grossId).value = gross.toFixed(2);
                }

            </script>
        </main>
    </body>
</html>
