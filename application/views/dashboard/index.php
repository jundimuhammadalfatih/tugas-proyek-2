<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Hello, <?= $this->session->userdata('username') ?></h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>Terima kasih telah menggunakan layanan kami.</p>
        <a href="<?= base_url('Auth/logout') ?>" class="btn btn-secondary">
            <i class="nav-icon fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>