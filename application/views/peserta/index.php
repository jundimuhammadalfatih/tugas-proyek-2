<div class="container-fluid">
    <?= $this->session->userdata('pesan') ?>
    <div class="row justify-content-start">
        <?php foreach ($kegiatan as $k): ?>
            <div class="col-3">
                <div class="card" style="width: 16rem; max-height: 400px; height: 400px;">
                    <div style="width: 100%;" class="text-center shadow">
                        <a href="<?= base_url('assets/img_kegiatan/'.$k->foto_flyer) ?>" target="_blank">
                            <img src="<?= base_url('assets/img_kegiatan/'.$k->foto_flyer) ?>" class="card-img-top" alt="image" style="max-width: 150px; max-height: 150px;">
                        </a>
                    </div>
                    <div class="card-body" style="color: #797979;">
                        <h5 class="card-title text-center mb-2 font-weight-bold" style="color: #525252;"><?= $k->judul ?></h5>
                        <p class="card-text small m-0">
                            <i class="fas fa-bookmark"></i> &nbsp; <?= $k->nama ?>
                        </p>
                        <p class="card-text small m-0">
                            <i class="fas fa-users"></i> &nbsp; <?= $k->kapasitas ?> Orang
                        </p>
                        <p class="card-text small m-0">
                            <i class="far fa-money-bill-alt"></i> &nbsp; Rp. <?= number_format($k->harga_tiket, 2, ',', '.') ?>
                        </p>
                        <p class="card-text small m-0">
                            <i class="fas fa-microphone-alt"></i> &nbsp; <?= $k->narasumber ?>
                        </p>
                        <p class="card-text small m-0">
                            <i class="fas fa-map-marker-alt"></i> &nbsp; <?= $k->tempat ?>
                        </p>
                    </div>
                    <?php if (!in_array($k->id, array_column($kegiatan_terdaftar, 'kegiatan_id'))): ?>
                        <form action="#" method="get" class="mb-2 mr-2">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#daftarKegiatanModal<?= $k->id ?>">Daftar</button>
                        </form>
                    <?php else: ?>
                        <form action="#" method="get" class="mb-2 mr-2">
                            <button type="button" class="btn btn-secondary disabled btn-sm float-right">Sudah terdaftar</button>
                        </form>
                    <?php endif ?>
                </div>
            </div>
            <?php if (!in_array($k->id, array_column($kegiatan_terdaftar, 'kegiatan_id'))): ?>
                <!-- daftarKegiatanModal -->
                <div class="modal fade" id="daftarKegiatanModal<?= $k->id ?>" tabindex="-1" aria-labelledby="daftarKegiatanModal<?= $k->id ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="daftarKegiatanModal<?= $k->id ?>">Daftar Kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= base_url('index.php/peserta/daftar') ?>">
                                <input type="hidden" name="kegiatan_id" value="<?= $k->id ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="jenis_kegitan">Jenis Peserta</label>
                                        <select class="form-control" name="jenis_peserta" id="jenis_peserta" required>
                                            <option value="" selected disabled>-- Pilih Jenis Peserta --</option>
                                            <?php foreach ($jenis_peserta as $j): ?>
                                                <option value="<?= $j->id ?>"><?= $j->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alasan">Alasan</label>
                                        <textarea type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukkan alasan" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="daftarKegiatan">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>