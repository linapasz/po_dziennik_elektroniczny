<?php 
include('class/Dzienniczek.php');
include('class/School.php');
$idOceny="";
$wartoscOceny="";
$wagaOceny="";
$idNauczyciela = $_SESSION['userid']; 
$dataWpisania=""; 
$idUcznia="";
$school = new School();
$school->loginStatus();
$dzienniczek = new Dzienniczek();
include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div id="studentModal">
	<div class="modal-dialog">
			<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<a href='dzienniczek.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Dodaj ocene</h4>
				</div>
				<div class="modal-body">	
					<div class="form-group">
						<label for="firstname" class="control-label">Wartosc oceny</label>
						<input type="text" class="form-control" id="wartoscoceny" name="wartoscoceny" placeholder="wartoscoceny" value="<?= $wartoscOceny; ?>" required>		
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Waga oceny</label>
						<input type="text" class="form-control" id="wagaoceny" name="wagaoceny" placeholder="wagaoceny" value="<?= $wagaOceny; ?>"required>				
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">Id nauczyciela</label>							
						<input type="text" class="form-control"  id="idnauczyciela" name="idnauczyciela" placeholder="<?php echo $idNauczyciela ?>" value="<?= $idNauczyciela?>">					
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">datawpisania</label>							
						<input type="text" class="form-control"  id="datawpisania" name="datawpisania" placeholder="rrrr-mm-dd" value="<?= $dataWpisania; ?>">							
					</div>	
					<div class="form-group">
						<label for="address" class="control-label">Id Ucznia</label>							
						<input type="text" class="form-control" id="iducznia" name="iducznia" placeholder="iducznia" value="<?= $idUcznia; ?>">							
					</div>								
				</div>
				<div class="modal-footer">
					<input type="submit" name="save" id="save" class="btn btn-info" value="Zapisz" />
					</form>
				
					<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$wartoscOceny=$_POST["wartoscoceny"];
					$wagaOceny=$_POST["wagaoceny"];
					$idNauczyciela=$_POST["idnauczyciela"];
					$dataWpisania=$_POST["datawpisania"];
					$idUcznia=$_POST["iducznia"];
					$dzienniczek->wpiszOcene( $wartoscOceny, $wagaOceny, $idNauczyciela, $dataWpisania, $idUcznia);
					}
					?>
						<a href='dzienniczek.php'><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>