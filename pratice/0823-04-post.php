<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- empty測試後面的array -->
    <?php if(empty($_POST)): ?>

        <form name="form1" method="post"><!-- 預設get method="post"-->
            <input type="text" name="account" placeholder="帳號">
            <br>
            <input type="password" name="password" placeholder="密碼">
            <br>
            <button>送出</button>
            <!-- button預設 -->
        </form>
    <?php else: ?>
    <script>
        const cacheDate = localStorage.getItem('my-key');

    </script>
    <pre>
        <?php print_r($_POST); ?>
    </pre>
    <?php endif; ?>
</body>
</html>




