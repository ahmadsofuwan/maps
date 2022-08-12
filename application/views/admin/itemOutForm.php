<?php
$action = 'add';
$display = '';
if (isset($_POST['action']))
	$action = $_POST['action'];
if ($action == 'update')
	$display = 'style="display: none;"'
?>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<div class="col-lg">
				<div class="p-5">
					<?php echo $err ?>
					<h3 class="text-center"><b><?php echo strtoupper($title) ?></b></h3>
					<form method="post" enctype="multipart/form-data">
						<input type="hidden" name="pkey" value="">
						<input type="hidden" name="action" value="<?php echo $action ?>">


						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Team</label>
							<div class="col-sm">
								<select class="form-control" name="teamKey">
									<option value="" disabled selected>Pilih Team</option>
									<?php foreach ($team as $teamKey => $teamVal) { ?>
										<option value="<?php echo $teamVal['pkey'] ?>"><?php echo $teamVal['name'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Catatan</label>
							<div class="col-sm">
								<textarea type="number" class="form-control" name="note" placeholder="Catatan Pengeluaran Barang" min="1"></textarea>
							</div>
						</div>

						<!-- detail -->
						<div class="form-group row">
							<!-- detail item -->
							<div class="col-sm-8">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nama Barang</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<tr <?php echo $display ?>>
											<input type="hidden" name="detailKey[]">
											<td>
												<select class="form-control" name="itemKey[]">
													<?php foreach ($item as $itemKey => $itemVal) { ?>
														<option value="<?php echo $itemVal['pkey'] ?>"><?php echo $itemVal['name'] ?>_<?php echo $itemVal['itemtypename'] ?> : <?php echo $itemVal['stock'] ?> <?php echo $itemVal['unitname'] ?></option>
													<?php } ?>
												</select>
											</td>
											<td><input type="number" class="form-control" id="name" name="count[]" placeholder="Jumlah Barang"></td>
											<td><b class="text-danger btn closeDetail">X</b></td>
										</tr>
										<?php
										//jika update/edit
										if ($action == 'update') {
										?>
											<?php foreach ($detailItem as $key => $value) { ?>
												<tr>
													<input type="hidden" name="detailKey[]" value="<?php echo $value['pkey'] ?>">
													<td>
														<select class="form-control" name="itemKey[]">
															<?php foreach ($item as $itemKey => $itemVal) { ?>
																<option value="<?php echo $itemVal['pkey'] ?>" <?php echo $itemVal['pkey'] == $value['itemkey'] ? 'selected' : '' ?>><?php echo $itemVal['name'] ?>_<?php echo $itemVal['itemtypename'] ?> : <?php echo $itemVal['stock'] ?> <?php echo $itemVal['unitname'] ?></option>
															<?php } ?>
														</select>
													</td>
													<td><input type="number" class="form-control" id="name" name="count[]" placeholder="Jumlah Barang" value="<?php echo $value['count'] ?>"></td>
													<td><b class="text-danger btn closeDetail">X</b></td>
												</tr>
											<?php } ?>
										<?php } //jika update/edit
										?>
									</tbody>
									<tfoot>
										<tr>
											<td><button type="button" class="btn btn-primary" name="addDetail">Tambah</button></td>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- detail item -->
							<div class="col-sm-4">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nama teknisi</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<tr <?php echo $display ?>>
											<input type="hidden" name="detailWorkerKey[]">
											<td>
												<select class="form-control" name="workerKey[]">
													<option value="" disabled selected>Pilih Teknisi</option>
													<?php foreach ($worker as $workerKey => $workerVal) { ?>
														<option value="<?php echo $workerVal['pkey'] ?>"><?php echo $workerVal['name'] ?></option>
													<?php } ?>
												</select>
											</td>
											<td><b class="text-danger btn closeDetail">X</b></td>
										</tr>
										<?php
										//jika update/edit
										if ($action == 'update') {
										?>
											<?php foreach ($detailWorker as $key => $value) { ?>
												<tr>
													<input type="hidden" name="detailWorkerKey[]">
													<td>
														<select class="form-control" name="workerKey[]">
															<option value="" disabled>Pilih Teknisi</option>
															<?php foreach ($worker as $workerKey => $workerVal) { ?>
																<option value="<?php echo $workerVal['pkey'] ?>" <?php echo $workerVal['pkey'] == $value['workerkey'] ? 'selected' : ''; ?>><?php echo $workerVal['name'] ?></option>
															<?php } ?>
														</select>
													</td>
													<td><b class="text-danger btn closeDetail">X</b></td>
												</tr>
											<?php } ?>
										<?php } //jika update/edit
										?>
									</tbody>
									<tfoot>
										<tr>
											<td><button type="button" class="btn btn-primary" name="addDetail">Tambah</button></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<!-- detaile -->


						<div class=" form-group row mt-5">
							<div class="col-sm">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
							<div class="col-sm">
								<a href="<?php echo base_url($baseUrl . 'List') ?>" class="btn btn-warning btn-block">Cancel</a>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>