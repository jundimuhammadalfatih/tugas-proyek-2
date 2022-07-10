<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data User</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Email</th>
								<th>Terakhir Login</th>
								<th>Role</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $key => $value) : ?>
								<tr>
									<td><?= ++$key ?></td>
									<td><?= $value->username ?></td>
									<td><?= $value->email ?></td>
									<td><?= $value->last_login ?></td>
									<td><?= $value->role ?></td>
									<td><?= $value->status == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
									<td>
										<a href="<?= base_url('index.php/users/delete/'.$value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
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