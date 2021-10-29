<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Discozz - Inserir Produtos</title>
    <link rel="shortcut icon" href="./Imagens/disco-32px-valen.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="jquery.mask.js"></script>

    <script>
        $(document).ready(function() {

            $('#preco').mask('000.000.000.000.000,00', {
                reverse: true
            });
            $("#isbn").mask('000-00-000-0000-0');

        });
    </script>

    <style>
        .navbar {
            margin-bottom: 0;
        }
    </style>




</head>

<body>

    <?php

    session_start();

    if (empty($_SESSION['Status']) || $_SESSION['Status'] != 1) {
        header('location:index.php');
        //sessão vazia ou não for adm, volta pro index
    }
    include 'conexao.php';
    include 'nav.php';
    include 'cabecalho.html';
    $consultaBanda = $cn->query("select * from tbl_banda");
    $consultaCategoria = $cn->query("select * from tbl_categoria");
    $consultaDisco = $cn->query("select * from tbl_disco");
    ?>


    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4">

                <h2>Inclusão de Discos</h2>

                <form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">



                    <div class="form-group">

                        <label for="sltcat">Categoria</label>

                        <select class="form-control" name="sltcat">
                        <option value="">Selecione</option>
                            <?php while ($listaCategoria = $consultaCategoria->fetch(PDO::FETCH_ASSOC)) { ?>
                              
                                <option value="<?php echo $listaCategoria['cd_categoria']; ?>"><?php echo $listaCategoria['ds_categoria']; ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="form-group">

                        <label for="txtdisco">Nome do Disco</label>
                        <input name="txtdisco" type="text" class="form-control" required id="txtdisco">
                    </div>

                    <div class="form-group">

                        <label for="sltautor">Autor</label>
                     
                            <select class="form-control" name="sltautor">
                            <option value="">Selecione</option>
                            <?php while ($listaBanda = $consultaBanda->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $listaBanda['cd_banda']; ?>"><?php echo $listaBanda['nm_banda']; ?></option>
                            <?php } ?>
                            </select>

                    </div>

                    <div class="form-group">

                        <label for="txtpag">Número de páginas</label>

                        <input type="number" class="form-control" name="txtpag" required id="txtpag">

                    </div>


                    <div class="form-group">

                        <label for="txtpreco">Preço</label>

                        <input type="text" class="form-control" name="txtpreco" required id="txtpreco">

                    </div>


                    <div class="form-group">

                        <label for="txtqtde">Quantidade em Estoque</label>

                        <input type="number" class="form-control" name="txtqtde" required id="txtqtde">

                    </div>


                    <div class="form-group">

                        <label for="txtdescricao">Descrição do álbum</label>

                        <textarea rows="5" class="form-control" name="txtdescricao"></textarea>


                    </div>


                    <div class="form-group">

                        <label for="txtfoto1">Foto Principal</label>

                        <input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

                    </div>

                    <div class="form-group">

                        <label for="sltlanc">Lançamento?</label>

                        <select class="form-control" name="sltlanc">
                            <option value="">Selecione</option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>


                    </div>


                    <button type="submit" class="btn btn-lg btn-default">

                        <span class="glyphicon glyphicon-pencil"> Cadastrar </span>

                    </button>

                </form>

            </div>
        </div>
    </div>

    <?php include 'rodape.html' ?>




</body>

</html>