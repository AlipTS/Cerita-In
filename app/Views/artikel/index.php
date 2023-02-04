<?= $this->extend('templates/header'); ?>
<?= $this->section('page-content'); ?>
<div class="row index-part">
    <div class="col-12">
        <h1 class="text-center my-3">Daftar Artikel</h1>
        <a href="Artikel/tambah" class="btn btn-primary mb-3">Tambah Artikel</a>
        <div class="d-flex flex-wrap">
            <?php foreach ($artikel as $a) : ?>
                <a href="<?php echo base_url('artikel/view/' . $a['id']) ?>" class="card m-2" style="width: 30%; height: 300px;">
                    <div>
                        <img class="card-img" src="<?= base_url(); ?>/img/artikel/<?= $a['gambar']; ?>" alt="<?= $a['gambar']; ?>">
                        <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.5); color: #fff;">
                            <h5 class="card-title"><?php echo $a['judul'] ?></h5>
                            <p class="card-text">
                                Kategori:
                                <?php $kategori2 = $kategori->where('id', $a['kategori_id'])->get()->getResultArray()[0]['nama_kategori']; ?>
                                <?= $kategori2; ?>
                            </p>
                            <p class="card-text">Tanggal: <?php echo $a['tanggal'] ?></p>

                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>