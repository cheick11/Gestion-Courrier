<?php 
session_start();
if (!empty($_SESSION['idAgent'])) { //pour bloque acess en retour via la touche precedent
include ('connexion.php');

$reponse = $cnx->query("SELECT idCour, expCour, objetCour, date_Arriver, etat, courrier.idDepartement, courrier.idType, commentaire, nomDepartement, titre, docCour FROM courrier, departement, typecourrier WHERE courrier.idDepartement=departement.idDepartement AND courrier.idType=typecourrier.idType AND idCour='" .$_GET['name']. "' ORDER BY courrier.idCour DESC");

$data=$reponse->fetch();



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GESTION COURRIER</title>

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
				<h1 class="page-header">SAISI DU COURRIER</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">COURRIER 

						<a href="espace_assistdir.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

					</div>

					<div class="panel-body">
						<div class="col-md-6">
							
						<form role="form" action="ajout_courrier.php" method="post" enctype="multipart/form-data"> 
																
								<div class="form-group">
									<label>Expediteur :</label>
									<?php echo $data['expCour']?>
								</div>
								<div class="form-group">
									<label>Objet :</label>
									<?php echo $data['objetCour']?>
								</div>

                                <div class="form-group">
									<label>Type de Courrier :</label>
									<?php echo $data['titre']?>
								</div>

								<div class="form-group">
									<label>Destination :</label>
									<?php echo $data['nomDepartement']?>
								</div>
                                
								<div class="form-group">
									<label>Date Arriver: </label>
									<?php echo $data['date_Arriver']?>
								</div>
																
								<div class="form-group">
									<label>Fichier-jointe:</label>
									<a target="_blank" href="docCour/<?php echo $data['docCour']?>"> <?php echo $data['docCour']?></a>
								</div>
								
								<div class="form-group">
									<label>Commentaire : </label>
									<?php echo $data['commentaire']?>
								</div>
								
			                  
								
							</div>


							<div class="col-sm-6">
				                 <div class="thumbnail">
				                     <img src="<?php echo 'docCour/' . $data['docCour'] ;?>" alt="name">
				                    
				                     </div>
				                 </div>
				             </div> 
			
						
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
