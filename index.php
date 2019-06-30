<?php 	
  require_once("include_dao.php");
  session_start();

  $login = isset($_POST['login'])? $_POST['login']: "";
  $senha = md5(isset($_POST['senha'])? $_POST['senha']: "");
  $usuario = isset($_POST['usuario'])? $_POST['usuario']: "";
  $_SESSION['user'] = "";

  if(!empty($login) && !empty($senha) and $usuario=="prop"){

    $log = new Empresa();
    $dao = new EmpresaDAO();
    $log->setLogin($login);
    $log->setSenha($senha);
    $consulta = $dao->logar($log);
    if(!empty($consulta)){
      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      $_SESSION['user'] = "prop";
      header('location: Administrador.php');
    }else{
      echo '<div class="alert alert-danger" role="alert">Login ou senha incorretos</div>';
    }

  } elseif (!empty($login) && !empty($senha) and $usuario == "ger") {
      $log = new Gerente();
      $dao = new GerenteDAO();
      $log->setLogin($login);
      $log->setSenha($senha);
      $consulta = $dao->logar($log);
      if(!empty($consulta)){
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['user'] = "ger";
        header('location: controlGerente.php');
      }else{
        echo '<div class="alert alert-danger" role="alert">Login ou senha incorretos</div>';
      }
  } elseif (!empty($login) && !empty($senha) and $usuario == "gar") {
      $log = new Garcom();
      $dao = new GarcomDAO();
      $log->setLogin($login);
      $log->setSenha($senha);
      $consulta = $dao->logar($log);
      if(!empty($consulta)){
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['user'] = "gar";
        header('location: controlGarcom.php');
      }else{
        echo '<div class="alert alert-danger" role="alert">Login ou senha incorretos</div>';
      }
  }
?>

<!doctype html>
<html lang="en">

<?php
	require_once('Head.php');
?>

<body>

	<?php 
		require_once("Navbar.php");
	?>

	<!-- AREA DE MODEL LOGIN -->


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Login:</label>
            <input type="text" name="login" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Senha:</label>
            <input type="password" name="senha" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <table cellpadding="10px">
            	<tr>
            		<td>
            			<label><input type="radio" name="usuario" id="prop" value="prop"><span>Proprietário da empresa</span></label>
            		</td>
            		<td><label>
                <input type="radio" name="usuario" id="ger" value="ger">
                <span>Gerente</span>
              </label></td>
            		<td><label>
                <input type="radio" name="usuario" id="gar" value="gar">
                <span>Garçom</span>
              </label></td>
            	</tr>
            </table>
           </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-success" value="Entrar">
      </div>
      </form>
    </div>
  </div>
</div>

	<div class="site-main">
		<!--================ Start Home Banner Area =================-->
		<section class="home_banner_area">
			<div class="banner_inner">
				<div class="container-fluid no-padding">
					<div class="row fullscreen">

					</div>
				</div>
			</div>
		</section>
		<!-- Start banner bottom -->
		<div class="row banner-bottom align-items-center justify-content-center">
			<div class="col-lg-4">
			</div>
			<div class="col-lg-8">
				<div class="banner_content">
					<div class="row d-flex align-items-center">
						<div class="col-lg-8 col-md-12">
							<h1>Seja Bem-Vindo</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End banner bottom -->
		<!--================ End Home Banner Area =================-->

		<!--================ Start Breakfast Area =================-->
		<div class="breakfast-area section_gap_top">
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-lg-5">
						<div class="left-content">
							<h1>Comida caseira com altíssima qualidade você encontra aqui</h1>
							<p>Escolha a opção mais apropriada para a sua necessidade e desfrute de uma das melhores experiências gastronômicas da sua vida.</p>
							<a href="index.php" class="primary-btn">Volte para o início</a>
						</div>
					</div>
					<div class="col-lg-6 offset-lg-1">
						<div class="right-img">
							<img class="img1 img-fluid" src="img/food/food1.jpg" alt="">
							<img class="img2 img-fluid" src="img/food/food2.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
				<div class="row footer-bottom justify-content-between">
					<div class="col-lg-6">
						<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<script>document.write(new Date().getFullYear());</script> Este site foi feito <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">Matheus Oliveira e Danilo Lima</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
					<div class="col-lg-2">
						<div class="social-icons">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>

			</div>
		</footer>
		<!--================ Start Footer Area =================-->
	</div>

	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
	</script>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>