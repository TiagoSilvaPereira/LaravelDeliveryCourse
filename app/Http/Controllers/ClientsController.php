<?php

namespace KingDelivery\Http\Controllers;

use KingDelivery\Repositories\ClientRepository;
use KingDelivery\Services\ClientService;
use Illuminate\Http\Request;
use KingDelivery\Http\Requests\AdminClientRequest;

class ClientsController extends Controller
{
    private $repository;

    public function __construct(ClientRepository $repository, ClientService $clientService) {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index() {
        $clients = $this->repository->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function create() {
        return view('admin.clients.create');
    }

    public function edit($id) {
        $client = $this->repository->find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function store(AdminClientRequest $request) {
        $data = $request->all();
        $this->clientService->store($data);

        return redirect()->route('admin.clients.index');
    }

    public function update(AdminClientRequest $request, $id) {
        $data = $request->all();
        $this->clientService->update($data, $id);

        return redirect()->route('admin.clients.index');
    }
}
