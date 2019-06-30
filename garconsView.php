<?php
  require_once ("include_dao.php");

  $dao = new GarcomDAO();
  $garcom = new Garcom();
  $consulta = $dao->listarTodos();

  $cod = isset($_POST['cod'])? $_POST['cod'] : "";
  $nome = isset($_POST['nome'])? $_POST['nome'] : "";
  $endereco = isset($_POST['endereco'])? $_POST['endereco'] : "";
  $telefone = isset($_POST['telefone'])? $_POST['telefone'] : "";
  $escolaridade = isset($_POST['escolaridade'])? $_POST['escolaridade'] : "";
  $dataNasc = isset($_POST['dataNasc'])? $_POST['dataNasc'] : "";
  $cpf = isset($_POST['cpf'])? $_POST['cpf'] : "";
  $login = isset($_POST['login'])? $_POST['login'] : "";
  $senha = md5(isset($_POST['senha'])? $_POST['senha'] : "");
  $editar = isset($_POST['editar'])? $_POST['editar'] : "";
  $apagar = isset($_POST['apagar'])? $_POST['apagar'] : "";
  $cod2 = isset($_POST['cod2'])? $_POST['cod2'] : "";
  $garcom->setCod($cod);
  $garcom->setNome($nome);
  $garcom->setEndereco($endereco);
  $garcom->setTelefone($telefone);    
  $garcom->setEscolaridade($escolaridade);
  $garcom->setDataNasc($dataNasc);
  $garcom->setCpf($cpf);
  $garcom->setLogin($login);
  $garcom->setSenha($senha);
  if(!empty($editar)){
    $dao->atualizar($garcom);
    header("location: garconsView.php");
  }
  if(!empty($apagar)){
    $dao->deletar($cod2);
    header("location: garconsView.php");
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

          <h3 class="mb-30 title_color">Garçons</h3>
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
                    <th scope="col">Escolaridade</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Login</th>
                    <th scope="col" colspan="2">Funções</th>
                  </tr>
                  </thead>                
                
              </div>
              <tbody>
              <?php foreach ($consulta as $listar) { ?>
                  <tr>
                    <td align="center"><?=$listar['cod']?></td>
                    <td scope="col"><?=$listar['nome']?></td>
                    <td scope="col"><?=$listar['endereco']?></td>
                    <td scope="col"><?=$listar['telefone']?></td>
                    <td scope="col"><?=$listar['escolaridade']?></td>
                    <td scope="col"><?=$listar['dataNasc']?></td>
                    <td scope="col"><?=$listar['cpf']?></td>
                    <td scope="col"><?=$listar['login']?></td>
                    <td scope="col"><a class="nav-link" data-toggle="modal" data-target="#editGarcom" onclick="Preencher('<?=$listar['cod']?>','<?=$listar['nome']?>','<?=$listar['endereco']?>','<?=$listar['telefone']?>','<?=$listar['escolaridade']?>','<?=$listar['dataNasc']?>','<?=$listar['cpf']?>','<?=$listar['login']?>','<?=$listar['senha']?>')"><img src="images/edit.png" style="cursor: pointer;"></a></td>
                    <td><a class="nav-link" data-toggle="modal" data-target="#delete" onclick="Deletar('<?=$listar['cod']?>')"><img src="images/delete.png" style="cursor: pointer;"></a>
                    </td>
                  </tr>
              <?php }?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div>
          <a href="cadastrarGarcom.php"><input type="submit" class="btn text-light" style="background: #f42f2c;" value="Cadastrar"></a>
        </div>     
    </section>
    <script type="text/javascript">
     function Preencher(cod,nome,endereco,telefone,escolaridade,dataNasc,cpf,login,senha){
        $('#cod').val(cod);
        $('#nome').val(nome);
        $('#endereco').val(endereco);
        $('#telefone').val(telefone);
        $('#escolaridade').val(escolaridade);
        $('#dataNasc').val(dataNasc);
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
      require_once("Complementos/ModelEditarGarcom.php");
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
  } elseif(!empty($_SESSION['user']) and $_SESSION['user']=="prop"){
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

          <h3 class="mb-30 title_color">Garçons</h3>
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
                    <th scope="col">Escolaridade</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Login</th>
                  </tr>
                  </thead>                
                
              </div>
              <?php foreach ($consulta as $listar) { ?>
                <div class="table-row">
                  <tr>
                    <td align="center"><?=$listar['cod']?></td>
                    <td><?=$listar['nome']?></td>
                    <td><?=$listar['endereco']?></td>
                    <td>><?=$listar['telefone']?></td>
                    <td><?=$listar['escolaridade']?></td>
                    <td><?=$listar['dataNasc']?></td>
                    <td><?=$listar['cpf']?></td>
                    <td><?=$listar['login']?></td>
                  </tr>
                </div>
              <?php }?>
              </table>
            </div>
          </div>
        </div>
    </section>
<?php require_once("Complementos/ModelDeslogar.php"); ?>
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
  }
  else{
    header("location: index.php");
  }
?>
