<?php 
session_start();
if (!empty($_SESSION['idAgent'])) { //pour bloque acess en retour via la touche precedent
  include('connexion.php');

		$reponse = $cnx->query('SELECT idAgent, nomAgent, telAgent, agent.idDepartement, departement.nomDepartement FROM agent,  departement WHERE agent.idDepartement=departement.idDepartement ORDER BY agent.idAgent DESC');

		$agent = "";
		while ($data = $reponse->fetch()) {

			$agent .= '<tr><td>'.$data["idAgent"].'</td><td>'.$data["nomAgent"].'</td><td>'.$data["telAgent"].'</td><td>'.$data["nomDepartement"].'</td></tr>';
		}        

		$reponse->closeCursor(); 


	
 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GESTION COURRIER</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
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
	<?php include("./nav_late_assistdir.php"); ?>

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
				<h1 class="page-header"><strong>AGENT </strong><!--<a href="create_agent.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus "></span> Ajouter</a>--> </h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Liste des agents</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered" data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-sortable="true">N° Agent</th>
						        <th data-sortable="true">Nom Agent</th>
						        <th data-sortable="true">Téléphone Agent</th>
						        <th data-sortable="true">Departement</th>
						    </tr>
						    </thead>

						    <tbody>

						    	<?php
						    	if (isset($agent)) {
						    		echo $agent;
						    	}
						    	?>
						    
						    </tbody>

						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
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
