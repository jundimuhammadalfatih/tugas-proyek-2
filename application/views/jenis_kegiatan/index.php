<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?= $this->session->userdata('pesan') ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahJenisKegiatanModal">
                Tambah Jenis Kegiatan
            </button>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Jenis Kegiatan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
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
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editJenisKegiatanModal<?= $value->id ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?= base_url('index.php/jenisKegiatan/delete/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm ('Yakin ingin menghapus data ini?')"\>
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <!-- editJenisKegiatanModal -->
                                        <div class="modal fade" id="editJenisKegiatanModal<?= $value->id ?>" tabindex="-1" aria-labelledby="editJenisKegiatanModal<?= $value->id ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editJenisKegiatanModal<?= $value->id ?>">Edit Jenis Kegiatan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="<?= base_url('index.php/jenisKegiatan/update') ?>">
                                                        <input type="hidden" name="id" value="<?= $value->id ?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nama">Jenis Kegiatan</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="MasuKkan jenis kegiatan" required value="<?= $value->nama ?>">
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
            <form method="post" action="<?= base_url('index.php/jenisKegiatan/insert') ?>">
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