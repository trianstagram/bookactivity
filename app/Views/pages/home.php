<?= $this->extend('layout/tamplate'); ?>
<?php session(); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hi, Selamat Datang <?= session()->get('nama'); ?> !</h1>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Hasil Kegiatan Harianmu </h3>
                            <h1><?= $act ?> Menit</h1>
                            <p class="card-text">Anda telah menyelesaikan <?= $act ?> Menit dalam Bulan ini, Jadi tinggal <?= $res ?> Menit lagi dari total target <?= $target ?> Menit selama satu bulan, Semagat ya!</p>
                            <a href="\bukuharian" class="btn btn-primary">Lihat Kegiatanmu!</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?= $this->endSection(); ?>