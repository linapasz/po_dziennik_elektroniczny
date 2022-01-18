<?php 
include('class/School.php');
$school = new School();
$school->loginStatus();
include('inc/header.php');
?>
<title>eDziennik</title>
<?php include('include_files.php');?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/subjects.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	<?php include('side-menu.php');	?>
	<div class="content">
		<div class="container-fluid">
			<div>   
				<a href="#"><strong><span class="ti-crown"></span> Oceny</strong></a>
				<hr>		
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title"></h3>
						</div>
						<div class="col-md-2" align="right">
							<button type="button" name="add" id="addSubject" class="btn btn-success btn-xs">Dodaj ocene</button>
						</div>
					</div>
				</div>
				<table id="subjectList" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Wartosc</th>
							<th>Przedmiot</th>	
							<th>Data</th>							
							<th></th>
							<th></th>							
						</tr>
					</thead>
				</table>
				
			</div>			
		</div>		
	</div>	
</div>	
<div id="subjectModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="subjectForm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Szczegoly oceny</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="teacher" class="control-label">Nazwa</label>					
					</div>	
					<div class="form-group">
						<label for="s_type" class="control-label">Wartosc</label><br>												
					</div>	
					<div class="form-group">
						<label for="code" class="control-label">Waga</label>				
					</div>
					<div class="form-group">
						<label for="teacher" class="control-label">Nauczyciel</label>
				
					</div>	
					<div class="form-group">
						<label for="teacher" class="control-label">Data wpisania</label>
			
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default">Zamknij</button>
				</div>
			</div>
		</form>
	</div>
</div>