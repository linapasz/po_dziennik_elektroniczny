<?php 
include('class/Skrzynka_odbiorcza.php');
include('class/School.php');
$skrzynka = new Skrzynka_odbiorcza();
$school = new School();
$school->loginStatus();
$idWiadomosci=$_SESSION["idWiadomosci"];
$sql = "SELECT temat, idnadawcy, datawyslania, tresc, uzytkownicy_iduz FROM wiadomosci WHERE idwiadomosci='$idWiadomosci'";
$conn = mysqli_connect('localhost', 'root','', 'edziennik');
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$temat=$row['temat'];
$idNadawcy=$row['idnadawcy'];
$dataWyslania=$row['datawyslania'];
$tresc=$row['tresc'];
$idOdbiorcy=$row['uzytkownicy_iduz'];

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
					<a href='poczta.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					
					<h4 class="modal-title"><i class="fa fa-crown"></i> Wiadomosc</h4>
					</div>
					<div class="modal-body">
					<div class="form-group">
							<label for="firstname" class="control-label">Temat</label>
							<br>
							<th><?php echo $temat ?></th>		
						</div>	
						<div class="form-group">
							<label for="firstname" class="control-label">Nadawca</label>
							<br>
							<th><?php echo $idNadawcy?></th>			
						</div>	
						<div class="form-group">
							<label for="firstname" class="control-label">Odbiorca</label>
							<br>
							<th><?php echo $idOdbiorcy ?></th>				
						</div>	
						<div class="form-group">
							<label for="email" class="control-label">Data wyslania</label>
							<br>							
							<th><?php echo $dataWyslania?></th>					
						</div>	
						<div class="form-group">
							<label for="email" class="control-label">Tresc</label>	
							<br>						
							<th><?php echo $tresc?></th>							
						</div>	
					</div>

				<div class="modal-footer">
					<input type="submit" name="delete" id="delete" class="btn btn-info" value="Usun" />
					</form>
					<?php 
					if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["delete"])){				
						$skrzynka->usunWiadomosc($idWiadomosci);
					}
					?>
						<a href='poczta.php'><button type="button" class="btn btn-default" data-dismiss="modal">Powrot</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>