<?php 
session_start();
if (!empty($_SESSION['idAgent'])) { //pour bloque acess en retour via la touche precedent
include('connexion.php');
if(isset($_POST['submit'])){
if (!empty($_POST['expCour']) AND !empty($_POST['objetCour'])  AND !empty($_POST['date_Arriver']) AND !empty($_POST['idDepartement']) AND !empty($_FILES['docCour'])
	AND !empty($_POST['idType']) AND !empty($_POST['commentaire'])) {
	
		$expCour = $_POST['expCour'];
		$objetCour = $_POST['objetCour'];
		$date_Arriver = $_POST['date_Arriver'];
		$idDepartement = $_POST['idDepartement'];
		$docCour = $_FILES['docCour']['name'];
		$idType = $_POST['idType'];
		$commentaire = $_POST['commentaire'];


		if($docCour)
            {
                $donnees = $cnx->query("UPDATE courrier  set expCour = '".$expCour."', objetCour = '".$objetCour."', date_Arriver = '".$date_Arriver."', idDepartement = '".$idDepartement."', docCour = '".$docCour."', idType ='".$idType."', commentaire ='".$commentaire."'   WHERE idCour = '".$_GET['name']."' ");
                
            }
            else
            {
               $donnees = $cnx->query("UPDATE courrier  set expCour = '".$expCour."', objetCour = '".$objetCour."', date_Arriver = '".$date_Arriver."', idDepartement = '".$idDepartement."', idType ='".$idType."', commentaire ='".$commentaire."'   WHERE idCour = '".$_GET['name']."' ");
            }
 ?>
 <script type="text/javascript">
 	window.location.href='liste_courrier_assistdir.php';
 </script>
 <?php
		/**$sql="INSERT INTO courrier(expCour, objetCour, date_Arriver, idDepartement, etat, docCour, idType, commentaire) VALUES ('".$expCour."', '".$objetCour."', '".$date_Arriver."', '".$idDepartement."', 'Attente', '".$docCour."', '".$idType."', '".$commentaire."' )";**/

/*if (isset($_FILES['docCour']) AND $_FILES['docCour']['error'] == 0) {

$infosfichier = pathinfo($_FILES['docCour']['name']); 
 $extension_upload = $infosfichier['extension'];                
 $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');  // ajout extentyion de fichier pdf doc 
                if (in_array($extension_upload, $extensions_autorisees))     {

if($req=$cnx->query($sql)){ 

  move_uploaded_file($_FILES['docCour']['tmp_name'], 'docCour/'.basename($_FILES['docCour']['name'])); 
  

  }else{
  	echo ' erreur de requet ';
  }
   }else{
   	echo 'mauvais format du fichier';
   }
    }else{
    	echo 'erreur du fichier non charger';
    }
            
}
else{
	echo 'Veuillez remplir tout les champs';
	 */
    }

}
?>

<!--le requete pour upload-->

<?php 

$sqlmode= "SELECT * FROM courrier WHERE idCour='".$_GET['name']."'";
$reqmode= $cnx->query($sqlmode);
$doneesmode=$reqmode->fetch();



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
				<h1 class="page-header">MODIFICATION DU COURRIER</h1>
			</div>
		</div><!--/.row--> 
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">COURRIER</div>
					<div class="panel-body">
						<div class="col-md-6">
							
						<form role="form" action="" method="post" enctype="multipart/form-data"> 
																
								<div class="form-group">
									<label for="expCour">Expediteur</label>
									<input type="text" class="form-control" name="expCour" id="expCour" placeholder="Veuillez saisir le nom d'expediteur" value="<?php echo $doneesmode['expCour'];?>">
								</div>
								<div class="form-group">
									<label for="objetCour">Objet</label>
									<input  type="text" class="form-control" name="objetCour" id="objetCour" placeholder="Veuillez saisir l'Objet du Courrier" value="<?php echo $doneesmode['objetCour'];?>">
								</div>

                                <div class="form-group">
									<label for="type de courrier">Type de Courrier</label>
									<select class="form-control" name="idType" id="idType">
										<?php 
										$sql1="SELECT * FROM typecourrier WHERE idType = '".$doneesmode['idType']."'";
										$req1=$cnx->query($sql1);
										while ($donnees=$req1->fetch()) {
										
						
										?>
										<option value="<?php echo $donnees['idType']; ?>"><?php echo $donnees['titre']; ?></option>
									<?php } ?>
									<?php 
										$sql1="SELECT * FROM typecourrier WHERE idType != '".$doneesmode['idType']."'";
										$req1=$cnx->query($sql1);
										while ($donnees=$req1->fetch()) {
										
						
										?>
										<option value="<?php echo $donnees['idType']; ?>"><?php echo $donnees['titre']; ?></option>
									<?php } ?>
									
									</select>
								</div>

								<div class="form-group">
									<label for="destination">Destination</label>
									<select class="form-control" name="idDepartement" id="idDepartement">
										<?php 
										$sql1="SELECT * FROM departement WHERE idDepartement='".$doneesmode['idDepartement']."'";
										$req1=$cnx->query($sql1);
										while ($donnees=$req1->fetch()) {
										
						
										?>
										<option value="<?php echo $donnees['idDepartement']; ?>"><?php echo $donnees['nomDepartement']; ?></option>
									<?php } ?>
									<?php 
										$sql1="SELECT * FROM departement WHERE idDepartement !='".$doneesmode['idDepartement']."'";
										$req1=$cnx->query($sql1);
										while ($donnees=$req1->fetch()) {
										
						
										?>
										<option value="<?php echo $donnees['idDepartement']; ?>"><?php echo $donnees['nomDepartement']; ?></option>
									<?php } ?>
									
									</select>
								</div>
                                
								<div class="form-group">
									<label for="date Arriver">Date Arriver </label>
									<input type="date" class="form-control" name="date_Arriver" id="date_Arriver"placeholder="Veuillez saisir la Date" value="<?php echo $doneesmode['date_Arriver'];?>">
								</div>
																

								
								<div class="form-group">
									<label for="commentaire">Commentaire </label>
									<textarea class="form-control" rows="3"  name="commentaire" id="commentaire"><?php echo strip_tags($doneesmode['commentaire']);?></textarea>
								</div>
								
			                    <button type="submit" class="btn btn-primary" id="submit" name="submit" value="upload">Modifier</button>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="docCour">Fichier-jointe</label>
									<img src="./docCour/<?php echo($doneesmode['docCour'])?>" width="445" height="500">
									<input type="file" name="docCour" id="docCour">
									 <p class="help-block">Exemple scan 001.jpeg </p>
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

