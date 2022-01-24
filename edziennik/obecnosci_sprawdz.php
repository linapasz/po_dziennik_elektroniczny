<?php 
include('class/School.php');
include('class/Obecnosc.php');
include('class/Plan_lekcji.php');
include('inc/header.php');

$school = new School();
$school->loginStatus();
$obecnosc= new Obecnosc();
$plan = new Plan_lekcji();
?>

<title>eDziennik</title>
<?php include('include_files.php');?>
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-crown"></span> Obecnosc</strong></a>
				<hr>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
							<div>
								<table>
								<thead>
									<tr>
									<?php 
									 if ($_SESSION['usertype']!='uczen'){
										echo '
										<th><form action="obecnosci.php" method="POST"><button type="submit" name="powrot" id="powrot" class="btn btn-success btn-xs">	Powrot</button></th></form>';
									 }
									?>
								</thead>
								</table>
							</div>
					</div>
				</div>
				<table id="classList" class="table table-bordered table-striped">
					<thead>
						<tr>
						<thead><tr>
						<th>Imie</th>
						<th>Nazwisko</th>
						<th>Obecnosc</th>
						<th></th>	
						<th></th>										
						</tr></thead>

						<?php 
						//pobieranie danych z bazy i wyswietlanie
						$obecnosc->wyswietlObecnosc($_SESSION['idChange']);
						?>	
								
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	

<?php include('inc/footer.php');?>