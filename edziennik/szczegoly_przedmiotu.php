<?php 
include('class/Plan_lekcji.php');
include('class/School.php');

$idLekcji = $_SESSION["idChange"];
$sql = "SELECT datalekcji, przedmioty.nazwaprzedmiotu, przedmioty.idprzedmiotu, klasa.nazwaklasy, klasa.idklasy, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz, tematlekcji
FROM lekcje 
INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
WHERE idlekcji='".$idLekcji."'";
$conn = mysqli_connect('localhost', 'root','', 'edziennik');
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$tematLekcji = $row['tematlekcji'];
$dataLekcji=  $row['datalekcji'];
$idPrzedmiotu= $row['idprzedmiotu'];
$nazwaPrzedmiotu = $row['nazwaprzedmiotu'];
$nazwaKlasy = $row['nazwaklasy'];
$idKlasy = $row['idklasy'];
$nazwiskoNauczyciela = $row['nazwisko'];
$imieNauczyciela = $row['imie'];
$school = new School();
$school->loginStatus();
$plan = new Plan_Lekcji();

include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div id="lessonModal">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href='uzytkownicy.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					<h4 class="modal-title">Szczegoly przedmiotu</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="firstname" class="control-label">Id przedmiotu: </label>
						<th><?php echo $idPrzedmiotu; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Przedmiot: </label>
						<th><?php echo $nazwaPrzedmiotu; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Klasa: </label>
						<th><?php echo $nazwaKlasy; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Id klasy: </label>
						<th><?php echo $idKlasy; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Nauczyciel: </label>
						<th><?php echo $imieNauczyciela . " " . $nazwiskoNauczyciela; ?></th>				
					</div>		
				</div>
				<div class="modal-footer">
					
						<a href='plan_lekcji.php'><button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>