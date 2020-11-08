<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <tr>
            <td>
                #
            </td>
            <td>
                Domains
            </td>
            <td>
                IP-adress
            </td>
            <td>
                Rang
            </td>
            <td>
                Status
            </td>
            <td>
                Checked
            </td>
        </tr>

        <?php $key = 1 ;?>

        <?php if(is_array($data)) :?>
        <?php if($key <= 10) :?>

        <?php foreach($data as $key => $value): ?>
        <tr>
            <td>
                <?= $key++ ?>
            </td>
            <td>
            <?= $value['domain'] ?>

            </td>
            <td>
                <?= gethostbyname($value['domain']) ?>
            </td>
            <td>
            <?= $value['rang'] ?>

            </td>
            <td>
            <?= $value['http_code'] ?>
            </td>
            <td>
            <?= $value['time'] ?>
            </td>
        </tr>
        <?php endforeach ?>
        <?php endif ?>
        <?php endif ?>

    </table>
</body>

</html>