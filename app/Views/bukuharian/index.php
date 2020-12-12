<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Buku Harian Pegawai Puskesmas Mlati II</h1>
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Terimakasih!</h4>
                    <p><?= session()->getFlashdata('pesan'); ?></p>
                    <hr>
                    <p class="mb-0">Jangan lupa isi kegiatan lainya ya, Have nice day..!</p>
                </div>
            <?php } else if (session()->getFlashdata('hapus')) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Yahhhh...!</h4>
                    <p><?= session()->getFlashdata('hapus'); ?></p>
                    <hr>
                    <p class="mb-0">Jangan lupa isi kegiatan lainya ya, Have nice day..!</p>
                </div>
            <?php } ?>

            <?php
            $tanggal = mktime(date('m'), date("d"), date('Y'));
            echo "Tanggal : <b> " . date("d-m-Y", $tanggal) . "</b>";
            date_default_timezone_set("Asia/Jakarta");
            $jam = date("H:i:s");
            echo " | Pukul : <b> " . $jam . " " . " </b> ";
            $a = date("H");
            if (($a >= 6) && ($a <= 11)) {
                echo " <b>, Hi, Selamat Pagi !! </b>";
            } else if (($a >= 11) && ($a <= 15)) {
                echo " , Hi, Selamat  Pagi !! ";
            } elseif (($a > 15) && ($a <= 18)) {
                echo ", Hi, Selamat Siang ?> !!";
            } else {
                echo ", <b> Hi, Selamat Malam !</b>";
            }
            ?>
            </br>
            <a href="/bukuharian/create" class="btn btn-primary mt-2 mb-2">Tambah Kegiatan</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">Status</th>
                        <th scope="col">Waktu Entri</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $b['kegiatan'] ?></td>
                            <td><?= $b['kategori'] ?></td>
                            <td><?= $b['qty'] ?></td>
                            <td><?= $b['jam_mulai'] ?></td>
                            <td><?= $b['jam_selesai'] ?></td>
                            <td><?= $b['status'] ?> - <?= $b['status_buku'] ?></td>
                            <td><?= $b['created_at'] ?></td>
                            <td>
                                <form action="bukuharian/detail/<?= $b['id_bh'] ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-info">Detail</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>