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

	<div class="container bhjs-bg" id="language-change">
			      <div class="row btn-language">
            <div class="col-sm-10 ml-4 mt-2 mb-2" style="margin-left: 34px;margin-bottom: 20px;">
							<?php include "include/lang.php" ?>
            </div>
        </div>
<!-- index -->
	        <!-- <div class="row btn-language">
            <div class="col-sm-10 ml-4 mt-2 mb-2">
                <button id="L1" class="ml-4 btn btn-primary" data-toggle="collapse" style="margin-left: 34px;margin-bottom: 20px;" >Change Language</button> &nbsp;
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
								<?=nl2br( ' '.$thank.' ' )?>
							</div>
						</div>
						<!-- 123 -->
												<!-- <div class="row" id="znText">
							<div class="col-sm-offset-1 col-sm-10">
							<
								?=nl2br(
								'
								
								參考編號：'.$ref.'
								閣下已成功登記第___節學校資訊日簡介會，並留座 '.$no_of_seats.' 位。
								屆時請出示本信息以便安排入座。
								何明華會督銀禧中學謹啟
								')?>
							</div>
						</div> -->
						<!-- 123 -->
					</div>
				</div>
			</div>
		
		</div>
		
		<? }
		
		else{
      
      ?>
      <!-- 222 -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
									<!-- form 1 -->
                    <div class="panel-body" style="text-align:justify;">
                        <!-- english -->
                        <div id="engText" class="show collapse card-body bg-light" data-toggle="collapse" data-parent="#accordion">
                            <h3 class="text-center"><b><?=nl2br( ' '.$ind01.' ' )?></b></h3>
                            <h4><?=nl2br( ' '.$ind02.' ' )?></h4>
                            <div class="mt-2 mb-4">
                              <?=nl2br( ' '.$ind03.' ' )?>
                            </div>
                            <h4 ><?=nl2br( ' '.$ind04.' ' )?></h4>
                            <h5 class="mt-2 mb-4"><?=nl2br( ' '.$ind05.' ' )?></h5>
                            <h5 class="mt-2 mb-4"><?=nl2br( ' '.$ind06.' ' )?></h5>
                            <div class="mt-2 mb-4"><?=nl2br( ' '.$ind07.' ' )?></div>
                            <div class="mt4 mb-4" style="margin-top:40px;"><?=nl2br( ' '.$ind08.' ' )?></div>
                            <!-- <hr> -->
                        </div>
                        <!-- english -->

                        <!-- btn -->
                        <div class="row text-center ">
													<!-- <button type="button " class="btn btn-default " style="margin-top: 20px; " id="btnNext" >?php echo $btnNext ?> -->
													<button type="button " class="btn btn-default " style="margin-top: 20px; " id="btnNext" onclick="window.location='form.php' "><?php echo $btnNext ?>
													</button>
													
													<!-- <a href="form.php">< ?php $language = "en"; ?></a> -->
                        </div>

										</div>
									
										<div class="ml-4" style="padding-bottom: 50px;padding-left: 24px; "><?php echo $tAndC ?><br /></div>
										<!-- form 1 -->
										
                </div>

            </div>
        </div>
			<!-- 123 -->
			
			<!-- 123 -->
		<?
		}?>
		
	
		<hr noshade="noshade" style="border:20px solid #fedfb0; display:none;">
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
    <script>
        // var languageClickL0 = document.getElementById('L0');
        // var languageClickL1 = document.getElementById('L1');

        // languageClickL1.onclick = function() {
        //     var znText = document.getElementById('znText');
        //     if (znText.style.display !== 'block') {
        //         document.getElementById("engText").style.display = "none";
        //         document.getElementById("znText").style.display = "block";
        //         document.getElementById("engText").classList.remove("show");
        //     } else {
        //         znText.style.display = 'none';
        //         document.getElementById("engText").style.display = "block";
        //         document.getElementById("znText").style.display = "none";
        //     }
        // };
		</script>
		<script>
function locations(){
    //var id=20; get the value of id and save in id(getElementById or jquery) 
window.location.href='/form.php?language='+value;
}
</script>
		</script>
  </body>
</html>