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

	</style>
  </head>
  <body>
	<div class="container">
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
						
						<div class="row">
							<div class="col-sm-offset-1 col-sm-10">
							<?=nl2br('Reference No.:'.$ref.'


Your registration is successful. Thank you!

Please record the reference number.

A confirmation email was sent to you.
Please show the confirmation upon entry to the School Hall.

School Information Day


參考編號：'.$ref.'


閣下已成功登記。感謝  閣下願意撥冗出席。

請記下參考編號。

我們將傳送一封電郵確認  閣下的登記。
屆時請出示確認電郵以便安排入座。

2019年學校資訊日

')?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		
		</div>
		<? }else{?>
		<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <h3 class="text-center"><b>2020 School Information Day
				</b>
				</h3>
                        <div class="panel-body" style="text-align:justify;">
							<div>
                            <?=nl2br("
12th December 2020
							
Our School Information Day will be held on 12th December 2020 (Saturday). We will conduct two briefing sessions about our school for senior primary students and their parents. Each briefing session will include a general introduction of the school, our curriculum, activities for students as well as admission criteria. Visitors are also welcomed to tour the school during school opening hours.

Briefing Sessions
1st Session: 2:00 p.m. – 3:15 p.m.
2nd Session: 4:00 p.m. – 5:15 p.m.
(Contents of the two sessions are identical.)

For details, please contact us at 2336 3034.

<hr>


")?>
					</div>
					<div>
                        <h3 class="text-center"><b>2020年學校資訊日	</b></h3>
                            <?=nl2br("
2020年12月12日
						
本校將於2020年12月12日(星期六)舉行學校資訊日。屆時我們將為小學高年級的學生及其家長舉辦兩場簡介會，讓來賓對本校的課程、學生活動及收生標準有更深入的認識。本校亦會開放校園設施供來賓參觀。

<u>簡介會</u>
第一節：下午二時至三時十五分
第二節：下午四時至五時十五分
(兩節簡介會內容相同)

如有查詢，請致電2336 3034與本校聯絡。




")?>

						
					</div>

<div class="row text-center">
										<button type="button" class="btn btn-default" style="margin-top: 20px;" onclick="window.location='form.php'">Next</button>
									</div>
									
									
                        </div>
						<div class="row">
							<div class="col-sm-12">
			<p style="padding-bottom: 50px">
				Terms & Conditions:<br/>
				
			</p>
			</div>
		</div>

                    </div>
                </div>
            </div>
		
		<?
		}?>
		
	
		<hr noshade="noshade" style="border:20px solid #fedfb0; display:none;">
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>