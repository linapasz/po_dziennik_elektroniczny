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
				<a href="#"><strong><span class="ti-crown"></span> Plan lekcji</strong></a>
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
									<th><form action="obecnosci_sprawdz.php" method="POST"><button type="submit" name="obecnosc" id="obecnosc" class="btn btn-success btn-xs">	Obecnosc</button></th></form> </tr>
									
								</thead>
								</table>
							</div>
							<?php 
							//w przypadku nacisniecia przycisku obecnosci przesylanie danych i przejscie do innego pliku
								if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["obecnosc"]))
							   {
								echo '<meta http-equiv="Refresh" content="0;url=obecnosci_sprawdz.php">';
								}
						 	?>
					</div>
				</div>
				<table id="classList" class="table table-bordered table-striped">
					<thead>
						<tr>
						<thead><tr>
						<th>Data lekcji</th>
						<th>Przedmiot</th>
						<th>Klasa</th>
						<th>Nauczyciel</th>	
						<th></th>												
						</tr></thead>	

							<?php 
							//pobieranie planu z bazy danych i wyswietlenie
							$plan->wyswietlPlan($_SESSION["userid"]);
							?>			
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	


<?php include('inc/footer.php');?>