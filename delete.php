<?php 
session_start();
include ('connexion.php');
if (isset($_POST['submit'])){ 

 if(!empty($_GET['idCour'])) 
    {
        $idCour = checkInput($_GET['idCour']);
    }

    if(!empty($_POST)) 
    {
        $idCour = checkInput($_POST['idCour']);
      //  $cnx = Database::connect();
       *// $sql = $cnx->prepare("DELETE FROM courrier WHERE idCour = ?");
        //$sql->execute(array($idCour));
       // Database::disconnect();
       // header("Location: liste_courrier.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
   
}
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
	<!--<?php include("./nav.php"); ?>
	<?php include("./nav_late.php"); ?>-->
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Suppression DU COURRIER</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">COURRIER A SUPPRIMER

						
					</div>

					<div class="panel-body">
						<div class="container admin">
					            <div class="row">
					               <!-- <h1><strong>Supprimer un Courrier</strong></h1>
					                <br>-->
					                <form class="form" action="./delete.php" role="form" method="post">
					                    <input type="hidden" name="idCour" value="<?php echo $idCour;?>"/>
					                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
					                    <div class="form-actions">
					                      <button type="submit" class="btn btn-warning">Oui</button>
					                      <a class="btn btn-default" href="liste_courrier.php">Non</a>
					                    </div>
					                </form>
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