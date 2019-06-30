<?php
  require_once ("include_dao.php");

  $dao = new GerenteDAO();
  $gerente = new Gerente();
  $consulta = $dao->listarTodos();

  $cod = isset($_POST['cod'])? $_POST['cod'] : "";
  $nome = isset($_POST['nome'])? $_POST['nome'] : "";
  $endereco = isset($_POST['endereco'])? $_POST['endereco'] : "";
  $telefone = isset($_POST['telefone'])? $_POST['telefone'] : "";
  $email = isset($_POST['email'])? $_POST['email'] : "";
  $rg = isset($_POST['rg'])? $_POST['rg'] : "";
  $cpf = isset($_POST['cpf'])? $_POST['cpf'] : "";
  $login = isset($_POST['login'])? $_POST['login'] : "";
  $senha = md5(isset($_POST['senha'])? $_POST['senha'] : "");
  $editar = isset($_POST['editar'])? $_POST['editar'] : "";
  $apagar = isset($_POST['apagar'])? $_POST['apagar'] : "";
  $cod2 = isset($_POST['cod2'])? $_POST['cod2'] : "";
  $gerente->setCod($cod);
  $gerente->setNome($nome);
  $gerente->setEndereco($endereco);
  $gerente->setTelefone($telefone);    
  $gerente->setEmail($email);
  $gerente->setRg($rg);
  $gerente->setCpf($cpf);
  $gerente->setLogin($login);
  $gerente->setSenha($senha);
  if(!empty($editar)){
    $dao->atualizar($gerente);
    header("location: gerentesView.php");
  }
  if(!empty($apagar)){
    $dao->deletar($cod2);
    header("location: gerentesView.php");
  }

  session_start();
  if(isset($_GET['Deslogar'])){
    if($_GET['Deslogar']=="Deslogar"){
      unset($_SESSION['user']);
      session_destroy();
    }
  }
  
  if(!empty($_SESSION['user']) and $_SESSION['user']=="prop"){
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

          <h3 class="mb-30 title_color">Gerentes</h3>
          <div class="container h-100 table-responsive">
            <div class="dplay-ybl">
              <div class="">
                <table class="table table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rg</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Login</th>
                    <th colspan="2"><div class="serial">Funções</div></th>
                  </tr>
                  </thead>                
                
              </div>
              <?php foreach ($consulta as $listar) { ?>
                <div class="table-row">
                  <tr>
                    <td align="center"><?=$listar['cod']?></td>
                    <td scope="col"><?=$listar['nome']?></td>
                    <td scope="col"><?=$listar['endereco']?></td>
                    <td scope="col"><?=$listar['telefone']?></td>
                    <td scope="col"><?=$listar['email']?></td>
                    <td scope="col"><?=$listar['rg']?></td>
                    <td scope="col"><?=$listar['cpf']?></td>
                    <td scope="col"><?=$listar['login']?></td>
                    <td><a class="nav-link" data-toggle="modal" data-target="#editGerente" onclick="Preencher('<?=$listar['cod']?>','<?=$listar['nome']?>','<?=$listar['endereco']?>','<?=$listar['telefone']?>','<?=$listar['email']?>','<?=$listar['rg']?>','<?=$listar['cpf']?>','<?=$listar['login']?>','<?=$listar['senha']?>')"><img src="images/edit.png" style="cursor: pointer;"></a></td>
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
          <a href="cadastrarGerente.php"><input type="submit" class="btn text-light" style="background: #f42f2c;" value="Cadastrar"></a>
        </div>     
    </section>
    <script type="text/javascript">
     function Preencher(cod,nome,endereco,telefone,email,rg,cpf,login,senha){
        $('#cod').val(cod);
        $('#nome').val(nome);
        $('#endereco').val(endereco);
        $('#telefone').val(telefone);
        $('#email').val(email);
        $('#rg').val(rg);
        $('#cpf').val(cpf);
        $('#login').val(login);
        $('#senha').val(senha);
      }
    </script> 
    <script type="text/javascript">
      function Deletar(cod){
        $('#cod2').val(cod);
      }
    </script>

 
<?php require_once("Complementos/ModelDeslogar.php");
      require_once("Complementos/ModelEditarGerente.php");
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
