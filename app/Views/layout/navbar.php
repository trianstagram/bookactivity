<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Puskesmas Mlati II</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="/img/logo_puskesmas.png" width="20" height="20" alt="" loading="lazy">
                    </a>
                </nav>
                <?php if ((session()->get('level') == '1')) { ?>
                    <a class="nav-link" href="/laporan"> Laporan</a>
                    <a class="nav-link" href="/pages/about">About</a>
                    <a class="nav-link" href="/pages/contact">Contact</a>
                    <a class="nav-link" href=""><?= session()->get('nama'); ?></a>
                    <a class="nav-link" href="../Login/logout">Logout !</a>
                <?php } else if ((session()->get('level') == '2')) { ?>
                    <a class="nav-link active" href="../Pages">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="/users"> Daftar Pegawai</a>
                    <a class="nav-link" href="/bukuharian"> Buku Harian</a>
                    <a class="nav-link" href="/pages/about">About</a>
                    <a class="nav-link" href="/pages/contact">Contact</a>
                    <a class="nav-link" href=""><?= session()->get('nama'); ?></a>
                    <a class="nav-link" href="../Login/logout">Logout !</a>

                <?php } else { ?>
                    <a class="nav-link active" href="../Pages">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="/bukuharian"> Buku Harian</a>
                    <a class="nav-link" href="/pages/about">About</a>
                    <a class="nav-link" href="/pages/contact">Contact</a>
                    <a class="nav-link" href=""><?= session()->get('nama'); ?></a>
                    <a class="nav-link" href="../Login/logout">Logout !</a>
                <?php } ?>

            </div>
        </div>
    </div>
</nav>