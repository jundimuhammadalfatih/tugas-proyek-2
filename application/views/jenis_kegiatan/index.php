<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Button trigger modal -->
					<div class="card">
						<div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahJenisKegiatanModal">
						Tambah Jenis Kegiatan
					    </button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Jenis Kegiatan</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($jenis_kegiatan as $key => $value) : ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $value->nama ?></td>
                                            <td>
                                                <a href="<?= base_url('users/delete/'.$value->id) ?>" class="btn btn-sm btn-warning" onclick="return confirm ('Edit data ini?')"\>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?= base_url('users/delete/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm ('Hapus data ini?')"\>
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
		</div><!-- /.container-fluid -->
        <!-- tambahJenisKegiatanModal -->
        <div class="modal fade" id="tambahJenisKegiatanModal" tabindex="-1" aria-labelledby="tambahJenisKegiatanModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahJenisKegiatanModal">Tambah Jenis Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Jenis Kegiatan</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="MasuKkan jenis kegiatan" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="tambahJenisKegiatan">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>