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

$joinedCount = 0;
if (!isset($_SESSION['player']) || (isset($_SESSION['id']) && $_SESSION['id'] !== $id)) {
    foreach ($data['players'] as $key => $player) {
        if ($player['joined']) {
            $joinedCount++;
            continue;
        } else {
            $data['players'][$key]['joined'] = true;
            file_put_contents($dataFileName, json_encode($data));
            $_SESSION['player'] = $player;
            $_SESSION['word'] = $data[$player['type'] . '-word'];
            $_SESSION['id'] = $id;
            break;
        }
    }
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
<?php
if ($joinedCount === count($data['players'])) {
?>
    <div>房间已满</div>
<?php
} else {
?>
    <div>你的角色是</div>
    <div><?php echo $_SESSION['player']['type'] === 'spy' ? '卧底' : '平民' ?></div>
    <div>请记住你的词语</div>
    <div><?php echo $_SESSION['word'] ?></div>
<?php
}
?>
</body>
</html>