<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<div class="container">
    <div class="row">
        <div class="col">

        <h2 class="display-4 mt-5">Detail Komik</h2>
        <div class="card mb-3 " style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="/img/<?= $komik['sampul'] ?>" class="card-img">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $komik['judul'] ?></h5>
                    <p class="card-text"><b>Penulis : </b><?= $komik['penulis'] ?></p>
                    <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?= $komik['penerbit'] ?></small></p>

                    <a href="/komik" class="btn btn-success">Return to komik</a>
                    <a href="/komik/edit/<?= $komik['slug'] ?>" class="btn btn-warning">Edit</a>

                    <form action="/komik/<?= $komik['id'] ?>" method="POST" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit" >Hapus</button>
                    </form>
                    
                </div>
                </div>
            </div>
        </div>



        </div>
    </div>
</div>

<?= $this->endSection() ?>