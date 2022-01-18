<?php 
include('class/School.php');
include('class/Plan_lekcji.php');
$lesson=new Plan_lekcji();
$school = new School();
$school->loginStatus();
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
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
							<div>
								<table>
								<thead>
									<tr>
									<th><a href ="addLesson.php"><button type="button" name="add" id="addLesson" class="btn btn-success btn-xs">Dodaj lekcje</button></a></th>
									<th><a href ="editLesson.php"><button type="button" name="edit" id="editLesson" class="btn btn-success btn-xs">Edytuj lekcje</button></a></th>
									<th><form action="uzytkownicy.php" method="POST"><button type="submit" name="delete" id="delete" class="btn btn-success btn-xs">
									Usun uzytkownika</button></tr></form>
									<tr><form action="przedmioty.php" method="POST"><button type="submit" name="subject" id="subject" class="btn btn-success btn-xs">Szczegoly przedmiotu</button></tr></form>
									</tr>
								</thead>
								</table>
							</div>
						<?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["subject"]))
							   {
								//Lista_Uzytkownikow::usunUzytkownika($_SESSION["idChange"]);
								//echo '<meta http-equiv="Refresh" content="0;url=uzytkownicy.php">';
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
						<th>Id przedmiotu</th>	
						<th>Klasa</th>
						<th>Nauczyciel</th>	
						<th></th>												
						</tr></thead>	

							<?php 
							$lesson->wyswietlPlan();
							?>			
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	

<?php include('inc/footer.php');?>