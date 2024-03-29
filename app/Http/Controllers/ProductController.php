<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends AbstractController
{
	private $serviceCategory;

    /**
     * Constructor class
     * @access public
     * @param ProductService $service
     * @param CategoryService $serviceCategory
     * @return void
     */
	public function __construct(ProductService $service, CategoryService $serviceCategory)
    {
        $this->service = $service;
        $this->serviceCategory = $serviceCategory;
    }

    /**
     * Index product
     * @access public
     * @return
     */
    public function index()
    {
    	$data['products'] = $this->service->getAll();
        return view('product/index', $data);
    }

    /**
     * Create product
     * @access public
     * @param int $id
     * @return
     */
    public function show(int $id)
    {
    	try {
    		$data['product'] = $this->service->getById($id);
    	} catch (ModelNotFoundException $e) {
    		return redirect('/')->with('error', "Id #$id não encontrado :(");
    	}

    	$data['product']->load('category');
    	$data['categories'] = $this->serviceCategory->getAll();
    	return view('product/show', $data);
    }

    /**
     * Create product
     * @access public
     * @return
     */
    public function create()
    {
    	$data['categories'] = $this->serviceCategory->getAll();
    	return view('product/create', $data);
    }

    /**
     * Store product
     * @access public
     * @param Request $request
     * @return
     */
    public function store(Request $request)
    {
    	try {
    		$this->service->store($request->all());
    	} catch (Exception $e) {
    		return redirect('/')->with('error', 'Não foi possível realizar a ação :(');
    	}
    	
    	return redirect('/')->with('success', 'Produto cadastrado com sucesso :)');
    }

    /**
     * Edit product
     * @access public
     * @param int $id
     * @return
     */
    public function edit(int $id)
    {
    	try {
    		$data['product'] = $this->service->getById($id);
    	} catch (ModelNotFoundException $e) {
    		return redirect('/')->with('error', "Id #$id não encontrado :(");
    	}

    	$data['categories'] = $this->serviceCategory->getAll();
    	return view('product/edit', $data);
    }

    /**
     * Update product
     * @access public
     * @param Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, int $id)
    {
    	try {
    		$data['product'] = $this->service->getById($id);
    	} catch (ModelNotFoundException $e) {
    		return redirect('/')->with('error', "Id #$id não encontrado :(");
    	}

    	$this->service->update($id, $request->all());
    	return redirect('/')->with('success', 'Produto atualizado com sucesso :)');
    }

    /**
     * Delete product
     * @access public
     * @param int $id
     * @return
     */
    public function delete(int $id)
    {
    	try {
    		$this->service->getById($id);
    	} catch (ModelNotFoundException $e) {
    		return redirect('/')->with('error', "Id #$id não encontrado :(");
    	}

    	$this->service->delete($id);
    	return redirect('/')->with('success', 'Produto excluido com sucesso :)');
    }
}
