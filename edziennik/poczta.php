<?php 
include('class/Skrzynka_odbiorcza.php');
include('class/School.php');
$idWiadomosci='';
$temat='';
$idNadawcy='';
$dataWyslania='';
$tresc='';
$idOdbiorcy='';
$skrzynka=new Skrzynka_odbiorcza();
$school = new School();
$school->loginStatus();
include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>

			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-crown"></i> Skrzynka odbiorcza</h4>
					<hr>
					<th><form action="wiadomosc_nowa.php" method="POST" name="new"><button type="submit" name="new" id="new" class="btn btn-success btn-xs"> Nowa wiadomosc</button></form></th>
				</div>
				<div class="modal-body">
				<div class="form-group">
				<table id="classList" class="table table-bordered table-striped">
					<thead>
						<tr>
						<thead><tr>
						<th><label forclass="control-label">Temat</label> </th>
						<th><label forclass="control-label">Nadawca</label> </th>
						<th><label forclass="control-label">Data</label> </th>
						<th></th>											
					</tr></thead>
					<tr>
					<?php	$skrzynka->wyswietlSkrzynke(); ?>
					</tr>
			</div>
	</div>
</div>	

<?php include('inc/footer.php');?>