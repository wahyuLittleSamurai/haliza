<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url()?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url()?>assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url()?>assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>  
  
  <script>
	  $(document).ready(function() {
			
			$('#example').DataTable();
		
			$('#example').on('click','.edit',function()
			{
			  var idUser = $(this).data('id');
			  var username = $(this).data('username');
			  var password = $(this).data('password');

			  $('#myModalEdit').modal('show');
			  $('.username').val(username);
              $('.password').val(password);
              $('.idUser').val(idUser);
              
			});
			$('#example').on('click','.edit',function()
			{
			  var idUser = $(this).data('id');
			  var nama = $(this).data('nama');
			  var umur = $(this).data('umur');
			  var gender = $(this).data('gender');
			  var tb = $(this).data('tb');
			  var bb = $(this).data('bb');

			  $('#myModalEditAnak').modal('show');
			  $('.id').val(idUser);
              $('.nama').val(nama);
              $('.umur').val(umur);
              $('.gender').val(gender);
              $('.tb').val(tb);
              $('.bb').val(bb);
              
			});
		
		} );
		
		
  </script>