<?php 
include('class/Lista_uzytkownikow.php');
include('class/School.php');
$newUser = new Uzytkownik();
$iduz=$_SESSION["idChange"];

$sql = "SELECT * FROM uzytkownicy WHERE iduz='".$iduz."'";
$conn = mysqli_connect('localhost', 'root','', 'edziennik');
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$imie = $row['imie'];
$nazwisko=  $row['nazwisko'];
$dataUrodzenia=  $row['dataurodzenia'];
$pesel= $row['pesel'];
$miejsceZamieszkania= $row['miejscezamieszkania'];
$telefonKontaktowy= $row['telefonkontaktowy'];
$typUzytkownika= $row['typuzytkownika'];
$aktywny= $row['aktywny'];
$school = new School();
$school->loginStatus();
$user = new Lista_uzytkownikow();

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
					<a href='uzytkownicy.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Edytuj uzytkownika</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
						<label for="firstname" class="control-label">Id <?php echo $iduz ?></label>		
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Imie</label>
						<input type="text" class="form-control" id="imie" name="imie" placeholder="<?php echo $imie; ?>" value="<?=$imie; ?>" required>		
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Nazwisko</label>
						<input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="<?php echo $nazwisko; ?>" value="<?= $nazwisko; ?>"required>				
					</div>	
					<div class="form-group">
						<label for="mname" class="control-label">Aktywnosc</label>	
						<select name="aktywny" id="aktywny" class="form-control"  value="<?=$aktywny; ?>"required>
							<option value="">Wybierz</option>
							<option value="1">aktywny</option>
							<option value="0">nieaktywny</option>
							
						</select>
					</div>
					<div class="form-group">
						<label for="email" class="control-label">Data urodzenia</label>							
						<input type="text" class="form-control"  id="dataUrodzenia" name="dataUrodzenia" placeholder="<?php echo $dataUrodzenia; ?>" value="<?=$dataUrodzenia; ?>">					
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">Pesel</label>							
						<input type="text" class="form-control"  id="pesel" name="pesel" placeholder="<?php echo $pesel; ?>" value="<?= $pesel; ?>">							
					</div>	
					<div class="form-group">
						<label for="mobile" class="control-label">Telefon</label>							
						<input type="text" class="form-control" id="telefonKontaktowy" name="telefonKontaktowy" placeholder="<?php echo $telefonKontaktowy; ?>" value="<?= $telefonKontaktowy; ?>">						
					</div>		
					<div class="form-group">
						<label for="address" class="control-label">Adres</label>							
						<input type="text" class="form-control" id="miejsceZamieszkania" name="miejsceZamieszkania" placeholder="<?php echo $miejsceZamieszkania; ?>" value="<?= $miejsceZamieszkania; ?>">							
					</div>
					<div class="form-group">
						<label for="mname" class="control-label">Typ uzytkownika</label>	
						<select name="typUzytkownika" id="typUzytkownika" class="form-control"  value="<?= $typUzytkownika; ?>"required>
							<option value="">Wybierz</option>
							<option value="admin">administrator</option>
							<option value="nauczyciel">nauczyciel</option>
							<option value="rodzic">rodzic</option>
							<option value="uczen">uczen</option>
							
						</select>
					</div>									
				</div>
				<div class="modal-footer">
					<input type="submit" name="save" id="save" class="btn btn-info" value="Zapisz" />
					</form>
				
					<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){

					$imie = $_POST["imie"];
					$nazwisko = $_POST["nazwisko"];
					$aktywny = $_POST["aktywny"];
					$dataUrodzenia = $_POST["dataUrodzenia"];
					$telefonKontaktowy = $_POST["telefonKontaktowy"];
					$miejsceZamieszkania = $_POST["miejsceZamieszkania"];
					$typUzytkownika = $_POST["typUzytkownika"];
					$user->edytujUzytkownika($iduz,$imie, $nazwisko, $dataUrodzenia, $pesel, $miejsceZamieszkania, $telefonKontaktowy, $typUzytkownika, $aktywny);
					}?>
						<a href='uzytkownicy.php'><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>