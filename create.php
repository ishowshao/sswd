<?php
// 数据校验
$required = array('civilian-count', 'spy-count', 'word-by', 'civilian-word', 'spy-word', 'game-type');
foreach ($required as $key) {
    if (!isset($_POST[$key])) {
        exit;
    }
}
$civilianCount = intval($_POST['civilian-count']);
$spyCount = intval($_POST['spy-count']);
$wordBy = trim($_POST['word-by']);
$civilianWord = trim($_POST['civilian-word']);
$spyWord = trim($_POST['spy-word']);
$gameType = trim($_POST['game-type']);
// 数据存储

// 生成id
do {
    $id = rand(1000, 9999);
} while (file_exists('data/' . $id . '.json'));

$dataFileName = 'data/' . $id . '.json';
$data = array(
    'civilian-count' => $civilianCount,
    'spy-count' => $spyCount,
    'word-by' => $wordBy,
    'civilian-word' => $civilianWord,
    'spy-word' => $spyWord,
    'game-type' => $gameType,
    'players' => array(),
);
$players = array();

for ($i = 0; $i < $civilianCount; $i++) {
    $players[] = array(
        'type' => 'civilian',
        'joined' => false,
    );
}
for ($i = 0; $i < $spyCount; $i++) {
    $players[] = array(
        'type' => 'spy',
        'joined' => false,
    );
}
shuffle($players);
shuffle($players);
$data['players'] = $players;

file_put_contents($dataFileName, json_encode($data));
// 写文件
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>谁是卧底游戏助手</title>
    <style>
        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        }
        .room-number {
            font-size: 50px;
            text-align: center;
        }
        p {
            margin: 8px 0;
        }
        img {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div>
    <p>房间号如下，请把此页面发送给参与玩家或者让玩家扫二维码</p>
    <p class="room-number"><?php echo $id ?></p>
    <div>
        <img src="http://ishowshao.com/phpqrcode/index.php?data=<?php echo urlencode('http://192.168.0.100/sswd/room.php?id=' . $id) ?>">
    </div>
</div>
<script src="js/zepto.min.js"></script>
</body>
</html>