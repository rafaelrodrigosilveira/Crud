<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

    <!-- Bootstrap core CSS -->
    <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <?php $this->load->view('template/head'); ?>
    
    <title><?php echo $titulo; ?></title>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>    

    <div class="container">

      <div class="row">
        <div>
          <h1>Listar Produtos</h1>
        </div>

        <!-- Botão Novo Produto -->
        <div class="container" >
          <div class="row">
            <a href="produtos/add" class="btn btn-success margin-button15">Novo Produto</a>
          </div>
        </div>

        <table class="table table-bordered">
            
            <thead>
                <tr>
                  <th class="text-center">Produto</th>
                  <th class="text-right">Preço</th>
                  <th class="text-center">Status</th><!-- Adicionado na aula 5 - Status -->
                  <th class="text-center">Açoes</th>
                </tr>
            </thead>

            <?php
                $contador = 0;
                foreach ($produtos as $produto)
                {        
                    echo '<tr>';
                      echo '<td>'.$produto->nome.'</td>'; 
                      echo '<td class="text-right">'.$produto->preco.'</td>';

                      // Adicionado na aula 5 - Status
                      echo '<td class="text-center">';
                      // Verificamos o status do produto
                      if($produto->ativo == 1){
                        // Se 1 está ativo
                        echo '<span class="badge badge-success"><a href="produtos/status/'.$produto->id.'" title="Deixar inativo">Ativo</a></span>';
                      }else{
                        // Se 0 está inativo
                        echo '<span class="badge badge-warning"><a href="produtos/status/'.$produto->id.'" title="Deixar ativo">Inativo</a></span>';
                      } // FIM - Adicionado na aula 5 - Status

                      echo '<td class="text-center">';
                        echo '<a href="produtos/editar/'.$produto->id.'" title="Editar cadastro" class="btn btn-primary"><span class="fa fa-pencil" aria-hidden="true"></span></a>';
                        echo ' <a href="produtos/apagar/'.$produto->id.'" title="Apagar cadastro" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></a>';
                        echo ' <a href="produtos/detalhes/'.$produto->id.'" title="Detalhes" class="btn btn-info"><span class="fa fa-info-circle" aria-hidden="true"></span></a>';
                      echo '</td>'; 
                    echo '</tr>';
                $contador++;
                }
            ?>

        </table>

        <div class="row">
          <div class="col-md-12">
            Todal de Registros: <?php echo $contador ?>
          </div>
        </div>
      </div>

      <!-- CHAMA O COPYRIGHT -->
      <?php $this->load->view('template/copyright'); ?>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!--<script src="../bootbootstrap-4.3.1-dist/js/bootstrap.min.js"></script>-->
    <?php $this->load->view('template/scripts'); ?>
  </body>
</html>
