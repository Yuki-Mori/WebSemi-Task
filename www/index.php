<?php

if (empty($_SERVER['REQUEST_URI'])) {
    //紹介ページを表示
    //include('./views/index.php');
    echo $_SERVER['REQUEST_URI'];
    exit;
}

//スラッシュで区切られたurlを取得します
$analysis = explode('/', $_SERVER['REQUEST_URI']);
$call;

$i = 0;
$url['req'] = '';
$url['action'] = '';
print_r($analysis);
foreach ($analysis as $value) {

    switch ($i){
        default:
            breka;
        case 2:
            $url['req'] = $value;
            break;
        case 3:
            $url['action'] = $value;
            break;
    }
    $i++;
}
print_r($url);

//modelをインクルードします
if (file_exists('./controllers/'.$url['req'].'.php')) {

    include('./controllers/'.$url['req'].'.php');
    //$call名のクラスをインスタンス化します
    $class = new $url['req']();
    //modelのindexメソッドを呼ぶ仕様です
    $ret = $class->index($url['action'], $analysis, $_GET, $_POST);
    //配列キーが設定されている配列なら展開します
    /*if (!is_null($ret)) {
        if(is_array($ret)){
            extract($ret);
        }
    }*/
    echo $ret;
}else{
    include_once ('./views/error.php');
}

/*
//viewをインクルードします
if (file_exists('./views/'.$call.'.php')) {
    include('./views/'.$call.'.php');
} else {
    include('./views/error.php');
}
*/