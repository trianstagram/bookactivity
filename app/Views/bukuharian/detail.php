<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach ($buku as $b) : ?>
                <div class="card" style="width: 45rem;">
                    <img src="/img/activity.gif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3><?= $b['kategori']; ?></h3>
                        <p><?= $b['kegiatan']; ?></p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <?php $tgl = $b['tanggal'];
                        $id = $b['id_bh'];
                        ?>
                        <li class="list-group-item">Katakunci: <?= $b['tag']; ?> </li>
                        <li class="list-group-item">Jumlah : <?= $b['qty']; ?></li>
                        <li class="list-group-item">Mulai : <?= $b['jam_mulai']; ?> </li>
                        <li class="list-group-item">Selesai : <?= $b['jam_selesai']; ?> </li>
                        <li class="list-group-item">Tanggal : <?php echo date('d F Y', strtotime($tgl)); ?></li>
                        <li class="list-group-item">Interval : <?= $b['interval']; ?> Menit</li>
                        <li class="list-group-item">Status : <?= $b['status']; ?> | <?= $b['status_buku']; ?> </li>
                        <li class="list-group-item">Dibuat pada : <?= $b['created_at']; ?> </li>
                        <li class="list-group-item">Pembaruan pada : <?= $b['updated_at']; ?> </li>
                    </ul>
                    <div class="card-body">
                        <a href="/bukuharian/edit/<?= $id; ?>" class="btn btn-warning">Ubah</a>
                        <form action="/bukuharian/<?= $id; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus kegiatan ini?');">Hapus</button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>