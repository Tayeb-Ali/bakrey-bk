<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Bakery;
use App\Models\Driver;
use App\Repositories\OrderRepository;
use App\User;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
    public function index(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('orders.index');
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        $bakery = Bakery::all()->pluck('name', 'id');
        $agency = User::where('role', 2)->pluck('name', 'id');
        $users = User::where('role', 3)->pluck('name', 'id');
        $drivers = Driver::all()->pluck('name', 'id');
        return view('orders.create', compact('bakery', 'agency', 'users', 'drivers'));
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
        $order = $this->orderRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/orders.singular')]));

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('models/orders.singular') . ' ' . __('messages.not_found'));

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);
        $bakery = Bakery::all()->pluck('name', 'id');
        $agency = User::where('role', 2)->pluck('name', 'id');
        $users = User::where('role', 3)->pluck('name', 'id');
        $drivers = Driver::all()->pluck('name', 'id');
        if (empty($order)) {
            Flash::error(__('messages.not_found', ['model' => __('models/orders.singular')]));

            return redirect(route('orders.index'));
        }

        return view('orders.edit', compact('order', 'bakery', 'agency', 'users', 'drivers'));
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
//        return $request->all()
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('messages.not_found', ['model' => __('models/orders.singular')]));

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/orders.singular')]));

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error(__('messages.not_found', ['model' => __('models/orders.singular')]));

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/orders.singular')]));

        return redirect(route('orders.index'));
    }
}
