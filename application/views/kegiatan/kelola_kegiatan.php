<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pendaftar Kegiatan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Alasan</th>
                                    <th>Jenis Peserta</th>
                                    <th>No. Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kegiatan as $key => $value) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->judul ?></td>
                                        <td><?= $value->tanggal_daftar ?></td>
                                        <td><?= $value->alasan ?></td>
                                        <td><?= $value->nama ?></td>
                                        <td><?= $value->nosertifikat ?></td>
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