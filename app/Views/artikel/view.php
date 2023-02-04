<?= $this->extend('templates/header'); ?>
<?= $this->section('page-content'); ?>
<div style="height: 100px; background-color: lightgray;">
    Iklan di bagian atas
</div>
<div style="display: flex;">
    <div class="card" style="flex-grow: 1; margin: 30px;">
        <div class="card-header text-center">
            <h2><?php echo $artikel['judul'] ?></h2>
        </div>
        <div class="card-body">
            <img src="/img/artikel/<?php echo $artikel['gambar'] ?>" alt="<?php echo $artikel['judul'] ?> Thumbnail" class="img-fluid p-5">
            <p><strong>Kategori:</strong>
                <?php $kategori2 = $kategori->where('id', $artikel['kategori_id'])->get()->getResultArray()[0]['nama_kategori']; ?>
                <?= $kategori2; ?></p>
            <p><strong>Tanggal Post:</strong> <?php echo $artikel['tanggal'] ?></p>
            <p><strong>Isi:</strong> <?php echo $artikel['konten'] ?></p>
        </div>
    </div>
    <div style="width: 250px; height: auto; background-color: lightgray;">
        Iklan disisi kanan
    </div>
</div>
<div style="height: 250px; background-color: lightgray;">
    Iklan di bawah
</div>


<?= $this->endSection(); ?>