<?php 
include('class/Plan_lekcji.php');
include('class/School.php');

$idLekcji = $_SESSION["idChange"];
$sql = "SELECT * FROM lekcje WHERE idlekcji='".$idLekcji."'";
$conn = mysqli_connect('localhost', 'root','', 'edziennik');
$result = mysqli_query($conn, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$dataLekcji=  $row['datalekcji'];
$idPrzedmiotu= $row['przedmioty_idprzedmiotu'];
$tematLekcji = $row['tematlekcji'];
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
			<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<a href='uzytkownicy.php'><button type="button" class="close" data-dismiss="modal">&times;</button></a>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Edytuj lekcje</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
						<label for="firstname" class="control-label">Id lekcji:  <?php echo $idLekcji ?></label>		
					</div>	
					<div class="form-group">
						<label for="firstname" class="control-label">Id przedmiotu</label>
						<input type="text" class="form-control" id="idprzedmiotu" name="idprzedmiotu" placeholder="<?php echo $idPrzedmiotu; ?>" value="<?= $idPrzedmiotu; ?>"required>				
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">Data lekcji</label>							
						<input type="text" class="form-control"  id="datalekcji" name="datalekcji" placeholder="<?php echo $dataLekcji; ?>" value="<?=$dataLekcji; ?>">					
					</div>	
					<div class="form-group">
						<label for="email" class="control-label">Temat lekcji</label>							
						<input type="text" class="form-control"  id="tematlekcji" name="tematlekcji" placeholder="<?php echo $tematLekcji; ?>" value="<?=$tematLekcji; ?>">					
					</div>	
				</div>
				<div class="modal-footer">
					
					<input type="submit" name="save" id="save" class="btn btn-info" value="Zapisz" />
					</form>
				
					<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$dataLekcji=  $_POST['datalekcji'];
					$idPrzedmiotu= $_POST['idprzedmiotu'];
					$tematLekcji= $_POST['tematlekcji'];
					$plan->edytujLekcje($idLekcji, $dataLekcji,$idPrzedmiotu, $tematLekcji);
					}?>
						<a href='plan_lekcji.php'><button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button></a>
				</div>
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>