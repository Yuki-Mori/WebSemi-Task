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
//print_r($analysis);
foreach ($analysis as $value) {

    switch ($i){
        default:
            breka;
        case 0:
            $url['root'] = $value;
            break;
        case 1:
            $url['head'] = $value;
        case 2:
            $url['req'] = $value;
            break;
        case 3:
            $url['action'] = $value;
            break;
    }
    $i++;
}
//print_r($url);

//modelをインクルードします
//print_r("debug\n");
$debug = file_exists('./index.php');
//print_r($debug);
if (file_exists('./controllers/'.$url['req'].'.php')) {

    include('./controllers/' . $url['req'] . '.php');
    //$call名のクラスをインスタンス化します
    $class = new $url['req']();
    //modelのindexメソッドを呼ぶ仕様です
    //$ret = $class->index($url['action'], $analysis, $_GET, $_POST);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $result = $class->POST($_POST);
    }else{
        $result = $class->GET($_GET);
    }
    //echo $result;
}else if(empty($url['req'])){
    echo "<h1>Hello!</h1>";
}else{
    //echo "hello";
    header('Location: http://www.google.com', true, 404);
    http_response_code (404);
    include('../404.html');
}

/*
//viewをインクルードします
if (file_exists('./views/'.$call.'.php')) {
    include('./views/'.$call.'.php');
} else {
    include('./views/error.php');
}
*/