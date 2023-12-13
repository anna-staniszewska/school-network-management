<?php
    session_start();
    //$_SESSION["IdSzkoly"] = 1;
    //Co jeszcze bym chciał dodać:
    // - przycisk do odświeżenia tabeli (jeśli będąc na stronie zgłoszonych produktów doda się w bazie rekordy lub zmieni ich status zatwierdzenia, tabela nie wyświetli ich, gdyż nie aktualizuje się automatycznie; trzeba ponownie wejść na entries.inc.php)
    // - komunikaty po wciśnięciu przycisku gdy:
    //    + nie zaznaczono żadnego zgłoszenia
    //    + brak zgłoszeń do wyświetlenia
    // - wybór sposobu sortowania (po dacie/nazwie, rosnąco/malejąco)
    // - scroll??
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>BAZA ZGŁOSZONYCH PRODUKTÓW</h1>
    <?php
    if(isset($_SESSION["IdSzkoly"]))
    {
    ?>
        <form action="includes/deleteEntries.inc.php" method="post">
            <table id="tab">
                <th>DATA ZGŁOSZENIA</th>
                <th>NAZWA PRODUKTU</th>
                <th>DODANO DO ZAMÓWIENIA</th>
            </table>
            <button type="submit" name="delete">USUŃ WYBRANE PRODUKTY</button>
        </form>
        <script>
            newRow();

            function newRow() {
                let html ="";
                let row;
                <?php
                $z = $_SESSION["zgloszenia"];
                for ($i=0; $i < count($z); $i++) {
                if($z[$i]["Zweryfikowano"]==0) {
                ?>
                html += `<tr>`;
                html += `<td><?php echo $z[$i]["Data"] ?></td>`;
                html += `<td><?php echo $z[$i]["Nazwa"] ?></td>`;
                html += `<td><input type="checkbox" name="products[]" value="<?php echo $z[$i]["IdZgloszenia"] ?>"></td>`;
                html += `</tr>`;

                row = document.getElementById("tab").insertRow();
                row.innerHTML = html;

                html="";
                <?php
                }
                }
                ?>
            }
        </script>
    <?php
    }
    ?>
</body>
</html>