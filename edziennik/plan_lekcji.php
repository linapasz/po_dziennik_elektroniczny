<?php 
include('class/School.php');
include('class/Plan_lekcji.php');
include('class/Przedmiot.php');
$plan=new Plan_lekcji();
$school = new School();
$school->loginStatus();
$przedmiot = new Przedmiot();
include('inc/header.php');
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
									<?php if ($_SESSION['usertype']=='admin'){
											echo '<th><a href ="dodaj_lekcje.php"><button type="button" name="add" id="addLesson" class="btn btn-success btn-xs">Dodaj lekcje</button></a></th>
											<th><form action="plan_lekcji.php" method="POST"><button type="submit" name="delete" id="delete" class="btn btn-success btn-xs">	Usun lekcje</button></th></form>
											<th><a href ="edytuj_lekcje.php"><button type="button" name="edit" id="editLesson" class="btn btn-success btn-xs">Edytuj lekcje</button></a></th>';
									}
									 if ($_SESSION['usertype']=='nauczyciel'){
										echo '<th><a href ="edytuj_lekcje.php"><button type="button" name="edit" id="editLesson" class="btn btn-success btn-xs">Edytuj lekcje</button></a></th>
										<th><form action="plan_lekcji.php" method="POST"><button type="submit" name="delete" id="delete" class="btn btn-success btn-xs">	Usun lekcje</button></th></form>';
									 }
									?>
									
									<th><form action="szczegoly_przedmiotu.php" method="POST"><button type="submit" name="przedmiot" id="przedmiot" class="btn btn-success btn-xs">Szczegoly przedmiotu</button></form></th>
									<th><form action="szczegoly_lekcji.php" method="POST"><button type="submit" name="lekcja" id="lekcja" class="btn btn-success btn-xs">Szczegoly lekcji</button></th></form>
									</tr>
								</thead>
								</table>
							</div>
						<?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["delete"]))
							   {

								$plan->usunLekcje($_SESSION["idChange"]);
								}
								if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["lekcja"]))
							   {
								$przedmiot->wyswietlSzczegolyPrzedmiotu($_SESSION["idChange"]);
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