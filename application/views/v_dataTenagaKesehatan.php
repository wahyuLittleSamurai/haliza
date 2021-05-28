<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<form class="form-horizontal style-form" action="addTenagaKesehatan" method="post">								
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Tenaga Kesehatan</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">						
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="username" class="form-control username" placeholder="Username" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
						</div>
						<input name="password" class="form-control password" placeholder="Password" type="password">
					  </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-theme">Tambah Data</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="myModalEdit" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<form class="form-horizontal style-form" action="editTenagaKesehatan" method="post">								
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Tenaga Kesehatan</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">						
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="idUser" class="form-control idUser" placeholder="Id type="text" readonly>
					  </div>
					</div>
					
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="username" class="form-control username" placeholder="Username" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
						</div>
						<input name="password" class="form-control password" placeholder="Password" type="password">
					  </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-theme">Edit Data</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>


<div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0"><?php echo $tableTittle; ?></h3>
			  <div class="col text-right">
                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary">Tambah Tenaga Kesehatan</a>
               </div>
            </div>
            <!-- Light table -->
              <table class="table align-items-center table-flush" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" >Id</th>
                    <th scope="col" >Username</th>
                    <th scope="col" >Password</th>
                    <th scope="col"> Action</th>
                  </tr>
                </thead>
                <tbody class="list">
				<?php foreach($posts as $post){?>
                  <tr>
                    <td scope="row">
                      <?php echo $post->id; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->username; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->password; ?>
                    </td>
                    <td>
						<ul class="d-flex justify-content-center">
							<a href="javascript:void(0);" class="text-danger edit" data-id= "<?php echo $post->id; ?>" 
								data-username="<?php echo $post->username; ?>" data-password="<?php echo $post->password; ?>" ><i class="ni ni-settings-gear-65" aria-hidden="true"></i></a>
							<a href="<?= site_url('Stunting/deleteTenagaKesehatan/').$post->id; ?>" class="text-danger"><i class="ni ni-basket"></i></a>
						</ul>
					</td>
                  </tr>
				<?php } ?>
                </tbody>
              </table>
            
          </div>
        </div>
	