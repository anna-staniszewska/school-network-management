<!DOCTYPE html>
<html>
<head>
    <title>Lista Zamówien</title>
    <meta charset="utf-8">
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr td, table tr th {
            border: 1px solid #000000;
            padding: 25px;
        }
    </style>
</head>


<body>

<header>
    <?php
    session_start();
    ?>
</header>


<div id="logo">

</div>

<div class="currentDate">
    <script>
        date = new Date().toLocaleDateString();
        document.write(date);
    </script>
</div>


<div class="createOrder">
    <h2>Utwórz zamówienie</h2>
</div>


<form method="POST" action="../../includes/makeOrder.php">
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

    <button type="button" onclick="addItem();">Dodaj produkt</button>
    <input type="submit" name="addOrder" value="Potwierdź zamówienie">
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
        html += "<td><button type='button' onclick='deleteRow(this);'>Delete</button></td>"
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


</body>
</html>