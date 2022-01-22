<?php 
include('class/Dzienniczek.php');
include('class/School.php');

$idOceny= $_SESSION["idOceny"];
$sql = "SELECT ocenyczastkowe.idoceny, ocenyczastkowe.wartoscoceny, ocenyczastkowe.wagaoceny, ocenyczastkowe.datawpisania, przedmioty.nazwaprzedmiotu, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko
FROM ocenyczastkowe
INNER JOIN uzytkownicy ON uzytkownicy.iduz=ocenyczastkowe.idnauczyciela
INNER JOIN przedmioty ON przedmioty.uzytkownicy_iduz=ocenyczastkowe.idnauczyciela
INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
WHERE ocenyczastkowe.idoceny=$idOceny";
$conn = mysqli_connect('localhost', 'root','', 'edziennik');
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nazwaPrzedmiotu = $row['nazwaprzedmiotu'];
$nazwaKlasy = $row['nazwaklasy'];
$wartoscOceny = $row['wartoscoceny'];
$wagaOceny = $row['wagaoceny'];
$dataWpisania = $row['datawpisania'];
$nazwiskoNauczyciela = $row['nazwisko'];
$imieNauczyciela = $row['imie'];
$school = new School();
$school->loginStatus();

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
					<a href='dzienniczek.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					<h4 class="modal-title">Szczegoly oceny</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="firstname" class="control-label">Id oceny: </label>
						<th><?php echo $idOceny; ?></th>				
					</div>	
					<label for="firstname" class="control-label">Wartosc oceny: </label>
						<th><?php echo $wartoscOceny; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Waga oceny: </label>
						<th><?php echo $wagaOceny; ?></th>				
					</div>
					<div class="form-group">
						<label for="firstname" class="control-label">Nauczyciel: </label>
						<th><?php echo $imieNauczyciela . " " . $nazwiskoNauczyciela; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Klasa: </label>
						<th><?php echo $nazwaKlasy; ?></th>				
					</div>	
				<div class="modal-footer">
					
						<a href='dzienniczek.php'><button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>