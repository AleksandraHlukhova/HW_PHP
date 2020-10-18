<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Ex.1: Chess board</h2>
        <div class="col-6">
            <?php require_once __DIR__ . '/../ex1_chess.view.php'; ?>
        </div>
        <h2 class="mt-4">Ex.2: Board with numbers</h2>
        <div class="col-6">
            <?php require_once __DIR__ . '/../ex2_tableNumb.view.php'; ?>
        </div>
        <h2 class="mt-4">Ex.3: Board with numbers - Multiple</h2>
        <div class="col-6">
            <?php require_once __DIR__ . '/../ex3_tableMultiple.view.php'; ?>
        </div>
        <h2 class="mt-4">Ex.4: Print the array in alphabetical order (sort by capital)</h2>
        <div class="col-6">
            <?php require_once __DIR__ . '/../ex4_countries.view.php'; ?>
        </div>
        <h2 class="mt-4">Ex.5: Temp culculation</h2>
        <div class="col-6">
            <?php require_once __DIR__ . '/../ex5_tempCulc.view.php'; ?>
        </div>
    </div>
</body>
<style>

td {
    height: 30px;
    border: 1px solid black;
}
</style>

</html>