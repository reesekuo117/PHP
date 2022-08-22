<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if( isset($_POST['email']) ) {
    echo '<pre>' . print_r($_POST, true) . '</pre>';
    } else {
    ?>
    <form name="form1" method="post" action="">
    <div class="titleCol">Email:</div>
    <input type="text" id="email" name="email" />
    <br />
    <div class="titleCol">Password:</div>
    <input type="password" id="password" name="password" />
    <br />
    <div class="titleCol">&nbsp;</div>
    <input type="submit" value="登入" />
    </form>
    <?php
    }
    ?>
</body>
</html>