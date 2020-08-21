<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		
        $data = ['judul' => 'Halaman Home'];
		// return view('welcome_message');
		return view('home/index',$data);
	}

	//--------------------------------------------------------------------

}
