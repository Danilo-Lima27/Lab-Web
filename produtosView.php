<?php
  require_once ("include_dao.php");

  $dao = new ProdutoDAO();
  $produto = new Produto();
  $consulta = $dao->listarTodos();

  $cod = isset($_POST['cod'])? $_POST['cod'] : "";
  $nome = isset($_POST['nome'])? $_POST['nome'] : "";
  $tamanho = isset($_POST['tamanho'])? $_POST['tamanho'] : "";
  $valor = isset($_POST['valor'])? $_POST['valor'] : "";
  $categoria = isset($_POST['categoria'])? $_POST['categoria'] : "";
  $editar = isset($_POST['editar'])? $_POST['editar'] : "";
  $apagar = isset($_POST['apagar'])? $_POST['apagar'] : "";
  $cod2 = isset($_POST['cod2'])? $_POST['cod2'] : "";
  $produto->setCod($cod);
  $produto->setNome($nome);
  $produto->setTamanho($tamanho);
  $produto->setValor($valor);    
  $produto->setCategoria($categoria);
  if(!empty($editar)){
    $dao->atualizar($produto);
    header("location: produtosView.php");
  }
  if(!empty($apagar)){
    $dao->deletar($cod2);
    header("location: produtosView.php");
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
            <div class="contact-form-section">
              <div class="section-top-border">

          <h3 class="mb-30 title_color">Produtos</h3>
          <div class="container h-100 table-responsive">
            <div class="dplay-ybl">
              <div class="">
                <table class="table table-hover">
                  <thead class="thead-dark">
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col" colspan="2">Funções</th>
                  </tr>
                  </thead>
                
              </div>
              <?php foreach ($consulta as $listar) { ?>
                <div class="table-row">
                  <tr>
                    <td align="center"><?=$listar['cod']?></td>
                    <td scope="col"><?=$listar['nome']?></td>
                    <td scope="col"><?=$listar['tamanho']?></td>
                    <td scope="col"><?=$listar['valor']?></td>
                    <td scope="col"><?=$listar['categoria']?></td>
                    <td><a class="nav-link" data-toggle="modal" data-target="#editProduto" onclick="Preencher('<?=$listar['cod']?>','<?=$listar['nome']?>','<?=$listar['tamanho']?>','<?=$listar['valor']?>','<?=$listar['categoria']?>')"><img src="images/edit.png" style="cursor: pointer;"></a></td>
                    <td><a class="nav-link" data-toggle="modal" data-target="#delete" onclick="Deletar('<?=$listar['cod']?>')"><img src="images/delete.png" style="cursor: pointer;"></a>
                    </td>
                  </tr>
                </div>
              <?php }?>
              </table>
            </div>
          </div>
        </div>
        <div>
          <a href="cadastrarProduto.php"><input type="submit" class="btn text-light" style="background: #f42f2c;" value="Cadastrar"></a>
        </div>     
    </section>
    <script type="text/javascript">
     function Preencher(cod,nome,tamanho,valor,categoria){
        $('#cod').val(cod);
        $('#nome').val(nome);
        $('#tamanho').val(tamanho);
        $('#valor').val(valor);
        $('#categoria').val(categoria);
      }
    </script> 
    <script type="text/javascript">
      function Deletar(cod){
        $('#cod2').val(cod);
      }
    </script>

 
<?php require_once("Complementos/ModelDeslogar.php");
      require_once("Complementos/ModelEditarProduto.php");
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
