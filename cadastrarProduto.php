<?php
  require_once ("include_dao.php");

  $dao = new ProdutoDAO();
  $consulta = $dao->listarTodos();

  $nome = isset($_POST['nome'])? $_POST['nome'] : "";
  $tamanho = isset($_POST['tamanho'])? $_POST['tamanho'] : "";
  $valor = isset($_POST['valor'])? $_POST['valor'] : "";
  $categoria = isset($_POST['categoria'])? $_POST['categoria'] : "";
  if(!empty($nome) && !empty($tamanho) && !empty($valor) && !empty($categoria)){

    $produto = new Produto();
    $produto->setNome($nome);
    $produto->setTamanho($tamanho);
    $produto->setValor($valor);
    $produto->setCategoria($categoria);
    $resultado = $dao->inserir($produto);
    if(!empty($resultado) and $resultado == true){
      echo '<div class="alert alert-success" role="alert">Cadastrado com sucesso</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">Erro no cadastro</div>';
    }
  }
  session_start();
  if(isset($_GET['Deslogar'])){
    if($_GET['Deslogar']=="Deslogar"){
      unset($_SESSION['user']);
      session_destroy();
    }
  }
  
  if(!empty($_SESSION['user']) and $_SESSION['user']=="ger"){
?>
<html lang="en">

<?php
  require_once('Head.php');
?>

<body>

  <?php 
    require_once("Navbar.php");
  ?>
<section class="reservation-area section_gap_top">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 offset-lg-6">
            <div class="contact-form-section">
              <h1>Cadastrar Produto</h1>
              <form class="contact-form-area contact-page-form contact-form text-right" method="post">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Nome'">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="tamanho" name="tamanho" placeholder="Tamanho" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Tamanho'">
                </div>  
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Valor'">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Categoria'">
                </div>
                <div class="col-lg-12 text-center">
                  <input type="submit" class="primary-btn text-uppercase" value="Enviar"></input>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
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
        <form method="GET">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Deseja realmente sair?</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-success" value="Deslogar" name="Deslogar">
      </div>
      </form>
    </div>
  </div>
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
<?php
  }else{
    header("location: index.php");
  }
?>
