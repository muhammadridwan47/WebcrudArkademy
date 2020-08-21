<?php namespace App\Models;

use CodeIgniter\Model;


class ProductModel extends Model
{
    protected $table  = 'produk';
    protected $useTimestamps  = false;
    protected $allowedFields  = ['nama_produk','keterangan','harga','jumlah'];


    public function getProduct($id = false){

        if ($id == false) {
            
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getAllProduct($keyword = false){

        if ($keyword == false) {
            
            return $this->findAll();
        }else{
         return $this->table('produk')->like('nama_produk',$keyword)->orLike('keterangan',$keyword)->findAll();; 
           
        }

        
    }
    
}