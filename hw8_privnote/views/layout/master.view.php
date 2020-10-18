<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body style="background-color: #d8dce7">
    <div class="pt-4">
        <?php require_once __DIR__ . "views/../partials/navbar.view.php";?>

        <div class="container mt-4">
        
            <h2>One read notes</h2>
            <?php require_once "views/$path.php";?>
        </div>
    </div>
</body>

</html>