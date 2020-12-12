<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Laporan Buku Harian</h1>
            <?php foreach ($report as $r) : ?>
                <div class="row">
                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-body ">
                                <h3 class="card-title"><?= $r['nama']; ?></h3>
                                <h5>Profesi : <?= $r['profesi']; ?></h5>
                                <h1 class="card-title"><?= $r['interval'] ?> Menit</h1>
                                <?php $tot = $r['target'];
                                $aktivitas = $r['interval'];
                                $hasil = $aktivitas - $tot; ?>
                                <p class="card-text"><?= $r['nama']; ?> telah menyelesaikan <?= $r['interval'] ?> Menit, <b>kekurangan / kelebihan = <?= $hasil; ?> Menit </b> dari total = <?= $r['target'] ?> Menit dalam profesi sebagai <?= $r['profesi'] ?> dalam bulan ini. </p>
                                <a href="\bukuharian" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>