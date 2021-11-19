

<style type="text/css">
  .btn-sm{
    background-color: lavender;
  }
  
      .navbar {
        margin-bottom: 0;
        font-family: Century Gothic;
        font-weight: bold;
      }
  
</style>
<nav class="navbar navbar-inverse" style="background-color: #001049;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <a class="navbar-brand pull-left" href="#">Discozz</a>

        <li><a href="index.php">Home 🏠 <span class="sr-only">(current)</span></a></li>
        <li><a href="novi.php">Novidades ❗</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Décadas 💽<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categorias.php?cat=Anos 70">Anos 70</a></li>
            <li><a href="categorias.php?cat=Anos 80">Anos 80</a></li>
            <li><a href="categorias.php?cat=Anos 90">Anos 90</a></li>
            <li><a href="categorias.php?cat=Anos 00">Anos 00</a></li>
            <li><a href="categorias.php?cat=Outros">Outros</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar" name="txtBuscar">
        </div>
        <button type="submit" class="btn btn-default">Pesquisa</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Contato 📞</a></li>
        <li><a href="carrinho.php">Carrinho 🛒</a></li>
      <?php 
      if(empty($_SESSION['ID'])) { ?>
        <li><a href="formlogin.php"><span class="glyphicon glyphicon-log-in"> Login</a> </li>
      
      <?php } else {
        if ($_SESSION['Status'] == 0) {
            $consulta_usuario = $cn->query("select nome_usuario from tbl_usuario where cd_usuario = '$_SESSION[ID]'");
            $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
          ?>
           <li><a href="areauser.php"><span class="glyphicon glyphicon-user"></span> <?php echo $exibe_usuario['nome_usuario']; ?></a></li>
            <li><a href="sair.php" ><span class="glyphicon glyphicon-log-out"></span> Sair </a></li>

          <?php } else { ?>
            <li><a href="ademiro.php"><button class="btn btn-sm btn-info" style="color:#171614; ">ADM</button></a></li>
            <li><a href="sair.php" ><span class="glyphicon glyphicon-log-out"></span> Sair </a></li>
        <?php }
        } ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
