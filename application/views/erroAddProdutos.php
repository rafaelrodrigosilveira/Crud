<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!-- Bootstrap core CSS -->
    <?php $this->load->view('template/head'); ?>

<p>
	<div class="alert alert-danger" role="alert">
		O compo nome do produto é obrigatório.
		<a href="<?php echo base_url(); ?>">Voltar</a>
	</div>
</p>

<!-- CHAMA O COPYRIGHT -->
<?php $this->load->view('template/copyright'); ?>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <?php $this->load->view('template/scripts'); ?>