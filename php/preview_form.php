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
	if(!is_array($_SESSION['sess_delegate'])||count($_SESSION['sess_delegate'])==0){
		header('location: index.php');
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
		<div class="row" style="margin-bottom: 17px;">
			<div class="col-sm-12">
				<a href="index.php"><img src="images/logo-header.png" class="img-responsive" alt=""></a>
				
			</div>
		</div>
		
		<div class="container bhjs-bg" id="language-change">
						      <div class="row btn-language">
            <div class="col-sm-10 ml-4 mt-2 mb-2" style="margin-left: 34px;margin-bottom: 20px;">
							<?php include "include/lang.php"; ?>
            </div>
        </div>
<!-- index -->



		
		<div class="row">
							<?php 
	$language_name = getLanguageName($_SESSION["language"]);
include "include/lang/".$language_name.".inc";
	?>
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <h3 class="text-center"><b id="schoolInfo"><?php echo $form01 ?>
				</b>
				</h3>
                        <div class="panel-body" >

													<div id="engText" class="show collapse">
						<form class="form-horizontal" action="act.php" role="form" name="form1" onSubmit="return checkform();" method="post">
													</div>

													<!-- 13 -->
													<div id="znText" class="collapse">
						<form class="form-horizontal" action="act.php" role="form" name="form1" onSubmit="return checkform();" method="post">
													</div>
													<!-- 13 -->

									<div class="row">
										<div class="col-sm-4" id="studentName">
											<?php echo $form03 ?>
										</div>
										<div class="col-sm-6">
											 <?=$data['student_name']?>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4"  id="parentName">
											<?php echo $form05 ?>
										</div>
										<div class="col-sm-2">
											
											<?=$parent_title_list[$data['parent_title']]?>
										</div>
										<div class="col-sm-4">
											 <?=$data['parent_name']?>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4" id="contactEmail">
											<?php echo $form06 ?>
										</div>
										<div class="col-sm-6">
											 
											 <?=$data['parent_email']?>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-4" id="contactNumber">
											<?php echo $form13 ?>
										</div>
										<div class="col-sm-6">
											 <?=$data['contact_no']?>
										</div>
									</div>
									
									<div class="row" style="padding-top:5px;">
										<div class="col-sm-4" id="sessionAttending">
											<?php echo $form08 ?>
										</div>
										<div class="col-sm-8">
											
											
											<div class="row">
												<div class="col-sm-12">
												<? if($data['timeslot_id']==1){?>
												14<sup>th</sup> December 2019 (Saturday) 9:30 a.m. – 10:45 a.m. 
												<? }?>
												<? if($data['timeslot_id']==2){?>
												14<sup>th</sup> December 2019 (Saturday) 11:30 a.m. – 12:45 p.m.
												<? }?>
												<? if($data['timeslot_id']==3){?>
												14<sup>th</sup> December 2019 (Saturday) 2:00 p.m. – 3:15 p.m.
												<? }?>
												<? if($data['timeslot_id']==4){?>
												14<sup>th</sup> December 2019 (Saturday) 4:00 p.m. – 5:15 p.m.
												<? }?>
												</div>
											</div>
											
											
										</div>
									</div>
								
									<div class="row">
										<div class="col-sm-4" id="noSeats">
											<?php echo $form09 ?>
										</div>
										<div class="col-sm-2">
											<?=$data['no_of_seats']?>
											 
										</div>
									</div>
									<div class="row" style="padding-top:5px;">
										<div class="col-sm-4" id="primarySchool">
											<?php echo $form10 ?>
										</div>
										<div class="col-sm-8">
											
											
											<div class="row">
												
												<div class="col-sm-2" id="neighbour">
												<?=$data['student_p_school_choice']?>
												</div>
												<div class="col-sm-6" id="other">
													<?=$data['other_text']?>
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="row text-center">
										<button type="button" class="btn btn-default" style="margin-top: 20px;" onClick="window.location='form.php';" id="btn-back"><?php echo $btnBack ?></button>
										<button type="submit" class="btn btn-default" style="margin-top: 20px;" id="btn-submit"><?php echo $btnSubmit ?></button>
									</div>
								
								</div>
								<input type="hidden" name="processType" value="reg">
								<input type="hidden" name="type" value="ref">
								
							</form>
							<div class="row">
							<div class="col-sm-12">
			</div>
							<p style="padding-bottom: 50px">
				Terms & Conditions:<br/>
				
			</p>

												</div>
		</div>
		</div>
                        </div>

                    </div>
                </div>
            </div>
		
		<div class="row">
			<div class="col-sm-12">
				
			</div>
		</div>
		
		
	
		<hr noshade="noshade" style="border:20px solid #fedfb0; display:none;">
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>

		<script>
        var languageClickL0 = document.getElementById('L0');
        var languageClickL1 = document.getElementById('L1');

        languageClickL1.onclick = function() {

            var znText = document.getElementById('znText');
            if (znText.style.display !== 'block') {
                document.getElementById("engText").style.display = "none";
                document.getElementById("znText").style.display = "block";
								document.getElementById("engText").classList.remove("show");
								//
													//studentName Contact Email
					document.getElementById('studentName').textContent = '學生姓名';
					document.getElementById('parentName').textContent = '家長姓名';
					document.getElementById('contactEmail').textContent = '電郵地址';
					document.getElementById('contactNumber').textContent = '聯絡電話';
					document.getElementById('sessionAttending').textContent = '簡介會時段 ';
					document.getElementById('noSeats').textContent = '預留座位';
					document.getElementById('primarySchool').textContent = '所屬小學';
					document.getElementById('neighbour').textContent = '附近';
					document.getElementById('other').textContent = '其他';
					//schoolInfo
					document.getElementById('schoolInfo').textContent = '2020年學校資訊日';
					//btn-submit
					document.getElementById('btn-back').textContent = '返回';
					$("#btn-back").text("返回");
					document.getElementById('btn-submit').textContent = '送出';
					$("#btn-submit").text("送出");



            } else {
                znText.style.display = 'none';
                document.getElementById("engText").style.display = "block";
								document.getElementById("znText").style.display = "none";
					document.getElementById('studentName').textContent = 'NAME OF STUDENT';
					document.getElementById('parentName').textContent = 'NAME OF PARENT';
					document.getElementById('contactEmail').textContent = 'EMAIL OF PARENT';
					document.getElementById('contactNumber').textContent = 'CONTACT NUMBER';
					document.getElementById('sessionAttending').textContent = 'SESSION ATTENDING';
					document.getElementById('noSeats').textContent = 'NO. OF SEATS RESERVED';
					document.getElementById('primarySchool').textContent = 'PRIMARY SCHOOL ATTENDING';
					document.getElementById('neighbour').textContent = 'Neighbours';
					document.getElementById('other').textContent = 'Other';
										//schoolInfo
					document.getElementById('schoolInfo').textContent = 'School Information Day 2019 Registration';
										//btn-submit
					document.getElementById('btn-back').textContent = 'Back';
					document.getElementById('btn-submit').textContent = 'Submit';
            }
        };
    </script>
  </body>
</html>