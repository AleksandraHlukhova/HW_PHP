<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Template Main CSS File -->
    <link href="<?php echo __DIR__ . '/../../public/css/style.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        {{content}}
    </div>

    <div id="app"></div>

    <script src="<?php echo __DIR__ . '/../../dist/build.js'; ?>"></script>
</body>

</html>