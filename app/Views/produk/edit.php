<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-8">
        <h2 class="my-3">Form ubah data</h2>

        <form action="/product/update/<?= $produk['id'] ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $produk['id'] ?>">
            <div class="form-group row">
                <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : '' ?> " id="produk" name="produk" value="<?= (old('produk')) ? old('produk') : $produk['nama_produk']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('produk') ?>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $produk['keterangan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">harga</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $produk['harga']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">jumlah</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $produk['jumlah']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button class="btn btn-success float-right" type="submit">Ubah Data</button>
                </div>
            </div>

        </form>



        </div>
    </div>
</div>

<?= $this->endSection() ?>

