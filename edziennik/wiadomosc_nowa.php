<?php 
include('class/Skrzynka_odbiorcza.php');
include('class/School.php');

date_default_timezone_set("Europe/Warsaw");

$skrzynka = new Skrzynka_odbiorcza();
$school = new School();
$school->loginStatus();
$temat='';
$idNadawcy=$_SESSION["userid"];
$dataWyslania=date("Y-m-d");
$tresc='';
$idOdbiorcy='';
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
					<h4 class="modal-title"><i class="fa fa-crown"></i> Nowa wiadomosc</h4>
				</div>


				<div class="modal-body">
						<div class="form-group">
								<label for="firstname" class="control-label">Temat</label>
								<input type="text" class="form-control" id="temat" name="temat" placeholder="Temat" value="<?= $temat; ?>" >		
							</div>	
							<div class="form-group">
								<label for="firstname" class="control-label">Nadawca</label>
								<th><?php echo $idNadawcy; ?></th>
							</div>	
							<div class="form-group">
								<label for="firstname" class="control-label">Odbiorca</label>
								<input type="text" class="form-control" id="idodbiorcyy" name="idodbiorcy" placeholder="idodbiorcy" value="<?= $idOdbiorcy; ?>" >					
							</div>	
							<div class="form-group">
								<label for="email" class="control-label">Tresc</label>							
								<input type="text" class="form-control" id="tresc" name="tresc" placeholder="Tresc" value="<?= $tresc; ?>" >				
</div>
							<div class="modal-footer">
							<th><form action="poczta.php" method="POST"><button type="submit" name="send" id="send" class="btn btn-info"> Wyslij</button></form></th>
							</form>

							<?php 
							//w przypadku wyslania wywolanie funkcji nowaWiadomosc
							if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["send"])){
							$temat=$_POST['temat'];
							$tresc=$_POST['tresc'];
							$idOdbiorcy=$_POST['idodbiorcy'];

							$skrzynka->nowaWiadomosc($temat,$idNadawcy,$dataWyslania,$tresc,$idOdbiorcy);	
							}?>	
							<a href='poczta.php'><button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></a>
							</div>
						</div>
				</div>
				

				
			</div>
				
	</div>
</div>
</div>	

<?php include('inc/footer.php');?>