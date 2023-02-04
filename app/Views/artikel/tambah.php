<?= $this->extend('templates/header'); ?>
<?= $this->section('page-content'); ?>

<h1><?= $title ?></h1>
<form action="<?= base_url('artikel/simpan') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="judul">Judul Artikel</label>
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Artikel">
    </div>
    <div class="form-group">
        <label for="gambar">Gambar Artikel</label>
        <input type="file" class="form-control-file" name="gambar" id="gambar">
    </div>
    <div class="form-group">
        <label for="konten">Konten Artikel</label>
        <textarea class="form-control" name="konten" id="konten" rows="3" placeholder="Masukkan Konten Artikel"></textarea>
    </div>
    <div class="form-group">
        <label>Kategori Artikel</label>
        <select class="js-example-basic-single w-100" name="kategori">
            <option hidden>-- Pilih Kategori --</option>

            <?php if (empty($kategori)) : ?>
                <option disabled>---DATA KOSONG---</option>
            <?php else : ?>
                <?php $no = 0 ?>
                <?php foreach ($kategori as $l) : ?>
                    <option value="<?= $l['id']; ?>"><?= $l['nama_kategori']; ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection(); ?>