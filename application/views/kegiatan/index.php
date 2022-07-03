<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Button trigger modal -->
					<div class="card">
						<div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKegiatanModal">
						Tambah Kegiatan
					    </button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Judul</th>
										<th>Kapasitas</th>
										<th>Harga Tiket</th>
										<th>Tanggal</th>
										<th>Narasumber</th>
										<th>Tempat</th>
										<th>PIC</th>
										<th>Foto Flyer</th>
										<th>Jenis Id</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($kegiatan as $key => $value) : ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $value->judul?></td>
                                            <td><?= $value->kapasitas?></td>
                                            <td><?= $value->harga_tiket?></td>
                                            <td><?= $value->tanggal?></td>
                                            <td><?= $value->narasumber?></td>
                                            <td><?= $value->tempat?></td>
                                            <td><?= $value->pic?></td>
                                            <td><?= $value->foto_flyer?></td>
                                            <td><?= $value->jenis_id?></td>
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
        <!-- tambahKegiatanModal -->
        <div class="modal fade" id="tambahKegiatanModal" tabindex="-1" aria-labelledby="tambahKegiatanModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahKegiatanModal">Tambah Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Kapasitas</label>
                                <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Harga Tiket</label>
                                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Masukkan harga tiket" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Narasumber</label>
                                <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Masukkan narasumber" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tempat</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">PIC</label>
                                <input type="text" class="form-control" id="pic" name="pic" placeholder="Masukkan PIC" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Foto Flyer</label>
                                <input type="file" class="form-control" id="foto_flyer" name="foto_flyer" placeholder="Masukkan foto flyer" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jenis Id</label>
                                <input type="number" class="form-control" id="jenis_id" name="jenis_id" placeholder="Masukkan jenis id" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="tambahKegiatan">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>