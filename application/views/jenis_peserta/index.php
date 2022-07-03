<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahPesertaModal">
						Tambah Jenis Peserta
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Jenis Peserta</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Kategori Peserta</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($jenis_peserta as $key => $value) : ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $value->nama ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
                    <button type="submit" class="btn btn-success mb-2" data-toggle="modal" data-target="#">
						    Edit
					        </button>
                            <button type="reset" class="btn btn-danger mb-2" data-toggle="modal" data-target="#">
						    Hapus
					        </button>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
		</div><!-- /.container-fluid -->
        <!-- tambahPesertaModal -->
        <div class="modal fade" id="tambahPesertaModal" tabindex="-1" aria-labelledby="tambahPesertaModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPesertaModal">Tambah Jenis Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Jenis Peserta</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anda" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="tambahPasien">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>