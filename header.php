<?php
// include "function.php";
function getVailableLanguage() {
    $language = array(
        'af' => 'Afrikaans',
        'az' => 'Azerbaijani',
        'eu' => 'Basque',
        'be' => 'Belarusian',
        'be-lat' => 'Belarusian latin',
        'bg' => 'Bulgarian',
        'bs' => 'Bosnian',
        'ca' => 'Catalan',
        'zh' => 'Chinese',
        //'zh-TW'     => 'Chinese traditional',
        //'zh-CN'     => 'Chinese simplified',
        'cs' => 'Czech',
        'da' => 'Danish',
        'de' => 'German',
        'el' => 'Greek',
        'en' => 'English',
        'es' => 'Spanish',
        'et' => 'Estonian',
        'fa' => 'Persian',
        'fi' => 'Finnish',
        'fr' => 'French',
        'gl' => 'Galician',
        'he' => 'Hebrew',
        'hi' => 'Hindi',
        'hr' => 'Croatian',
        'hu' => 'Hungarian',
        'id' => 'Indonesian',
        'it' => 'Italian',
        'ja' => 'Japanese',
        'ko' => 'Korean',
        'ka' => 'Georgian',
        'lt' => 'Lithuanian',
        'lv' => 'Latvian',
        'mk' => 'Macedonian',
        'mn' => 'Mongolian',
        'ms' => 'Malay',
        'nl' => 'Dutch',
        'no' => 'Norwegian',
        'pl' => 'Polish',
        'pt-BR' => 'Brazilian portuguese',
        'pt' => 'Portuguese',
        'ro' => 'Romanian',
        'ru' => 'Russian',
        'si' => 'Sinhala',
        'sk' => 'Slovak',
        'sl' => 'Slovenian',
        'sq' => 'Albanian',
        'sr-lat' => 'Serbian latin',
        'sr' => 'Serbian',
        'sv' => 'Swedish',
        'th' => 'Thai',
        'tr' => 'Turkish',
        'tt' => 'Tatarish',
        'uk' => 'Ukrainian',
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
}

function getDefalutlanguage() {
    return "zh";
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
include "lang/".$language_name.".inc";
?>
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
<OPTION VALUE="<?php echo $value;?>" <?php echo $selected;?>><?php echo getLanguageName($value);?></OPTION>;
<?
  }
?>
</SELECT>
<?php
  if($_GET["language"] == $value){
      //$selected = "selected = 'selected' ";
    }
echo "语言：".$_SESSION["language"];
echo "测试：".$name;
?>

  </body>
</html>

