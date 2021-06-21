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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
  <script>
  
			var dataCluster1 = [];
			var dataCluster2 = [];
			var dataCluster3 = [];
			var dataCluster4 = [];
			var urlFile = 'GetPusatCluster';
			$.ajax({
				type: 'POST',   
				url: urlFile,
				cache: false,
				contentType: false,
				processData: false,
				success: function(php_script_response){
					var jsonData = JSON.parse(php_script_response); 
					for(data=0; data < jsonData.result.length; data++)
					{
						dataCluster1.push({
							x:data,
							y:parseFloat(jsonData.result[data].cluster1) 
						});
						dataCluster2.push({
							x:data,
							y:parseFloat(jsonData.result[data].cluster2)
						});
						dataCluster3.push({
							x:data,
							y:parseFloat(jsonData.result[data].cluster3)
						});
						dataCluster4.push({
							x:data,
							y:parseFloat(jsonData.result[data].cluster4)
						});
						
					}
					var chart = new CanvasJS.Chart("chartContainer", {
						animationEnabled: true,
						theme: "light2",
						title:{
							text: "Data Pusat Cluster"
						},
						data: [
						{        
							type: "line",
							indexLabelFontSize: 16,
							dataPoints: 
								dataCluster1
							
						},
						{        
							type: "line",
							indexLabelFontSize: 16,
							dataPoints: 
								dataCluster2
							
						},
						{        
							type: "line",
							indexLabelFontSize: 16,
							dataPoints: 
								dataCluster3
							
						},{        
							type: "line",
							indexLabelFontSize: 16,
							dataPoints: 
								dataCluster4
							
						}
						]
					});
					chart.render();

					
				}
			});
			
			

  
	  $(document).ready(function() {
		  
			<?php 
			if(!empty($afterAdd)) 
			{
				if($afterAdd == true)
				{
					echo "$('#modalResultAdd').modal('show');";
				}
			}
			?>
			
			
			$('#example').DataTable({
				 "order": [[ 8, "desc" ]]
				
			});
		
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