<?php 
include('class/Plan_lekcji.php');
include('class/Lekcja.php');
include('class/School.php');
//laczenie z baza
$idLekcji = $_SESSION["idChange"];
$sql = "SELECT datalekcji, przedmioty.nazwaprzedmiotu, przedmioty.idprzedmiotu, klasa.nazwaklasy, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz, tematlekcji
FROM lekcje 
INNER JOIN przedmioty ON lekcje.przedmioty_idprzedmiotu=przedmioty.idprzedmiotu
INNER JOIN uzytkownicy ON przedmioty.uzytkownicy_iduz = uzytkownicy.iduz
INNER JOIN klasa ON klasa.idklasy=przedmioty.klasa_idklasy
WHERE idlekcji='".$idLekcji."'";
$conn = mysqli_connect('localhost', 'root','', 'edziennik');
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//wyluskanie danych z bazu
$tematLekcji = $row['tematlekcji'];
$dataLekcji=  $row['datalekcji'];
$idPrzedmiotu= $row['idprzedmiotu'];
$nazwaPrzedmiotu = $row['nazwaprzedmiotu'];
$nazwaKlasy = $row['nazwaklasy'];
$nazwiskoNauczyciela = $row['nazwisko'];
$imieNauczyciela = $row['imie'];
$school = new School();
$school->loginStatus();
$plan = new Plan_Lekcji();
$lekcja = new Lekcja();

include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div id="lessonModal">
	<div class="modal-dialog">
			<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<a href='szczegoly_lekcji.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					<h4 class="modal-title">Szczegoly lekcji</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
						<label for="firstname" class="control-label">Id lekcji:  <?php echo $idLekcji ?></label>		
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Klasa: </label>
						<th><?php echo $nazwaKlasy; ?></th>				
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">Data lekcji: </label>							
						<th><?php echo $dataLekcji; ?></th>				
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Temat lekcji: </label>
						<th><?php echo $tematLekcji; ?></th>				
					</div>	
	
				</div>
				<div class="modal-footer">
					</form>
						
						<a href='plan_lekcji.php'><button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>