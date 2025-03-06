<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Order\UpdateStatusRequest;
use App\Http\Requests\User\Order\UserOrderStoreRequest;
use App\Http\Resources\User\Order\OrderIndexResource;
use App\Http\Resources\User\Order\UserOrderStoreResource;
use App\Models\Order;
use App\Services\User\OrderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): Factory|View|Application
    {
        $order = OrderService::index();
        $orderResource = OrderIndexResource::collection($order)->resolve();
        return view('user/order/index', compact('orderResource'));
    }

    public function show(Order $order): Factory|View|Application
    {
        $order = OrderIndexResource::make($order)->resolve();
        return view('user/order/show', compact('order'));
    }

    public function store(UserOrderStoreRequest $request): Factory|View|Application
    {
        $data = $request->validationData();
        $order = OrderService::store($data);
        $resourceOrder = UserOrderStoreResource::make($order)->resolve();
        return view('user/order/show', compact('resourceOrder'));

    }

    public function destroy(Order $order): RedirectResponse
    {
        OrderService::destroy($order);
        return redirect()->route('user.order.index');
    }

    public function updateStatus(UpdateStatusRequest $request, Order $order)
    {
        dd($request);
        $data = $request->validationData();
        dd($data);
        $order->update($data);
        $order->fresh();
        return redirect()->route('user.order.index');
//        return OrderStatusResource::make($order)->resolve();
    }
}
