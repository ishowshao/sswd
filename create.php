<?php
// 数据校验 前端表单会做完整的校验，如果到达这里的数据还是不对，直接当非正常请求处理
$required = array('civilian-count', 'spy-count', 'word-by', 'civilian-word', 'spy-word', 'game-type');
foreach ($required as $key) {
    if (!isset($_POST[$key])) {
        header('Location: index.html');
        exit;
    }
}
$civilianCount = intval($_POST['civilian-count']);
$spyCount = intval($_POST['spy-count']);
$wordBy = trim($_POST['word-by']);
$civilianWord = trim($_POST['civilian-word']);
$spyWord = trim($_POST['spy-word']);
$gameType = trim($_POST['game-type']);
$hasJudge = isset($_POST['has-judge']);

if ($civilianCount < 1 || $spyCount < 1 || strlen($civilianWord) === 0 || strlen($spyWord) === 0) {
    header('Location: index.html');
    exit;
}
if ($gameType !== 'original' && $gameType !== 'advanced') {
    header('Location: index.html');
    exit;
}
if ($wordBy !== 'judge' && $wordBy !== 'auto') {
    header('Location: index.html');
    exit;
}

// 生成id
do {
    $id = rand(1000, 9999);
} while (file_exists('data/' . $id . '.json'));

$dataFileName = 'data/' . $id . '.json';
$data = array(
    'civilian-count' => $civilianCount,
    'spy-count' => $spyCount,
    'word-by' => $wordBy,
    'has-judge' => $hasJudge,
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

// 数据存储
file_put_contents($dataFileName, json_encode($data));

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
        }
        p {
            margin: 8px 0;
            text-align: center;
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
        <img src="http://ishowshao.com/phpqrcode/index.php?data=<?php echo urlencode('http://ishowshao.com/sswd/room.php?id=' . $id) ?>">
    </div>
    <?php
    if (!$hasJudge) {
    ?>
        <p><a href="http://ishowshao.com/sswd/room.php?id=<?php echo $id ?>">自己也加入房间</a></p>
    <?php
    }
    ?>
</div>
<script src="js/zepto.min.js"></script>
</body>
</html>