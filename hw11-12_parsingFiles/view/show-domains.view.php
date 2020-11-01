<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>
                #
            </td>
            <td>
                Domains
            </td>
            <td>
                Rang
            </td>
        </tr>
        <?php foreach($data as $el): ?>
        <tr>
            <td>
                <?= $el['id'] ?>
            </td>
            <td>
            <?= $el['domain'] ?>

            </td>
            <td>
            <?= $el['rang'] ?>

            </td>
        </tr>
        <?php endforeach ?>

    </table>
</body>

</html>