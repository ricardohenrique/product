<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends AbstractController
{

	public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(){
    	$data = $this->service->getAll();
    	dd($data);
    	return view('welcome');
    }
}
