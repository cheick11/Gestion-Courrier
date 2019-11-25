<?php 
session_start();
if (!empty($_SESSION['idAgent'])) { //pour bloque acess en retour via la touche precedent
	  include('connexion.php');
/*	  if (isset($_POST['supprimer'])){ 

 if(!empty($_POST['idCour'])) 
    {
        $idCour = $_POST['idCour'];
    

    
        $sql = $cnx->query("DELETE FROM courrier WHERE idCour = '".$idCour."'");
      
    }

    
}*/
if(isset($_POST['transfer'])){

 $idCour = $_POST['idCour'];

  $sql="update courrier set etat='Transferer' WHERE idCour='".$idCour."'";
  $req=$cnx->query($sql);

}


		$reponse = $cnx->query('SELECT idCour, expCour, objetCour, date_Arriver, etat, courrier.idDepartement, courrier.idType, commentaire, nomDepartement, titre, docCour FROM courrier, departement, typecourrier WHERE courrier.idDepartement=departement.idDepartement AND courrier.idType=typecourrier.idType AND courrier.etat="Attente"   ORDER BY courrier.idCour DESC');

		$courrier = "";
		while ($data = $reponse->fetch()) {

		$courrier .=' <form class="form" action="liste_courrier_assistdir.php" role="form" method="post"><tr><td>' .$data["idCour"]. '</td><td>' .$data["expCour"]. '</td><td>' .$data["objetCour"]. '</td><td>' .$data["date_Arriver"]. '</td><td>' .$data["nomDepartement"]. '</td><td>' .$data["etat"]. '</td><td>' .$data["docCour"]. '</td><td>' .$data["titre"]. '</td><td>' .$data["commentaire"]. '</td> <td width="1200">
						    			<a class="btn btn-default"href="view_courrier_assistdir.php?name='.$data["idCour"]. '"><span class="glyphicon glyphicon-eye-open"></span> Voir</a> </td>
						    		<td width="1200">	<a class="btn btn-primary"href="update_assistdir.php?name='.$data["idCour"].'" ><span class="glyphicon glyphicon-pencil"></span> Modifier</a> </td>
						    			<td><input type="hidden" name="idCour" value="'.$data['idCour'].' "></td> <td width="1200"> <button name="transfer"class="btn btn-success"><span class="glyphicon glyphicon-share"></span>Tranfere</button>
						    		</td> </tr> </form>' ;
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
			<h1 class="page-header"><strong>Courrier </strong><a href="ajout_courrier_assistdir.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus "></span> Ajouter</a> </h1>
			</div>
		</div><!--/.row-->
				
	<div class="container admin">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Liste des Courriers</div>
					<div class="panel-body">
						<table id="libele" class="table table-striped table-bordered" data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead class="libele"> 
						    <tr>
						        <th data-sortable="true"width="1200">N° Courrier</th>
						        <th data-sortable="true"width="8800">Nom Expediteur</th>
						        <th data-sortable="true">Objet</th>
						        <th data-sortable="true">Date Arrive </th>
						        <th data-sortable="true">Destination </th>
						        <th data-sortable="true">Etat du Courrier</th>
						        <th data-sortable="true">Fichier</th>
						        <th data-sortable="true">Type du Courrier</th>
						        <th data-sortable="true" width=100%>Commentaire</th>
						        <th data-sortable="true" colspan="3">  Action</th>
						    </tr>

						    </thead> 
						    <tbody>
						
						    	
						    	<?php
						    	if (isset($courrier)) {
						    		echo $courrier;
						    	}
						    	?>
						    
						    </tbody>

						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		</div>
		
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

