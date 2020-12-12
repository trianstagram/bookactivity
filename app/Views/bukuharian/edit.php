<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-10">
                <h2 class="my-3">Form Ubah Kegiatan</h2>
                <form action="/bukuharian/update/<?= $buku['id_bh']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $buku['id_bh']; ?>">
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="kategori" name="kategori">
                                <?php foreach ($kategori as $k) { ?>
                                    <option value="<?php echo $k['kategori']; ?>"><?php echo $k['kategori']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control <?= ($validation->hasError('kegiatan')) ? 'is-invalid' : ''; ?>" id="kegiatan" rows="5" name="kegiatan" autofocus><?= $buku['kegiatan']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kegiatan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tag" aria-describedby="tag" name="tag" value="<?= $buku['tag']; ?>">
                            <small id="tagsmall" class="form-text text-muted">isikan tag kegiatan yang relevan.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Jumlah</label>
                        <div class="col-3">
                            <input class="form-control" type="number" value="<?= $buku['qty']; ?>" id="jumlah" name="jumlah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl" class="col-2 col-form-label">Tanggal</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="date" value="<?= $buku['tanggal']; ?>" id="Tgl" name="tgl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mulai" class="col-2 col-form-label">Mulai</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="time" value="<?= $buku['jam_mulai']; ?>" id="mulai" name="mulai">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="selesai" class="col-2 col-form-label">Selesai</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="time" value="<?= $buku['jam_selesai']; ?>" id="selesai" name="selesai">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-2 col-form-label">Foto Kegiatan</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-2 col-form-label">Status</label>
                        <div class="col-8">
                            <select class="form-control" id="status" name="status">
                                <option>Utama</option>
                                <option>Tambahan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>