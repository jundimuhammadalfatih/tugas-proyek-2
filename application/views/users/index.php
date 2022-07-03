<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Users</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $key => $value) : ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $value->username ?></td>
                                            <td><?= $value->email ?></td>
                                            <td><?= $value->role ?></td>
                                            <td><?= $value->status ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
                    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#">
						    Edit
					        </button>
                            <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#">
						    Hapus
					        </button>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
		</div><!-- /.container-fluid -->