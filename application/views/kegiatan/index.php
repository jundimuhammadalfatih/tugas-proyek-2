<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?= $this->session->userdata('pesan') ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahKegiatanModal">
                Tambah Kegiatan
            </button>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kegiatan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kapasitas</th>
                                    <th>Harga Tiket</th>
                                    <th>Tanggal</th>
                                    <th>Narasumber</th>
                                    <th>Tempat</th>
                                    <th>PIC</th>
                                    <th>Foto Flyer</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kegiatan as $key => $value) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $value->judul ?></td>
                                        <td><?= $value->kapasitas ?></td>
                                        <td>Rp.&nbsp;<?= number_format($value->harga_tiket, 2, ',', '.') ?></td>
                                        <td><?= $value->tanggal?></td>
                                        <td>
                                            <?php $narasumber = explode(', ', $value->narasumber) ?>
                                            <table>
                                                <?php foreach ($narasumber as $n): ?>
                                                    <tr>
                                                        <td class="border-0 p-0">- <?= $n ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </table>
                                        </td>
                                        <td><?= $value->tempat ?></td>
                                        <td><?= $value->pic ?></td>
                                        <td>
                                            <a href="<?= base_url('assets/img_kegiatan/'.$value->foto_flyer) ?>" target="_blank">
                                                <img src="<?= base_url('assets/img_kegiatan/'.$value->foto_flyer) ?>" alt="Foto Flyer" class="img-thumbnail" style="width: 150px;">
                                            </a>
                                        </td>
                                        <td><?= $value->nama ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKegiatanModal<?= $value->id ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url('index.php/kegiatan/delete/'.$value->id) ?>" class=" mt-1 btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                            <!-- editKegiatanModal -->
                                            <div class="modal fade" id="editKegiatanModal<?= $value->id ?>" tabindex="-1" aria-labelledby="editKegiatanModal<?= $value->id ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editKegiatanModal<?= $value->id ?>">Edit Kegiatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="<?= base_url('index.php/kegiatan/update') ?>" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?= $value->id ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="judul">Judul</label>
                                                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required value="<?= $value->judul ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kapasitas">Kapasitas</label>
                                                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas" required value="<?= $value->kapasitas ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_tiket">Harga Tiket</label>
                                                                    <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Masukkan harga tiket" required value="<?= $value->harga_tiket ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tanggal">Tanggal</label>
                                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal" required value="<?= $value->tanggal ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="narasumber">Narasumber</label>
                                                                    <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Masukkan narasumber" required value="<?= $value->narasumber ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tempat">Tempat</label>
                                                                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat" required value="<?= $value->tempat ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pic">PIC</label>
                                                                    <input type="text" class="form-control" id="pic" name="pic" placeholder="Masukkan PIC" required value="<?= $value->pic ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="foto_flyer">Foto Flyer</label>
                                                                    <input type="file" class="form-control" id="foto_flyer" name="foto_flyer" placeholder="Masukkan foto flyer" required value="<?= $value->foto_flyer ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis_kegitan">Jenis Kegiatan</label>
                                                                    <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" required>
                                                                        <option value="" selected disabled>-- Pilih Jenis Kegiatan --</option>
                                                                        <?php foreach ($jenis_kegiatan as $j): ?>
                                                                            <option value="<?= $j->id ?>" <?= $value->jenis_id == $j->id ? 'selected' : '' ?>><?= $j->nama ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
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
            <form method="post" action="<?= base_url('index.php/kegiatan/insert') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" required>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_tiket">Harga Tiket</label>
                        <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Masukkan harga tiket" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="narasumber">Narasumber</label>
                        <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Masukkan narasumber" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat" required>
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <input type="text" class="form-control" id="pic" name="pic" placeholder="Masukkan PIC" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_flyer">Foto Flyer</label>
                        <input type="file" class="form-control" id="foto_flyer" name="foto_flyer" placeholder="Masukkan foto flyer" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kegitan">Jenis Kegiatan</label>
                        <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" required>
                            <option value="" selected disabled>-- Pilih Jenis Kegiatan --</option>
                            <?php foreach ($jenis_kegiatan as $j): ?>
                                <option value="<?= $j->id ?>"><?= $j->nama ?></option>
                            <?php endforeach ?>
                        </select>
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