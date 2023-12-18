<!DOCTYPE html>
<html>
<head>
    <title>Odrzucenie</title>
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
    <h3>Nie udało się złożyć zamówienia</h3>
</div>

<a href="../newOrder.php">Złóż następne zamówienie</a>

</body>
</html>