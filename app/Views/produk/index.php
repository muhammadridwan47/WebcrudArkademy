<?= $this->extend('layout/template') ?>


<?= $this->section('content') ?>




<div class="container mt-5">
    <div class="row">
        <div class="col">
        <h1 class="display-4 d-inline">List Product</h1>
        
        <a href="/product/create" class="btn btn-success btn-sm  mb-4 ml-5">tambah data</a>

        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif ?>
        <form action="/product" method="POST">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search your product" name="cari" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit" name="submit" id="button-addon2">Searching</button>
            </div>
           
        </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($produk as $k): ?>
                <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $k['nama_produk'] ?></td>
                <td><?= $k['harga'] ?></td>
                <td><?= $k['jumlah'] ?></td>
                <td><?= $k['keterangan'] ?></td>
                <td>
                    
                    <a href="/product/edit/<?= $k['id'] ?>" class="btn btn-sm btn-info">update</a> |

                    <form action="/product/delete/<?= $k['id'] ?>" method="POST" class="d-inline" >
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('apakah anda yakin')">Hapus</button>
                    </form>

                </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>            


        </div>
    </div>
</div>

<?= $this->endSection() ?>