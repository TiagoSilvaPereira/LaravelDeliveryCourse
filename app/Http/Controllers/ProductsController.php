<?php

namespace KingDelivery\Http\Controllers;

use KingDelivery\Repositories\ProductRepository;
use KingDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use KingDelivery\Http\Requests\AdminProductRequest;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository) {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $products = $this->repository->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $categories = $this->categoryRepository->lists();
        return view('admin.products.create', compact('categories'));
    }

    public function edit($id) {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->lists();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function store(AdminProductRequest $request) {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');
    }

    public function update(AdminProductRequest $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.products.index');
    }

    public function delete($id) {
        $this->repository->delete($id);

        return redirect()->route('admin.products.index');
    }
}