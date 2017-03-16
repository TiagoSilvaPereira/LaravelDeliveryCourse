<?php

namespace KingDelivery\Http\Controllers;

use Illuminate\Http\Request;
use KingDelivery\Repositories\OrderRepository;
use KingDelivery\Repositories\UserRepository;

class OrdersController extends Controller
{
    private $repository;

    public function __construct(OrderRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $orders = $this->repository->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id, UserRepository $userRepository) {
        
        $listStatus = [
            0 => 'Pendente',
            1 => 'A caminho',
            2 => 'Entregue'
        ];

        $deliveryMen = $userRepository->getDeliveryMen();

        $order = $this->repository->find($id);
        return view('admin.orders.edit', compact('order', 'listStatus', 'deliveryMen'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.orders.index');
    }
}
