<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p><?= session()->getFlashdata('pesan'); ?></p>
                    <hr>
                    <p class="mb-0">Have nice day..!</p>
                </div>
            <?php endif; ?>
            <h1 class="mt-2">Daftar Pegawai</h1>
            <a href="/users/create" class="btn btn-primary mt-2 mb-2">Tambah Pegawai</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Profil</th>
                        <th scope="col">Nama Pegawai</th>
                        <th>Profesi</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $u['foto']; ?>" alt="" class="displayProfil"></td>
                            <td><?= $u['nama'] ?></td>
                            <td><?= $u['profesi']; ?></td>
                            <td>
                                <a href="" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>