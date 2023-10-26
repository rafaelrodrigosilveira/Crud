<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

    <!-- Bootstrap core CSS -->
    <?php $this->load->view('template/head'); ?>
    
    <title>Detalhes dos</title>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>  

    <!-- FORMULARIO PARA CADASTRO DE PRODUTOS -->
    <div class="container">
         
        <h1>Atualizar produto</h1>   
        <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>">Inicio >> </a></li>          
              <li class="active">Atualizar produto</li>
        </ol>      

        <!-- Formulário de novo cadastro  -->
        <form action="<?php echo base_url('/produtos/salvar'); ?>" name="form_add" method="post">
          
          <!-- Input text nome do produtos -->
          <div class="row">
            <div class="col-md-8">
              <label>Nome</label>
              <input type="text" name="nome" value="<?php echo $produto->nome ?>" class="form-control">
            </div>
          </div> <!-- fim input text nome produtos -->

          <!-- Input text preço do produtos -->
          <div class="row">
            <div class="col-md-8">
              <label>Preço</label>
              <input type="text" name="preco" value="<?php echo $produto->preco ?>" class="form-control">
            </div>
          </div><!-- fim input text preco produtos -->

          <!-- Select produtos ativo ou inativo -->
          <div class="row">
            <div class="col-md-2">
              <label>Ativo</label>
              <select name="ativo" class="form-control">

                <!--Campo para verificação de ativo (radio box)-->
                <option value="1" <?php echo ($produto->ativo == 1 ? ' selected="selected"' : '') ?> >Sim</option>
                <option value="0"<?php echo ($produto->ativo == 0 ? ' selected="selected"' : '') ?> >Não</option>
              </select>
            </div>
          </div><!-- fim select produtos ativo ou inativo -->

          <!-- Button submit(enviar) formulário -->
          <br />
          <div class="row">
            <div class="col-md-2">

              <!--Campo para verificação de ID -->
              <input type="hidden" name="id" value="<?php echo $produto->id ?>">

              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div><!-- fim do button submit(enviar) formulário -->
          

        </form><!--Fim formulário de novo cadastro  -->

        <!-- CHAMA O COPYRIGHT -->
        <?php $this->load->view('template/copyright'); ?>

    </div>
    <!-- FIM - FORMULARIO PARA CADASTRO DE PRODUTOS -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <?php $this->load->view('template/scripts'); ?>
  </body>
</html>
