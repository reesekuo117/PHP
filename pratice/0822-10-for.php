<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for</title>
</head>
<body>
    <table border="3">
        <?php for($i=1; $i<10; $i++): ?>
        <tr>
            <td><?= $i ?></td>
        </tr>
        <?php endfor; ?>
    </table>
</body>
</html>
