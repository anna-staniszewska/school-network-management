<!DOCTYPE html>
<html>
<head>
    <title>Potwierdzenie</title>
    <meta charset="utf-8">
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

<div>
    <h3>Pomyślnie złożono zamówienie</h3>
</div>

<a href="../utworzZamowienie.php">Złóż następne zamówienie</a>

</body>
</html>