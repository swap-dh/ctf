<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic 1</title>
    <link rel="stylesheet" type="text/css" href="/static/style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: Arial, sans-serif;">
    <div style="text-align: center;">
        <form method="post">
            <button type="submit" data-text="FLAG" id="flagButton">Button</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['flagButton'])) {
        $flag = file_get_contents('flag.txt');
        header('FLAG: ' . $flag);
        exit;
    }
    ?>
</body>
</html>
