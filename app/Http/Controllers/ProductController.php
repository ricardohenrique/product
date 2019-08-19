<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends AbstractController
{
	private $serviceCategory;

	public function __construct(ProductService $service, CategoryService $serviceCategory)
    {
        $this->service = $service;
        $this->serviceCategory = $serviceCategory;
    }

    public function index(){
    	$data['products'] = $this->service->getAll();
    	return view('product/index', $data);
    }

    public function create(){
    	$data['categories'] = $this->serviceCategory->getAll();
    	return view('product/create', $data);
    }

    public function store(Request $request){
    	try {
    		$this->service->store($request->all());
    	} catch (Exception $e) {
    		return redirect('/')->with('error', 'Não foi possível realizar a ação :(');
    	}
    	
    	return redirect('/')->with('success', 'Produto cadastrado com sucesso :)');
    }

    public function edit($id){
    	try {
    		$data['product'] = $this->service->getById($id);
    	} catch (ModelNotFoundException $e) {
    		return redirect('/')->with('error', "Id #$id não encontrado :(");
    	}

    	$data['categories'] = $this->serviceCategory->getAll();
    	return view('product/edit', $data);
    }

    public function update(Request $request, $id){
    	try {
    		$data['product'] = $this->service->getById($id);
    	} catch (ModelNotFoundException $e) {
    		return redirect('/')->with('error', "Id #$id não encontrado :(");
    	}

    	$this->service->update($id, $request->all());
    	return redirect('/')->with('success', 'Produto atualizado com sucesso :)');
    }
}
