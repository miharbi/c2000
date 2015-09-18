<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img alt="Brand" src="img/logo.png" style="height: 50px; margin-top: -15px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
  	  <ul class="nav navbar-nav navbar-left">
  	  	<li>
  	  		<h5 class="hidden-sm hidden-xs" style="max-width: 22em;">
  	  			<small>
  	  				<strong>Pensamiento de Monta&ntilde;ismo</strong><br>
  	  				<script language="JavaScript" src="js/frase.js"> </script>
  				</small>
  	  		</h5>
  	  	</li>
  	  </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size: 30px;" >
        <li>
          <form action="?id=includes/busqueda.php" method="post" role="search" style="margin-top: 0.5em;">
              <input class="form-control" placeholder="Buscar..." name="dato"  type="text" />
           </form>
        </li>
        <?php 
        $top_nav = true;
        include 'includes/homeMenu.php'; 
        ?>
        <li><a target="_blank" href="https://www.facebook.com/pages/Cumbres2000/172992899418225"><i class="fa fa-facebook-square"></i></a></li>
		    <li><a target="_blank" href="http://instagram.com/cumbres2000"><i class="fa fa-instagram"></i></a></li>
		    <li><a target="_blank" href="http://www.twitter.com/Cumbres2000"><i class="fa fa-twitter-square"></i></a></li>
		    <li><a target="_blank" href="https://vimeo.com/davidrclimb"><i class="fa fa-vimeo-square"></i></a></li>
      </ul>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
