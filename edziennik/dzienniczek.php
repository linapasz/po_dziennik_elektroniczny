<?php 
include('class/School.php');
include('class/Dzienniczek.php');
include('class/Ocena.php');
$school = new School();
$school->loginStatus();
$ocena = new Ocena();
$dzienniczek = new Dzienniczek();
include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/subjects.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-crown"></span> Oceny</strong></a>
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
							<?php if($_SESSION['usertype']=='nauczyciel'||$_SESSION['usertype']=='admin'){
							echo '	<th><a href ="dodaj_ocene.php"><button type="button" name="add" id="dodaj" class="btn btn-success btn-xs">Dodaj ocene</button></a></th>
							<th><form action="dzienniczek.php" method="POST"><button type="submit" name="delete" id="delete" class="btn btn-success btn-xs">	Usun ocene</button></th></form>
							<th><a href ="edytuj_ocene.php"><button type="button" name="edit" id="editLesson" class="btn btn-success btn-xs">Edytuj ocene</button></a></th>';
							} ?>
							<th><form action="szczegoly_oceny.php" method="POST"><button type="submit" name="szczegoly" id="szczegoly" class="btn btn-success btn-xs">Szczegoly oceny</button></form></th>
							</tr>
						</table>
						</thead>
						</div>
					</div>
				</div>
				<?php 		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["delete"]))
							   {

								$dzienniczek->usunOcene($_SESSION["idOceny"]);
								}
								if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["dodaj"]))
							   {
								$dzienniczek->dodajOcene($_SESSION["idOceny"]);
								}
								if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["szczegoly"]))
							   {
								$ocena->wyswietlSzczegoly();
								}
						 ?>
				<table id="subjectList" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Wartosc</th>
							<th>Id ucznia</th>
							<th>Uczen</th>
							<th>Id nauczyciela</th>	
							<th>Data</th>							
							<th></th>							
						</tr>
					</thead>
					<?php $dzienniczek->wyswietlOceny(); ?>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	
<div id="subjectModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="subjectForm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Szczegoly oceny</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="teacher" class="control-label">Nazwa</label>					
					</div>	
					<div class="form-group">
						<label for="s_type" class="control-label">Wartosc</label><br>												
					</div>	
					<div class="form-group">
						<label for="code" class="control-label">Waga</label>				
					</div>
					<div class="form-group">
						<label for="teacher" class="control-label">Nauczyciel</label>
				
					</div>	
					<div class="form-group">
						<label for="teacher" class="control-label">Data wpisania</label>
			
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default">Zamknij</button>
				</div>
			</div>
		</form>
	</div>
</div>