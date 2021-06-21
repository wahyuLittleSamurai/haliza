<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<form class="form-horizontal style-form" action="addDataAnak" method="post">								
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Anak</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">						
					<div class="form-group">
					  <h4>Nama</h4>
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<input name="nama" class="form-control nama" placeholder="Nama" type="text">
					  </div>
					</div>
					<div class="form-group">
						<h4>Gender</h4>
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<!--<input name="gender" class="form-control gender" placeholder="Gender" type="text">
						-->
						<select name="gender" id="gender" class="form-control gender">
							<option value="1">Laki-Laki</option>
							<option value="2">Perempuan</option>
						</select>
					  </div>
					</div>
					<div class="form-group">
					<h4>Umur</h4>
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<input name="umur" class="form-control umur" placeholder="Umur" type="text">
					  </div>
					</div>
					<div class="form-group">
						<h4>Tinggi Badan</h4>
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<input name="tb" class="form-control tb" placeholder="Tinggi Badan" type="text">
					  </div>
					</div>
					<div class="form-group">
					<h4>Berat Badan</h4>
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<input name="bb" class="form-control bb" placeholder="Berat Badan" type="text">
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
<div class="modal fade" id="myModalEditAnak" role="dialog">
	<div class="modal-dialog ">
	<!-- Modal content-->
		<form class="form-horizontal style-form" action="editDataAnak" method="post">								
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data Anak</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">						
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="id" class="form-control id" placeholder="id" type="text" readonly>
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="nama" class="form-control nama" placeholder="Nama" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="gender" class="form-control gender" placeholder="Gender" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="umur" class="form-control umur" placeholder="Umur" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="tb" class="form-control tb" placeholder="Tinggi Badan" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <div class="input-group input-group-merge input-group-alternative mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<input name="bb" class="form-control bb" placeholder="Berat Badan" type="text">
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
                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary">Tambah Data Anak</button>
                  <a href="<?php echo site_url(); ?>/Stunting/ConvertToExcel" type="button" class="btn btn-sm btn-warning" >Convert To Excel</a>
			   </div>
            </div>
            <!-- Light table -->
              <table class="table align-items-center table-flush" id="example">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" >No</th>
                    <th scope="col" >Id</th>
                    <th scope="col" >Nama</th>
                    <th scope="col" >Gender</th>
                    <th scope="col" >Umur</th>
                    <th scope="col" >Tinggi Badan</th>
                    <th scope="col" >Berat Badan</th>
                    <th scope="col" >Hasil</th>
                    <th scope="col" >Tgl Timbang</th>
                    <th scope="col"> Action</th>
                  </tr>
                </thead>
                <tbody class="list">
				<?php $counting=0;  foreach($posts as $post){ $counting++;?>
				  <tr style="<?php if($counting == count($hasil) && $afterAdd == true) { echo 'background-color: #FF0000; color: #fff;'; } ?>" >
                    <td scope="row">
                      <?php echo $counting; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->id; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->nama; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->gender; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->umur; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->tb; ?>
                    </td>
					<td scope="row">
                      <?php echo $post->bb; ?>
                    </td>
					<td scope="row">
                      <?php if($counting <= count($hasil)) { echo $hasil[$counting-1]; } ?>
                    </td>
					<td scope="row">
                      <?php echo $post->createat; ?>
                    </td>
                    <td>
						<ul class="d-flex justify-content-left mt-3">
							<!--
							<a href="javascript:void(0);" class="text-danger edit mr-2" data-id= "<?php //echo $post->id; ?>" 
								data-nama="<?php //echo $post->nama; ?>" data-umur="<?php //echo $post->umur; ?>"
								data-gender="<?php //echo $post->gender; ?>"
								data-tb="<?php //echo $post->tb; ?>" data-bb="<?php //echo $post->bb; ?>" >
								<i class="ni ni-settings-gear-65" aria-hidden="true"></i></a>
							-->
							<a href="<?= site_url('Stunting/deleteDataAnak/').$post->id; ?>" class="text-danger ml-2"><i class="ni ni-basket"></i></a>
						</ul>
					</td>
                  </tr>
				<?php } ?>
                </tbody>
              </table>
            
          </div>
        </div>

		
<div class="modal fade" id="modalResultAdd" role="dialog">
	<div class="modal-dialog ">
		<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hasil Penambahan</h4>	
				</div>
				<div class="modal-body">				
					<h5>Nama</h5>
					<?php echo $posts[count($posts) - 1]->nama; ?>
					<h5>Gender</h5>
					<?php echo $posts[count($posts) - 1]->gender; ?>
					<h5>Tinggi Badan</h5>
					<?php echo $posts[count($posts) - 1]->tb; ?>
					<h5>Berat Badan</h5>
					<?php echo $posts[count($posts) - 1]->tb; ?>
					<h5>Haisl Perhitungan</h5>
					<?php echo $hasil[count($posts) - 1]; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
	</div>
</div>
