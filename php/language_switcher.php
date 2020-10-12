<?php
$lang = "en";
if( isset( $_POST["langguage"] ) ) {
    $lang = $_POST["langguage"];
    setcookie ('language', $lang, time() + 60*60*24*30);
    header( "Location: ?language=" );
}
//
if( isset($_COOKIE['language']) && !empty($_COOKIE['language']) ){
     header("/.php?language=". $_COOKIE['language'] );
}elseif( isset($_GET['language']) && !empty($_GET['language']) ){
    $_COOKIE['language'] = $_GET['language'];
    //Or you could use this method(preffered)
    //setcookie(name, value, expire);
    setcookie("language", $_GET['language'], ( time() + (60*60*24*365*2) ) );
}
//
?>