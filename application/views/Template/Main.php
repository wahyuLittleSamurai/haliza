<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<?php $this->load->view('Template/head'); ?>

<body>
  <?php $this->load->view('Template/sidebar'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    
    <?php $this->load->view('Template/tophead'); ?>
	
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        
		
		<?php echo $content; ?>
		
      </div>
      
	  <?php $this->load->view('Template/footer'); ?>
	  
    </div>
  </div>
  
  <?php $this->load->view('Template/js'); ?>
  
</body>

</html>
