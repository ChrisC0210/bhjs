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
<!-- index.php -->
<? 
	session_start();
	include "include/config.php";
	include "include/system_message.php";

	$msg = "";
	$err_msg = "";
	if(isset($_REQUEST['msg'])){
		$msg = $_REQUEST['msg'];
		$err_msg = $SYSTEM_MESSAGE[$msg];
	}
	if(!is_array($_SESSION['sess_delegate'])){
		$_SESSION['sess_delegate'] = array();
	}
	$ref = htmlspecialchars($_REQUEST['ref']);
	$p = htmlspecialchars($_REQUEST['p']);
	$d = htmlspecialchars($_REQUEST['d']);


	$is_free = false;
	
	foreach($_SESSION['sess_delegate'] as $value){
	
		if($value['reason']=='From Lumesse'){
		
			$is_free = true;
			break;
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=PAGE_TITLE?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/general.css" rel="stylesheet">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/common.js"></script>
	<script>
		function checkSubmit(){
			<?
			if(count($_SESSION['sess_delegate'])==0){?>
				alert("Please Add the delegate");
				return false;
			<? }else{?>
				if(confirm("Do you confirm this registration?")){
					return true;
				}else{
					return false;
				}
			<?
			}?>
			
		}
		function remove_it(k){
			if(confirm('Remove this?')){
				window.location = "act.php?type=ref&processType=remove&key="+k;
			}
		}
		function checkform(){
			var flag=true;
			var errMessage="";
			var frm = document.form1;
			
			trimForm(frm);

<? /*
			if(!$("#accept_it").prop("checked")){
				alert("Please accept the Personal Information Collection Statement");
				return false;
			}*/?>
			if($("input[name^=salutation]:checked").size() == 0){
				flag = false;
				errMessage += "Salutation\n";
			}
			if(frm.first_name.value==''){
				flag = false;
				errMessage += "First Name\n";
			}
			if(frm.last_name.value==''){
				flag = false;
				errMessage += "Last Name\n";
			}
			if(frm.company.value==''){
				flag = false;
				errMessage += "Company\n";
			}
			if(frm.job_title.value==''){
				flag = false;
				errMessage += "Job Title\n";
			}
			if(frm.email.value==''){
				flag = false;
				errMessage += "Email\n";
			}
			if(frm.contact_no.value==''){
				flag = false;
				errMessage += "Contact No.\n";
			}
			
			if($("input[name^=timeslot_id]:checked").size() == 0){
				flag = false;
				errMessage += "Please select session\n";
			}
			if($("input[name^=reason]:checked").val()=='Others'){
				if(frm.other_text.value==''){
					flag = false;
					errMessage += "Others' Reason\n";
				}
			}
			if(flag == false){
				errMessage = "Please fill in the following information:\n" + errMessage;
				alert(errMessage);
		
			}
			return flag;
				
		}
	</script>
	<style>
    .bhjs-bg {
        background-image: url("/images/school background.jpg");
        padding: 20px 0 20px 0;
    }
	</style>
  </head>
  <body>
		<div class="container">
        <div class="row">
            <div class="col-sm-12">
							<a href="index.php"><img src="images/logo-header.png" class="img-responsive" alt=""></a>
            </div>
        </div>
		</div>
<?php
include "function.php";
?>
<script src="js/language.js"></script>
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
	<div class="container bhjs-bg" id="language-change">
    
  <!-- <div class="row btn-language">
    <div class="col-sm-10 ml-4 mt-2 mb-2">
      <button id="L1" class="ml-4 btn btn-primary" data-toggle="collapse" style="margin-left: 34px;margin-bottom: 20px;" >Change Language</button>
    </div>
  </div> -->
		
		<? /*
		<div class="row">
			<p class="blue" style="padding-bottom: 20px;">
				Date: Dec 4, 2014 (Thursday) <br/>
Time: 8:45am to 12:30pm approx. (Registration Starts 8:30am)<br/>
Venue:  Regal Hongkong Hotel
			</p>
		</div>
		*/?>
		<?

		if($ref!=''){?>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?=nl2br( ' '.$thankU .' ' )?></div>
					<div class="panel-body">
						
					
						<div class="row" id="engText">
							<div class="show col-sm-offset-1 col-sm-10">
							<?=nl2br(
								'
								Reference No.:'.$ref.'
								Your registration is successful. Thank you!
								Please record the reference number.
								A confirmation email was sent to you.
								Please show the confirmation upon entry to the School Hall.
								School Information Day
								')?>
							</div>
						</div>
						<!-- 123 -->
												<div class="row" id="znText">
							<div class="col-sm-offset-1 col-sm-10">
							<?=nl2br(
								'
								
								參考編號：'.$ref.'
								閣下已成功登記第___節學校資訊日簡介會，並留座 '.$no_of_seats.' 位。
								屆時請出示本信息以便安排入座。
								何明華會督銀禧中學謹啟
								')?>
							</div>
						</div>
						<!-- 123 -->
					</div>
				</div>
			</div>
		
		</div>
		
		<? }
		
		else{
      
      ?>
      <!-- 222 -->
      <?php
  if($_GET["language"] == $value){
      //$selected = "selected = 'selected' ";
    }
echo "语言：".$_SESSION["language"];
echo "测试：".$name;
?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="text-align:justify;">
                        <!-- english -->
                        <div id="engText" class="show collapse card-body bg-light" data-toggle="collapse" data-parent="#accordion">
                            <h3 class="text-center"><b><?=nl2br( ' '.$ind01.' ' )?></b></h3>
                            <h4><?=nl2br( ' '.$ind02.' ' )?></h4>
                            <div class="mt-2 mb-4">
                              <?=nl2br( ' '.$ind03.' ' )?>
                            </div>
                            <h4><?=nl2br( ' '.$ind04.' ' )?></h4>
                            <h5 class="mt-2 mb-4"><?=nl2br( ' '.$ind05.' ' )?></h5>
                            <h5 class="mt-2 mb-4"><?=nl2br( ' '.$ind06.' ' )?></h5>
                            <div class="mt-2 mb-4">(<?=nl2br( ' '.$ind07.' ' )?></div>
                            <div class="mt-2 mb-4"><?=nl2br( ' '.$ind08.' ' )?></div>
                            <!-- <hr> -->
                        </div>
                        <!-- english -->

                        <!-- btn -->
                        <div class="row text-center ">
                            <button type="button " class="btn btn-default " style="margin-top: 20px; " onclick="window.location='form.php' "><?php echo $btnNext ?></button>
                        </div>

                    </div>
                    <div class="ml-4" style="padding-bottom: 50px;padding-left: 24px; "><?php echo $tAndC ?><br /></div>

                </div>

            </div>
        </div>
      <!-- 123 -->
		<?
		}?>
		
	
		<hr noshade="noshade" style="border:20px solid #fedfb0; display:none;">
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
    <script>
        var languageClickL0 = document.getElementById('L0');
        var languageClickL1 = document.getElementById('L1');

        languageClickL1.onclick = function() {
            var znText = document.getElementById('znText');
            if (znText.style.display !== 'block') {
                document.getElementById("engText").style.display = "none";
                document.getElementById("znText").style.display = "block";
                document.getElementById("engText").classList.remove("show");
            } else {
                znText.style.display = 'none';
                document.getElementById("engText").style.display = "block";
                document.getElementById("znText").style.display = "none";
            }
        };
    </script>
  </body>
</html>
<!-- form.php -->
<? 
	session_start();
	include "include/config.php";
	include "include/system_message.php";
	$msg = "";
	$err_msg = "";
	if(isset($_REQUEST['msg'])){
		$msg = $_REQUEST['msg'];
		$err_msg = $SYSTEM_MESSAGE[$msg];
	}
	$data = array();
	if(!is_array($_SESSION['sess_delegate'])||count($_SESSION['sess_delegate'])==0){
		$_SESSION['sess_delegate'] = array();
	}else{
		
		$data = $_SESSION['sess_delegate'][0];
	}
	$ref = htmlspecialchars($_REQUEST['ref']);
	$p = htmlspecialchars($_REQUEST['p']);
	$d = htmlspecialchars($_REQUEST['d']);
	
	foreach($data as $k=>$v){
		$data[$k] = htmlspecialchars($v);
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=PAGE_TITLE?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/general.css" rel="stylesheet">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/common.js"></script>
	<script>
		function disableOther(){
			if($("input[name=student_p_school_choice]:checked").val()=='Other'){
				$("#other_text").prop('disabled', false);
			}else{
				$("#other_text").prop('disabled', true);
			}
		}
		function checkform(){
			var flag=true;
			var errMessage="";
			var frm = document.form1;
			
			trimForm(frm);


			if(frm.student_name.value==''){
				flag = false;
				errMessage += "Name of Student\n";
			}
			if(frm.parent_name.value==''){
				flag = false;
				errMessage += "Name of Parent\n";
			}
			
			if(frm.parent_email.value==''){
				flag = false;
				errMessage += "Contact Email\n";
			}else if(frm.parent_email.value!=frm.confirm_email.value){
				flag = false;
				errMessage += "Contact Email doesn't match\n";
			}
			if(frm.contact_no.value==''){
				flag = false;
				errMessage += "Contact Number\n";
			}
			
			if($("input[name^=timeslot_id]:checked").size() == 0){
				flag = false;
				errMessage += "Session Attending\n";
			}
			
			if($("input[name^=student_p_school_choice]:checked").size() == 0){
				flag = false;
				errMessage += "Primary School Attending\n";
			}
			
			if($("input[name^=student_p_school_choice]:checked").val()=='Other'){
				if(frm.other_text.value==''){
					flag = false;
					errMessage += "Primary School Attending - Other\n";
				}
			}
			if(flag == false){
				errMessage = "Please fill in the following information:\n" + errMessage;
				alert(errMessage);
		
			}
			return flag;
				
		}
		$(document).ready(function(){
			disableOther();
			$("input[name=student_p_school_choice]").click(function(){
				disableOther();
			});
		});
	</script>
	<style>
    .bhjs-bg {
        background-image: url("/images/school background.jpg");
        padding: 20px 0 20px 0;
    }
	</style>
  </head>
  <body>
	<div class="container ">
		<div class="row" style="margin-bottom: 17px;">
			<div class="col-sm-12">
				<a href="index.php"><img src="images/logo-header.png" class="img-responsive" alt=""></a>
				
			</div>							
		</div>
		
		
		<? /*
		<div class="row">
			<p class="blue" style="padding-bottom: 20px;">
				Date: Dec 4, 2014 (Thursday) <br/>
Time: 8:45am to 12:30pm approx. (Registration Starts 8:30am)<br/>
Venue:  Regal Hongkong Hotel
			</p>
		</div>
		*/?>
		<?
		if($ref!=''){?>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thank you</div>
					<div class="panel-body">
						
					
						<div class="row" id="engText">
							<div class="show col-sm-offset-1 col-sm-10">
							<?=nl2br(
								'
								Reference No.:'.$ref.'
								Your registration is successful. Thank you!
								Please record the reference number.
								A confirmation email was sent to you.
								Please show the confirmation upon entry to the School Hall.
								School Information Day
								')?>
							</div>
						</div>
						<!-- 123 -->
												<div class="row" id="znText">
							<div class="col-sm-offset-1 col-sm-10">
							<?=nl2br(
								'
								
								參考編號：'.$ref.'
								閣下已成功登記第___節學校資訊日簡介會，並留座 '.$no_of_seats.' 位。
								屆時請出示本信息以便安排入座。
								何明華會督銀禧中學謹啟
								')?>
							</div>
						</div>
						<!-- 123 -->
					</div>
				</div>
			</div>
		
		</div>
		<? }else{?>
		<div class="container bhjs-bg" id="language-change">
			<!-- <div class="row btn-language">
				<div class="col-sm-10 ml-4 mt-2 mb-2">
					<button id="L1" class="ml-4 btn btn-primary" data-toggle="collapse" style="margin-left: 34px;margin-bottom: 20px;" >Change Language</button> &nbsp;
            </div>
        </div> -->
<!-- eng -->
		<div class="row">
			<!-- 22 -->
			<div id="engText" class="show collapse">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<h3 class="text-center"><b id="schoolInfo">School Information Day 2020 Registration</b></h3>
					<div class="panel-body" >
					<!-- eee -->
						<form class="form-horizontal" action="act.php" role="form" name="form1" onSubmit="return checkform();" method="post">
							<h4 class="margin-bottom:20px;" id="textPlease">Please enter the following information for registration</h4>
									<div class="row">
										<div class="col-sm-4">
										<span  id="studentName">NAME OF STUDENT</span>
										<br>
											<span id="studentName2">(Chinese or English characters only)</span>
										</div>
										<div class="col-sm-6">
											 <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Name of Student" value="<?=$data['student_name']?>">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" id="parentName">NAME OF PARENT</div>
										<div class="col-sm-2">
											<select name="parent_title" id="parent_title" class="form-control">
												<? foreach($parent_title_list as $key=>$val){?>
												<option value="<?=$key?>" <?=$data['parent_title']==$key?'selected="selected"':''?>><?=$val?></option>
												<? }?>
											 </select>
											
										</div>
										<div class="col-sm-4">
											 <input type="text" class="form-control" name="parent_name" id="parent_name" placeholder="Name of Parent" value="<?=$data['parent_name']?>">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" id="contactEmail">
											EMAIL OF PARENT
										</div>
										<div class="col-sm-6">
											 <input type="email" class="form-control" name="parent_email" id="parent_email" placeholder="Contact Email" value="<?=$data['parent_email']?>">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" id="contactEmailCon">CONFIRM EMAIL OF PARENT</div>
										<div class="col-sm-6">
											 <input type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="Confirm Contact Email" autocomplete="off" >
										</div>
									</div>									
									<div class="row" style="padding-top:5px;">
										<div class="col-sm-4" id="sessionAttending">SESSION ATTENDING</div>
										<div class="col-sm-8">
											<div class="row">
												<div class="col-sm-1">
													<input type="radio" style="margin-right:5px" name="timeslot_id" value="1" <?=$data['timeslot_id']==1?'checked="checked"':''?>>
												</div>
												12<sup>th</sup> December 2020 (Saturday) 2:00 p.m. – 3:15 p.m. 
											</div>
											
											<div class="row">
												<div class="col-sm-1">
													<input type="radio" style="margin-right:5px" name="timeslot_id" value="2" <?=$data['timeslot_id']==2?'checked="checked"':''?>>
												</div>
												12<sup>th</sup> December 2020 (Saturday) 4:00 p.m. – 5:15 p.m.
											</div>											
											
										</div>
									</div>
								
									<div class="row">
										<div class="col-sm-4" id="noSeats">
											NO. OF SEATS RESERVED
										</div>
										<div class="col-sm-2">
											 <select name="no_of_seats" id="no_of_seats" class="form-control">
												<? for($i=1;$i<5;$i++){?>
												<option value="<?=$i?>" <?=$data['no_of_seats']==$i?'selected="selected"':''?>><?=$i?></option>
												<? }?>
											 </select>
										</div>
									</div>
									<div class="row" style="padding-top:5px;">
										<div class="col-sm-4" id="primarySchool">
											PRIMARY SCHOOL ATTENDING
										</div>
										<div class="col-sm-8">
											
											
											<div class="row">
												<div class="col-sm-1">
													<input type="radio" style="margin-right:5px" name="student_p_school_choice" value="Neighbours" <?=$data['student_p_school_choice']=='Neighbours'?'checked="checked"':''?>">
												</div> 
												<div class="col-sm-3" id="neighbour">Neighbours</div>
											</div>
											
											<div class="row">
												<div class="col-sm-1">
													<input type="radio" style="margin-right:5px" name="student_p_school_choice" value="Other" <?=$data['student_p_school_choice']=='Other'?'checked="checked"':''?>>
												</div>
												<div class="col-sm-2" id="other">Other</div>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="other_text" id="other_text" placeholder="Other" value="<?=$data['other_text']?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" id="contactNumber">CONTACT NUMBER</div>
										<div class="col-sm-6">
											 <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Contact Number" value="<?=$data['contact_no']?>">
										</div>
									</div>									
									<div class="row text-center">
										<button type="button" class="btn btn-default" style="margin-top: 20px;" onClick="window.location='index.php';" id="btn-back">Back</button>
										<button type="submit" class="btn btn-default" style="margin-top: 20px;" id="btnPreview">Preview</button>
									</div>
	
									
								</div>
								<input type="hidden" name="processType" value="add">
								<input type="hidden" name="type" value="ref">
								
							</form>
						</div>
					</div>
					<!-- eee -->
					<div class="row">
					<div class="col-sm-12">
						<p style="padding-bottom: 50px" id="textPlease2">
						Please ensure the information above is correct before submission. Duplicate registration will not be accepted. A confirmation message will be sent to you via SMS after the completion of registration. Please show the confirmation upon entry to the School Hall. Thank you.
						<br/>
					</p>
				</div>
			</div>
			<!-- 22 -->
		</div>

<!-- 123 -->
<!-- 123 -->
						
									</div>
		<?
		}?>
		
	
		<hr noshade="noshade" style="border:20px solid #fedfb0; display:none;">
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
				$(document).ready(function() {
            $("#L1").click(function() {
                var schoolInfo = $('#schoolInfo').text();
                var textPlease = $('#textPlease').text();
                var studentName = $('#studentName').text();
                var studentName2 = $('#studentName2').text();
                var parentName = $('#parentName').text();
                var contactEmail = $('#contactEmail').text();
                var contactEmailCon = $('#contactEmailCon').text();
                var sessionAttending = $('#sessionAttending').text();
                var noSeats = $('#noSeats').text();
                var primarySchool = $('#primarySchool').text();
                var neighbour = $('#neighbour').text();
                var other = $('#other').text();
                var contactNumber = $('#contactNumber').text();
                var btnback = $('#btn-back').text();
                var btnPreview = $('#btnPreview').text();
                var textPlease2 = $('#textPlease2').text();
								$("#schoolInfo").text(schoolInfo == '2020年學校資訊日' ? 'School Information Day 2020 Registration' : '2020年學校資訊日');
								$("#textPlease").text(textPlease == '請填寫登記資料' ? 'Please enter the following information for registration' : '請填寫登記資料');
								$("#studentName").text(studentName == '學生姓名' ? 'NAME OF STUDENT' : '學生姓名');
								$("#studentName2").text(studentName2 == "(請輸入中文或英文字元)" ? "(Chinese or English characters only)" : "(請輸入中文或英文字元)");
								$("#parentName").text(parentName == '家長姓名' ? 'NAME OF PARENT' : '家長姓名');
								$("#contactEmail").text(contactEmail == '電郵地址' ? 'EMAIL OF PARENT' : '電郵地址');
								$("#contactEmailCon").text(contactEmailCon == '確認電郵地址' ? 'CONFIRM EMAIL OF PARENT' : '確認電郵地址');
								$("#sessionAttending").text(sessionAttending == '簡介會時段' ? 'SESSION ATTENDING' : '簡介會時段');
								$("#noSeats").text(noSeats == '預留座位' ? 'NO. OF SEATS RESERVED' : '預留座位');
								$("#primarySchool").text(primarySchool == '所屬小學' ? 'PRIMARY SCHOOL ATTENDING' : '所屬小學');
								$("#neighbour").text(neighbour == '附近' ? 'Neighbours' : '附近');
								$("#other").text(other == '其他' ? 'Other' : '其他');
								$("#contactNumber").text(contactNumber == '聯絡電話' ? 'CONTACT NUMBER' : '聯絡電話');
								$("#btn-back").text(btnback == '返回' ? 'Back' : '返回');
								$("#btnPreview").text(btnPreview == '預覽' ? 'Preview' : '預覽');
								$("#textPlease2").text(textPlease2 == '請確保以上資料正確無誤，然後送出。重複登記將不會受理。完成登記後，我們會傳送SMS短訊確認  閣下的登記。屆時請出示確認信息以便安排入座。謝謝。' ? 'Please ensure the information above is correct before submission. Duplicate registration will not be accepted. A confirmation message will be sent to you via SMS after the completion of registration. Please show the confirmation upon entry to the School Hall. Thank you.' : '請確保以上資料正確無誤，然後送出。重複登記將不會受理。完成登記後，我們會傳送SMS短訊確認  閣下的登記。屆時請出示確認信息以便安排入座。謝謝。');
								
            });
        });
				//
    </script>
  </body>
</html>