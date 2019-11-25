<?php
session_start();
if (!empty($_SESSION['idAgent'])) { //pour bloque acess en retour via la touche precedent
include('connexion.php'); 
if (isset($_POST['nomDepartement']) AND isset($_POST['telDepartement'])) {
	
		$nom = $_POST['nomDepartement'];
		$tel = $_POST['telDepartement'];


		$querry = $cnx->prepare("INSERT INTO departement(idDepartement, nomDepartement, telDepartement) VALUES (NULL, :nomDepartement, :telDepartement)");
		$querry->execute(array(
			'nomDepartement' => $nom, 
			'telDepartement' => $tel
			));


	


} ?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

		
	<?php include("./nav.php"); ?>
	<?php include("./nav_late.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<?php include 'nbb_bar.php';?>		
		<!--<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Departement</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Ajouter un Department</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="./create_departement.php">
							
								<div class="form-group">
									<label>Nom departement</label>
									<input class="form-control" name="nomDepartement" id="nomDepartement" placeholder="Nom De Departement">
								</div>

								<div class="form-group">
									<label>Téléphone departement</label>
									<input class="form-control" name="telDepartement" id="telDepartement" placeholder="Téléphone">
								</div>
								
								
								<button type="submit" class="btn btn-primary">Enregistrer</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	<?php include("./footer.php"); ?>
</body>

</html>
<?php 

}
else{
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
}
?>
