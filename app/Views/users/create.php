<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-10">
                <h2 class="my-3">Form Tambah Pegawai</h2>
                <form action="/users/save" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="lb" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" aria-describedby="nama" name="nama" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profesi" class="col-2 col-form-label">Profesi</label>
                        <div class="col-8">
                            <select class="form-control" id="profesi" name="profesi">
                                <?php foreach ($profesi as $p) { ?>
                                    <option value="<?php echo $p['id_profesi']; ?>"><?php echo $p['profesi']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-2 col-form-label">Foto </label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" aria-describedby="username" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="password" aria-describedby="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telfon" class="col-2 col-form-label">Telfon</label>
                        <div class="col-3">
                            <input class="form-control" type="text" id="telfon" name="telfon" placeholder="085742063639">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl" class="col-2 col-form-label">Tanggal lahir</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="date" value="2011-08-19" id="Tgl" name="tgl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>