<?php 
ob_start();
include('class/School.php');
if(!empty($_SESSION["userid"])) {	
	header("location: dashboard.php"); 	
}
$school = new School();
$errorMessage =  $school->login();
include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">		
	<div class="col-md-6">                    
		<div class="panel panel-info">
			<div class="panel-heading" style="background:#000;color:white;">
				<div class="panel-title">Logowanie</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($errorMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="id" name="id" placeholder="id" required>                                        
					</div>                               
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="login" value="Zaloguj" class="btn btn-success">						  
						</div>						
					</div>	
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						ID: admin1, uczen1, rodzi1, naucz1<br><br><br>									
						</div>						
					</div>	
				</form>   
			</div>                     
		</div>  
	</div>
</div>	
<?php include('inc/footer.php');?>
