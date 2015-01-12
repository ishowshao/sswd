<?php
// game-type: original, advanced
$gameType = 'original';
if (isset($_GET['game-type']) && $_GET['game-type'] === 'advanced') {
    $gameType = 'advanced';
}
$words = array();
$words['original'] = array(
    array('civilian' => '牛肉干', 'spy' => '猪肉脯'),
    array('civilian' => '鱼香肉丝', 'spy' => '四喜丸子'),
    array('civilian' => '酸菜鱼', 'spy' => '水煮鱼'),
    array('civilian' => '麻婆豆腐', 'spy' => '皮蛋豆腐'),
    array('civilian' => '小笼包', 'spy' => '灌汤包'),
    array('civilian' => '玫瑰', 'spy' => '月季'),
    array('civilian' => '薰衣草', 'spy' => '满天星'),
    array('civilian' => '董永', 'spy' => '许仙'),
    array('civilian' => '张韶涵', 'spy' => '王心凌'),
    array('civilian' => '刘诗诗', 'spy' => '刘亦菲'),
    array('civilian' => '晴川', 'spy' => '若曦'),
    array('civilian' => '何炅', 'spy' => '维嘉'),
    array('civilian' => '谢娜', 'spy' => '李湘'),
    array('civilian' => '孟非', 'spy' => '乐嘉'),
    array('civilian' => '天天向上', 'spy' => '非诚勿扰'),
    array('civilian' => '全力以赴', 'spy' => '勇往直前'),
    array('civilian' => '班主任', 'spy' => '辅导员'),
    array('civilian' => '包青天', 'spy' => '狄仁杰'),
    array('civilian' => '金丝猴', 'spy' => '大白兔'),
    array('civilian' => '牛奶', 'spy' => '豆浆'),
    array('civilian' => '果粒橙', 'spy' => '鲜橙多'),
    array('civilian' => '保安', 'spy' => '保镖'),
    array('civilian' => '过山车', 'spy' => '碰碰车'),
    array('civilian' => '铁观音', 'spy' => '碧螺春'),
    array('civilian' => '生菜', 'spy' => '白菜'),
    array('civilian' => '辣椒', 'spy' => '芥末'),
    array('civilian' => '天龙八部', 'spy' => '神雕侠侣'),
    array('civilian' => '降龙十八掌', 'spy' => '九阴白骨爪'),
    array('civilian' => '金庸', 'spy' => '古龙'),
    array('civilian' => '自行车', 'spy' => '电动车'),
    array('civilian' => '赵敏', 'spy' => '黄蓉'),
    array('civilian' => '海豚', 'spy' => '海狮'),
    array('civilian' => '洗发露', 'spy' => '护发素'),
    array('civilian' => '水盆', 'spy' => '水桶'),
    array('civilian' => '鼠目寸光', 'spy' => '井底之蛙'),
    array('civilian' => '唇膏', 'spy' => '口红'),
    array('civilian' => '森马', 'spy' => '以纯'),
    array('civilian' => '近视眼镜', 'spy' => '隐形眼镜'),
    array('civilian' => '联通', 'spy' => '移动'),
    array('civilian' => '泡泡糖', 'spy' => '棒棒糖'),
    array('civilian' => '小沈阳', 'spy' => '赵本山'),
    array('civilian' => '土豆粉', 'spy' => '酸辣粉'),
    array('civilian' => '涮肉', 'spy' => '烤肉'),
    array('civilian' => '气泡', 'spy' => '水泡'),
    array('civilian' => '蜘蛛侠', 'spy' => '蝙蝠侠'),
    array('civilian' => '木糖醇', 'spy' => '口香糖'),
    array('civilian' => '红楼梦', 'spy' => '甄嬛传'),
    array('civilian' => '纸巾', 'spy' => '手帕'),
    array('civilian' => '苏州', 'spy' => '杭州'),
    array('civilian' => '香港', 'spy' => '台湾'),
    array('civilian' => '首尔', 'spy' => '东京'),
    array('civilian' => '红烧牛肉面', 'spy' => '香辣牛肉面'),
    array('civilian' => '橙子', 'spy' => '橘子'),
    array('civilian' => '葡萄', 'spy' => '提子'),
    array('civilian' => '太监', 'spy' => '人妖'),
    array('civilian' => '蝴蝶', 'spy' => '蜜蜂'),
    array('civilian' => '馒头', 'spy' => '花卷'),
);

$words['advanced'] = array(
    array('civilian' => '奶茶', 'spy' => '丝袜'),
    array('civilian' => '湖南台', 'spy' => '张杰'),
);
$response = array(
    'success' => true,
    'data' => $words[$gameType][rand(0, count($words[$gameType]) - 1)],
);
echo json_encode($response);
