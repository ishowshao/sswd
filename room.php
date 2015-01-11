<?php
/**
 * @author ishowshao
 */
if (!isset($_GET['id'])) {
    exit;
}
$id = intval($_GET['id']);
$dataFileName = 'data/' . $id . '.json';
if (!file_exists($dataFileName)) {
    exit('Room not exist');
}

session_start();

$data = json_decode(file_get_contents($dataFileName), true);
if (!$data) {
    exit('Inner error');
}

if (!isset($_SESSION['player'])) {
    $players = $data['players'];
    foreach ($players as $key => $player) {
        if ($player['joined']) {
            continue;
        } else {
            $data['players'][$key]['joined'] = true;
            file_put_contents($dataFileName, json_encode($data));
            $_SESSION['player'] = $player;
            $_SESSION['word'] = $data[$player['type'] . '-word'];
            break;
        }
    }
} else {
    $player = $_SESSION['player'];
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>谁是卧底游戏助手</title>
</head>
<body>
<div>你的角色是</div>
<div><?php echo $player['type'] === 'spy' ? '卧底' : '平民' ?></div>
<div>请记住你的词语</div>
<script src="js/zepto.min.js"></script>
<script src="js/room.js"></script>
</body>
</html>