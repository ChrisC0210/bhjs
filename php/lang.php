<?php
// include "function.php";
function getVailableLanguage() {
    $language = array(
        'zh' => 'Chinese',
        'en' => 'English',
    );
    return $language;
}

function getLanguageName($language) {
    $languages = getVailableLanguage();
    return $languages[$language];
}

function array_language() {
    $array_language = array("en", "zh");
    return $array_language;
    $_COOKIE["language"] == $selected;
		//require_once('?language='.$_SESSION['lang'].'');
		
}
//
$languages = array('en', 'zh');
if(isset($_GET['language']) AND in_array($_GET['language'], $languages)){
    $_SESSION['language'] = $_GET['language'];
    $_COOKIE["language"] == $selected;
}
else{  
    $_SESSION['language'] = "en";    
}
//

function getDefalutlanguage() {
    return "zh";
    //$_COOKIE["language"] == $selected;
} 

?>
<!-- <script src="js/language.js"></script> -->
<script>
  function changeLanguage(obj) {
    var url = document.URL;
    var re = re = /[?&]language=[^&]*/;
    url = url.replace(re, "");
    if (url.indexOf("?") > -1) {
        url += "&language=" + obj.value;
    } else {
        url += "?language=" + obj.value;
    }
		location.href = url;
}
</script>
<?php
if(isset($_GET["language"])){
  $_SESSION["language"] = $_GET["language"];
}else{
  $_SESSION["language"] = getDefalutlanguage();
}
$language_name = getLanguageName($_SESSION["language"]);
include "include/lang/".$language_name.".inc";
//
require_once("include/lang/".$language_name.".inc");
?>
<!-- <form action="include/language_switcher.php" method="post"> -->
<SELECT NAME="language" id="language" onchange="changeLanguage(this)">
<?php
  $language_array = array_language();
  foreach($language_array as $key => $value){
    if($_SESSION["language"] == $value){
      $selected = "selected = 'selected' ";
    }else{
      $selected = "";
		}
?>
  <option value="en">English</option>
  <option value="zh" selected>Chinese</option>
  <!-- <OPTION  VALUE="<?php echo $value;?>" 
  <?php  if($_GET["language"] == $value){
      $selected = "selected = 'selected' ";
      $_COOKIE["language"] == $selected;
    } echo $selected;?>>
<?php echo getLanguageName($value);?>
</OPTION>; -->
<?
  }
?>
</SELECT>
<!-- </form> -->
<!--  -->
<!-- <script type="text/javascript">
  document.getElementById('language').value = " ?php echo $_GET['language'];?>";
</script> -->
<!--  -->
<?php
// setcookie( "language", "en", time()+3600);
//echo $_COOKIE["language"]; //讀取變數
?>
<?php
// setcookie( "language", "", time()-3600);
?>
<?php
  if($_GET["language"] == $value){
      $selected = "selected = 'selected' ";
      //$_COOKIE["language"] == $selected;
      $_COOKIE['language'] = $_GET['language'];

    }
echo "Language：".$_SESSION["language"];
// echo "La：".$_COOKIE["language"];
//echo "测试：".$name;
//
// if( isset($_COOKIE['language']) && !empty($_COOKIE['language']) ){
//     header(".php?language=".$_COOKIE['language'] );
// }elseif( isset($_GET['language']) && !empty($_GET['language']) ){
//     $_COOKIE['language'] = $_GET['language'];
//     //setcookie(name, value, expire);
//     setcookie("language", $_GET['language'], ( time() + (60*60*24*365*2) ) );
// }
//
?>
<!-- <p class="color:#fff;">Language: <?php if( isset( $_COOKIE["language"] ) ) { echo $_COOKIE["language"]; } else { echo "<em>not set</em>"; } ?></p> -->
