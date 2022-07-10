<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?= $this->session->userdata('pesan') ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahPesertaModal">
                Tambah Jenis Peserta
            </button>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Jenis Peserta</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jenis_peserta as $key => $value) : ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPesertaModal<?= $value->id ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= base_url('index.php/jenisPeserta/delete/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <!-- editPesertaModal -->
                                        <div class="modal fade" id="editPesertaModal<?= $value->id ?>" tabindex="-1" aria-labelledby="editPesertaModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPesertaModal">Edit Kategori Peserta</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="<?= base_url('index.php/jenisPeserta/update') ?>">
                                                        <input type="hidden" name="id" value="<?= $value->id ?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nama">Kategori Peserta</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Kategori Peserta" required value="<?= $value->nama ?>">
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

<!-- tambahPesertaModal -->
<div class="modal fade" id="tambahPesertaModal" tabindex="-1" aria-labelledby="tambahPesertaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPesertaModal">Tambah Kategori Peserta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('index.php/jenisPeserta/insert') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Kategori Peserta</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Kategori Peserta" required>
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