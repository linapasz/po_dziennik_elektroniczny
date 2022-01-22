<?php 
include('class/Lista_uzytkownikow.php');
include('class/School.php');
$newUser = new Uzytkownik();
$_iduz='';
$_imie = '';
$_nazwisko= '';
$_dataUrodzenia= '';
$_pesel= '';
$_miejsceZamieszkania= '';
$_telefonKontaktowy= '';
$_typUzytkownika= '';
$_aktywny= '';
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
					<h4 class="modal-title"><i class="fa fa-plus"></i> Dodaj uzytkownika</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
						<label for="firstname" class="control-label">Id</label>
						<input type="text" class="form-control" id="iduz" name="iduz" placeholder="Id" value="<?=$_iduz; ?>" required>			
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Imie</label>
						<input type="text" class="form-control" id="imie" name="imie" placeholder="Imie" value="<?= $_imie; ?>" required>		
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Nazwisko</label>
						<input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Nazwisko" value="<?= $_nazwisko; ?>"required>				
					</div>	
					<div class="form-group">
						<label for="mname" class="control-label">Aktywnosc</label>	
						<select name="aktywny" id="aktywny" class="form-control"  value="<?= $_aktywny; ?>"required>
							<option value="">Wybierz</option>
							<option value="1">aktywny</option>
							<option value="0">nieaktywny</option>
							
						</select>
					</div>
					<div class="form-group">
						<label for="email" class="control-label">Data urodzenia</label>							
						<input type="text" class="form-control"  id="dataUrodzenia" name="dataUrodzenia" placeholder="yyyy-mm-dd" value="<?= $_dataUrodzenia; ?>">					
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">Pesel</label>							
						<input type="text" class="form-control"  id="pesel" name="pesel" placeholder="Pesel" value="<?= $_pesel; ?>">							
					</div>	
					<div class="form-group">
						<label for="mobile" class="control-label">Telefon</label>							
						<input type="text" class="form-control" id="telefonKontaktowy" name="telefonKontaktowy" placeholder="telefonKontaktowy" value="<?= $_telefonKontaktowy; ?>">						
					</div>		
					<div class="form-group">
						<label for="address" class="control-label">Adres</label>							
						<input type="text" class="form-control" id="miejsceZamieszkania" name="miejsceZamieszkania" placeholder="miejsceZamieszkania" value="<?= $_miejsceZamieszkania; ?>">							
					</div>
					<div class="form-group">
						<label for="mname" class="control-label">Typ uzytkownika</label>	
						<select name="typUzytkownika" id="typUzytkownika" class="form-control"  value="<?= $_typUzytkownika; ?>"required>
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

        $_iduz = $_POST["iduz"];
        $_imie = $_POST["imie"];
        $_nazwisko = $_POST["nazwisko"];
        $_aktywny = $_POST["aktywny"];
        $_dataUrodzenia = $_POST["dataUrodzenia"];
        $_telefonKontaktowy = $_POST["telefonKontaktowy"];
        $_miejsceZamieszkania = $_POST["miejsceZamieszkania"];
		$_typUzytkownika = $_POST["typUzytkownika"];

					$user->dodajUzytkownika($_iduz,$_imie, $_nazwisko, $_dataUrodzenia, $_pesel, $_miejsceZamieszkania, $_telefonKontaktowy, $_typUzytkownika, $_aktywny);
					}?>
						<a href='uzytkownicy.php'><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>