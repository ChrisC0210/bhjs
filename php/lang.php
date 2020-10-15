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
    //$_COOKIE["language"] == $selected;
		//require_once('?language='.$_SESSION['lang'].'');
		
}
//
$languages = array('en', 'zh');
if(isset($_GET['language']) AND in_array($_GET['language'], $languages)){
    $_SESSION['language'] = $_GET['language'];
    //$_COOKIE["language"] == $selected;
}
else{  
    $_SESSION['language'] = "zh";    
}
//


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
  $language_name = getLanguageName($_SESSION["language"]);
function getDefalutlanguage() {
    //return "zh";
    //$_COOKIE["language"] == $selected;
// if(isset($_GET['language']) AND in_array($_GET['language'], $languages)){
//     $_SESSION['language'] = $_GET['language'];
//     //$_COOKIE["language"] == $selected;
// } else {
//       //return "zh";
//       //$language_name = getLanguageName($_SESSION["language"]);
//       //include "include/lang/".$language_name.".inc";
//       //include "include/lang/Chinese.inc";
//       $_SESSION['language'] = 'zh';
//     }
} 

if(isset($_GET["language"])){
  $_SESSION["language"] = $_GET["language"];
  $_SESSION["language"] = $_COOKIE["language"];
  $language_name = getLanguageName($_SESSION["language"]);
include "include/lang/Chinese.inc";
include "include/lang/English.inc";
include "include/lang/".$language_name.".inc";
  
}else{
  $_SESSION["language"] = getDefalutlanguage();
  $_SESSION["language"] = $_COOKIE["language"];
  //$_SESSION['language'] = "zh";  
  $language_name = getLanguageName($_SESSION["language"]);
include "include/lang/Chinese.inc";
include "include/lang/English.inc";
}
    //include "include/lang/".$language_name.".inc";

//
if( $language_name = getLanguageName($_SESSION["language"]) ) {
  include "include/lang/".$language_name.".inc";
}
//$language_name = getLanguageName($_SESSION["language"]);
//include "include/lang/Chinese.inc";
//include "include/lang/English.inc";
//include "include/lang/".$language_name.".inc";

//


//
//require_once("include/lang/".$language_name.".inc");
?>
    <script>
        $(function() {
            //Read the cookie, if it has been previously set
            var language = $.cookie('language');

            //Set language to previously set value
            !language || $('#language').val(language);

            //Set up an event listener to update the cookie whenever language is changed
            $('#language').on('change', function() {
                    language = this.value;
                    $.cookie('language', language);
                    var url = document.URL;
                    var re = re = /[?&]language=[^&]*/;
                    url = url.replace(re, "");
                    if (url.indexOf("?") > -1) {
                    url += "&language=" + obj.value;
                    } else {
                    url += "?language=" + obj.value;                      
                    }
                    location.href = url;
                    //
                    // $('#btnNext').click(function() {
                    //   window.location.href='http://bhjs.vela.hk/form.php?language=en';
                    // });
                    
                })
                //Set cookie to default language when page loads;
                .change();

            //alert(language);
            //alert(language);
        });
    </script>

<!-- <form action="include/language_switcher.php" method="post"> -->
<select id="language" onchange="changeLanguage(this)">
  <option value="en" selected = "selected">English</option>
  <option value="zh" >Chinese</option>
</select>
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
      //$selected = "selected = 'selected' ";
      $_COOKIE["language"] == $selected;
      //$_COOKIE['language'] = $_GET['language'];

    }
echo "Language：".$_SESSION["language"];
// echo "La：".$_COOKIE["language"];
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
<!-- <p class="color:#fff;">Language: ?php if( isset( $_COOKIE["language"] ) ) { echo $_COOKIE["language"]; } else { echo "<em>not set</em>"; } ?></p> -->