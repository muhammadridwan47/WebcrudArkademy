<?php
 namespace App\Controllers;
 use App\Models\ProductModel;
class Product extends BaseController
{

    protected $ProductModel;

    public function __construct()
    {
         $this->ProductModel = new ProductModel();
    }

	public function index()
	{
    
        if ($cari = $this->request->getvar('cari')) {
        
            $produk = $this->ProductModel->getAllProduct($cari);
        }else{
           $produk =  $this->ProductModel->getAllProduct();
        }


        $data = [
            'judul' => 'Halaman Produk',
            'produk' => $produk
        ];





		return view('produk/index',$data);
    }


    public function create()
    {
        // session();
        $data = [
            'judul' => 'Halaman tambah Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('produk/create',$data);
    }


    public function save()
    {


        if (!$this->validate([
            'produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Product harus diisi'
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' keterangan harus diisi'
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' harga harus diisi'
                ],
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' jumlah harus diisi'
                ],
            ]

        ])){

            return redirect()->to('/product/create')->withInput(); 
        }

        $this->ProductModel->save([
            'nama_produk' => $this->request->getvar('produk'),
            'penulis' => $this->request->getvar('penulis'),
            'keterangan' => $this->request->getvar('keterangan'),
            'harga' => $this->request->getvar('harga'),
            'jumlah' => $this->request->getvar('jumlah')
        ]);

        session()->setFlashdata('pesan','Data berhasil ditambahkan');
        return redirect()->to('/product'); 

    }


    public function delete($id)
    {

        $this->ProductModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('/product');
    }

    public function edit($slug)
    {


        $data = [
            'judul' => 'Halaman tambah data',
            'validation' => \Config\Services::validation(),
            'produk' => $this->ProductModel->getProduct($slug)
        ];

        return view('produk/edit',$data);
    }

    public function update($id)
    {
        


        if (!$this->validate([

            'produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product harus diisi',
                ],
            ]

        ])){
            return redirect()->to('/product/edit/'.$id)->withInput(); 
        }
        $security = \Config\Services::security();
        

        $this->ProductModel->save([
            'id' => $id,
            'nama_produk' => $security->sanitizeFilename($this->request->getvar('produk')),
            'keterangan' => $security->sanitizeFilename($this->request->getvar('keterangan')),
            'harga' => $security->sanitizeFilename($this->request->getvar('harga')),
            'jumlah' => $security->sanitizeFilename($this->request->getvar('jumlah')),
        ]);

        session()->setFlashdata('pesan','Data berhasil diubah');
        return redirect()->to('/product'); 

    }



}
