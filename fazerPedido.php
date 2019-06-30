<?php
  require_once ("include_dao.php");

  $dao = new PedidoDAO();
  $consulta = $dao->listarTodos();
  $dao2 = new GarcomDAO();
  $consulta2 = $dao2->listarTodos();
  $dao3 = new ProdutoDAO();
  $consulta3 = $dao3->listarTodos();

  $numMesa = isset($_POST['numMesa'])? $_POST['numMesa'] : "";
  $codGarcom = isset($_POST['codGarcom'])? $_POST['codGarcom'] : "";
  $codProduto = isset($_POST['codProduto'])? $_POST['codProduto'] : "";
  $data = isset($_POST['data'])? $_POST['data'] : "";
  $hora = isset($_POST['hora'])? $_POST['hora'] : "";
  if(!empty($numMesa) && !empty($codGarcom) && !empty($codProduto) && !empty($data) && !empty($hora)){

    $pedido = new Pedido();
    $pedido->setNumMesa($numMesa);
    $pedido->setCodGarcom($codGarcom);
    $pedido->setCodProduto($codProduto);
    $pedido->setData($data);
    $pedido->setHora($hora);
    $resultado = $dao->inserir($pedido);
    if(!empty($resultado) and $resultado == true){
      echo '<div class="alert alert-success" role="alert">Conta aberta com sucesso</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">Erro no abertura</div>';
    }
  }
  session_start();
  if(isset($_GET['Deslogar'])){
    if($_GET['Deslogar']=="Deslogar"){
      unset($_SESSION['user']);
      session_destroy();
    }
  }
  
  if(!empty($_SESSION['user']) and $_SESSION['user']=="gar"){
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
              <h1>Abrir conta</h1>
              <form class="contact-form-area contact-page-form contact-form text-right" method="post">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="numMesa" name="numMesa" placeholder="Número da Mesa" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Número da Mesa'">
                </div>
                <div class="form-group col-md-12">
                  <div class="form-select">
                    <select id="codGarcom" name="codGarcom">
                      <option>Nome do Garçom</option>
                      <?php foreach ($consulta2 as $listar) { ?>
                        <option value="<?=$listar['cod']?>"><?=$listar['nome']?></option>
                    <?php } ?>
                    </select>
                  </div>  
                </div>  
                <div class="form-group col-md-12">
                  <div class="form-select">
                    <select id="codProduto" name="codProduto">
                      <option>Nome do Produto</option>
                      <?php foreach ($consulta3 as $listar) { ?>
                        <option value="<?=$listar['cod']?>"><?=$listar['nome']?></option>
                    <?php } ?>
                    </select>
                  </div>  
                </div>  
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="datepicker" name="data" placeholder="Data" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Data'">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="hora" name="hora" placeholder="Hora" onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Hora'">
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
<script type="text/javascript">
  $(function(){
    $("#datepicker").datepicker();
  });
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
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
</body>

</html>
<?php
  }else{
    header("location: index.php");
  }
?>
