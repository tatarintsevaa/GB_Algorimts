<?php
$nextDir = $_GET['src'];
$startDirName = realpath('\\');
//var_dump($nextDir);
if (is_null($nextDir)) {
    $dir = new DirectoryIterator($startDirName);
} elseif ($nextDir == $startDirName) {
    header("Location: /");
} else {
//    var_dump($nextDir);
    $dir = new DirectoryIterator("{$nextDir}");
//    header("Location: /");

}
$pathArray = explode('\\', $nextDir);
$path = '';
//var_dump($pathArray);
//var_dump($path);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-size: 20px;
        }
        .breadCrumbs a {
            text-decoration: none;
            color: #e4e4e4;
        }
        .breadCrumbs {
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .breadCrumbs,
        .breadCrumbs strong,
        .breadCrumbs span  {
            background-color: #3C3F41;
            color: #eeeeee;
        }
        .explorer {
            background-color: #eeeeee;
            color: #3C3F41;
            border-radius: 5px;
            border: 1px solid #3C3F41 ;
            padding: 5px 10px;
            display: flex;
            flex-direction: column;
        }
        .explorer a {
            color: #3C3F41;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="breadCrumbs">
    <?php foreach ($pathArray as $key => $value) : ?>
        <? if ($key == 0 && $value == ''): ?>
            <strong> > <?= $startDirName ?></strong>
        <? elseif ($value == ''): continue?>
        <? elseif ($value == end($pathArray)): ?>
            <strong> > <?= $value ?></strong>
        <? else: ?>
            <span> > <a href="?src=<?= $path .= "{$value}\\" ?>"><?= $value ?></a></span>
        <? endif; ?>
    <? endforeach; ?>
</div>
<div class="explorer">
    <?php foreach ($dir as $item) : ?>
        <?php if ($item->getFilename() == '..'): ?>
            <p><a href="?src=<?= dirname($item->getPath()) ?>">Назад</a></p>
        <?php elseif ($item->getFilename() == '.'): continue ?>
        <?php elseif ($item->isFile()): ?>
            <p><?= $item->getFilename() ?></p>
        <?php else: ?>
            <p><img src="img/dir.png" width="20px" alt="dir">
                <a href="?src=<?= $item->getPathname() ?>"><?= $item->getFilename() ?></a>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

</body>
</html>