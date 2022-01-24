<?php 
include('class/Lista_uzytkownikow.php');
include('class/School.php');
$school = new School();
$school->loginStatus();
$user = new Lista_uzytkownikow();
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
				<a href="#"><strong><span class="ti-crown"></span> Lista uzytkownikow</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div >
						<table>
								<thead>
									<tr>
									<?php 
									//wyswietlenie przyciskow do edycji w przypadku gdy uzytkownik to admin
									if ($_SESSION['usertype']=='admin'){
										echo '	<th><a href ="dodaj_uzytkownika.php"><button type="button" name="add" id="addUser" class="btn btn-success btn-xs">Dodaj uzytkownika</button></a></th>
										<th><a href ="edytuj_uzytkownika.php"><button type="button" name="edit" id="editUser" class="btn btn-success btn-xs">Edytuj uzytkownika</button></a></th>
										<th><form action="uzytkownicy.php" method="POST"><button type="submit" name="delete" id="delete" class="btn btn-success btn-xs">
											Usun uzytkownika</button></tr></form></th>';
									}
									?>
									</tr>
								</thead>
								</table>
						</div>
								<?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["delete"])){
										Lista_Uzytkownikow::usunUzytkownika($_SESSION["idChange"]);
										echo '<meta http-equiv="Refresh" content="0;url=uzytkownicy.php">';
									}
								?>
					</div>
				</div>

				<table id="classList" class="table table-bordered table-striped">
					<thead>
						<tr>
						<thead><tr>
						<th>ID</th>
						<th>Imie</th>	
						<th>Nazwisko</th>
						<th>Typ uzytkownika</th>
						<th>Aktywny</th>	
						<th></th>	
						<th></th>												
						</tr></thead>
							<?php 
							$user->wyswietlListeUzytkownikow();		
							?>			
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	

<?php include('inc/footer.php');?>