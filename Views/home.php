<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['tag_page']; ?></title>
</head>
<body>

    <section id="<?php echo $data['page_id'] ?>"></section>
    <h1><?php echo $data['page_title'] ?></h1>

    <?php echo formatMoney(52500) ?>
    
</body>
</html>