<?php

namespace App\Controllers;

use Config\Services;

class Home extends BaseController
{
	public function index()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Hehe..  Login dulu bro!');
			return redirect()->to(base_url('login'));
		}
		// return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
