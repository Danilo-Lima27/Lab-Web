<?php
  require_once ("include_dao.php");

  $dao = new PedidoDAO();
  $dao2 = new GarcomDAO();
  $pedido = new Pedido();
  $consulta = $dao->listarTodos();
  $codProduto = isset($_POST['codProduto'])? $_POST['codProduto'] : "";
  $codGarcom = isset($_POST['codGarcom'])? $_POST['codGarcom'] : "";
  $apagar = isset($_POST['apagar'])? $_POST['apagar'] : "";
  $cod2 = isset($_POST['cod2'])? $_POST['cod2'] : "";
  if(!empty($apagar)){
    $dao->deletar($cod2);
    header("location: contas.php");
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
            <div class="contact-form-section">
              <div class="section-top-border">

          <h3 class="mb-30 title_color">Contas</h3>
          <div class="container h-100 table-responsive">
            <div class="dplay-ybl">
              <div class="">
                <table class="table table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Número da Mesa</th>
                    <th scope="col">Código do Garçom</th>
                    <th scope="col">Código do Produto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Função</th>
                  </tr>
                  </thead>
                
              </div>
              <?php foreach ($consulta as $listar) { ?>
                <div class="table-row">
                  <tr>
                    <td align="center"><?=$listar['cod']?></td>
                    <td scope="col"><?=$listar['numMesa']?></td>
                    <td scope="col"><?=$listar['codGarcom']?></td>
                    <td scope="col"><?=$listar['codProduto']?></td>
                    <td scope="col"><?=$listar['data']?></td>
                    <td scope="col"><?=$listar['hora']?></td>
                    <td><a class="nav-link" data-toggle="modal" data-target="#delete" onclick="Deletar('<?=$listar['cod']?>')"><img src="images/delete.png" style="cursor: pointer;"></a>
                    </td>
                  </tr>
                </div>
              <?php }?>
              </table>
            </div>
          </div>
        </div>
    </section>
    <script type="text/javascript">
      function Deletar(cod){
        $('#cod2').val(cod);
      }
    </script>
 
<?php require_once("Complementos/ModelDeslogar.php"); 
      require_once("Complementos/ModelDeletar.php"); ?>
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
