<?php

namespace KingDelivery\Http\Controllers;

use KingDelivery\Repositories\CupomRepository;
use Illuminate\Http\Request;
use KingDelivery\Http\Requests\AdminCupomRequest;

class CupomsController extends Controller
{
    private $repository;

    public function __construct(CupomRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $cupoms = $this->repository->paginate(10);
        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create() {
        return view('admin.cupoms.create');
    }

    public function edit($id) {
        $cupom = $this->repository->find($id);
        return view('admin.cupoms.edit', compact('cupom'));
    }

    public function store(AdminCupomRequest $request) {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.cupoms.index');
    }

    public function update(AdminCupomRequest $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.cupoms.index');
    }
}
