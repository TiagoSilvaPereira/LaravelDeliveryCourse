<?php

namespace KingDelivery\Http\Controllers;

use KingDelivery\Services\OrderService;
use KingDelivery\Repositories\OrderRepository;
use KingDelivery\Repositories\UserRepository;
use KingDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    private $repository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    public function __construct(OrderRepository $repository, UserRepository $userRepository, ProductRepository $productRepository, OrderService $orderService) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    public function index() {
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->repository->scopeQuery(function($query) use ($clientId) {
            return $query->where('client_id', $clientId);
        })->paginate(10);

        return view('customer.order.index', compact('orders'));
    }

    public function create() {
        $products = $this->productRepository->all(['id', 'name', 'price']);
        return view('customer.order.create', compact('products'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;

        $this->orderService->create($data);

        return redirect()->route('customer.orders.index'); 
    }
}
