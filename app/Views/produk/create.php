<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-8">
        <h2 class="my-5">Form Tambah Produk</h2>

        <form action="/product/save" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : '' ?> " id="produk" name="produk" value="<?= old('produk'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('produk') ?>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?> " id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('keterangan') ?>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?> " id="harga" name="harga" value="<?= old('harga'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga') ?>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : '' ?> " id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah') ?>
                </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <button class="btn btn-success float-right" type="submit">Tambah Produk</button>
                </div>
            </div>

        </form>



        </div>
    </div>
</div>

<?= $this->endSection() ?>

