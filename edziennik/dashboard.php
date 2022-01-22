<?php 
include('class/School.php');
$school = new School();
$school->loginStatus();
include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">    			
			<div class="alert alert-success fade in">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong><span class="ti ti-announcement fa-2x"></span> </strong> <strong>&nbsp;&nbsp;Witaj w swoim eDzienniku!</strong>.
			</div>						
			<div class="row"><!--row begins-->
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-warning text-center">
										<i class="ti-user"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Lista</strong></p>										
									</div>
								</div>
							</div>
							<a href="uzytkownicy.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>Wyswietl
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>				
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-info text-center">
										<i class="ti-crown"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Dzienniczek</strong></p>									   
									</div>
								</div>
							</div>
							<a href="dzienniczek.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>Wyswietl
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-success text-center">
										<i class="ti-blackboard"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Plan lekcji</strong></p>										
									</div>
								</div>
							</div>
							<a href="plan_lekcji.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>Wyswietl
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
			</div><!--row ends-->
			<!--row begins-->
				<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-success text-center">
										<i class="ti-harddrives"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Poczta</strong></p>										
									</div>
								</div>
							</div>
							<a href="poczta.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>Wyswietl
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card">
						<div class="content">
							<div class="row">
								<div class="col-xs-5">
									<div class="icon-big icon-danger text-center">
										<i class="ti-bar-chart-alt"></i>
									</div>
								</div>
								<div class="col-xs-7">
									<div class="numbers">
										<p><strong>Obecnosc</strong></p>										
									</div>
								</div>
							</div>
							<a href="obecnosci.php">
								<div class="footer">
								<hr />
								<div class="stats">
									<i class="ti-arrow-right"></i>Wyswietl
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>				
			</div>		
		</div>	
	</div>
</div>	
<?php include('inc/footer.php');?>
