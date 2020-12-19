<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderAPIRequest;
use App\Http\Requests\API\UpdateOrderAPIRequest;
use App\Models\Bakery;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OrderController
 * @package App\Http\Controllers\API
 */
class OrderAPIController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/orders",
     *      summary="Get a listing of the Orders.",
     *      tags={"Order"},
     *      description="Get all Orders",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Order")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $orders = $this->orderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $orders->toArray(),
            __('messages.retrieved', ['model' => __('models/orders.plural')])
        );
    }

    public function bakery_orders($bakeryId)
    {
        $order = Order::where('bakery_id', $bakeryId)->where('status', 4)->paginate(12);
        if ($order) {
            return $order;
        } else {
            return response()->json(['message' => 'no Order', 'status' => false]);
        }
    }

    /**
     * @param $searchText
     * @param $bakeryId
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search_order($searchText, $bakeryId)
    {
//
        $order = Order::where('bakery_id', $bakeryId)
            ->orWhere('id', 'like', '%' . $searchText . '%')
            ->orWhere('request_on', 'like', '%' . $searchText . '%')
            ->orWhere('arrival_on', 'like', '%' . $searchText . '%')
            ->where('bakery_id', '=', $bakeryId)->get();
        if ($order) {
            return $order;
        } else {
            return response()->json(['message' => 'no Order', 'status' => false]);
        }
    }

    public function last_order($bakeryId)
    {
//        $order = Order::where('bakery_id', $bakeryId)->latest()->with(['driver', 'agent'])->first();
        $order = Order::where('bakery_id', $bakeryId)
            ->where('status', 3)
            ->with(['driver', 'agent'])->first();
        if ($order->count()) {
            return response()->json(['data' => $order, 'status' => true]);
        } else {
            return response()->json(['message' => 'no Order', 'status' => false]);
        }
    }

    /**
     * @param CreateOrderAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/orders",
     *      summary="Store a newly created Order in storage",
     *      tags={"Order"},
     *      description="Store Order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Order that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Order")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Order"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOrderAPIRequest $request)
    {
        $input = $request->all();

        $input['request_on'] = Carbon::now()->timestamp;
        $order = $this->orderRepository->create($input);

        return $this->sendResponse(
            $order->toArray(),
            __('messages.saved', ['model' => __('models/orders.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/orders/{id}",
     *      summary="Display the specified Order",
     *      tags={"Order"},
     *      description="Get Order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Order",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Order"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Order $order */
//        $order = $this->orderRepository->find($id);
        $order = Order::with(['bakery.user', 'driver'])->find($id);
        if (empty($order)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/orders.singular')])
            );
        }

        return $this->sendResponse(
            $order->toArray(),
            __('messages.retrieved', ['model' => __('models/orders.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateOrderAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/orders/{id}",
     *      summary="Update the specified Order in storage",
     *      tags={"Order"},
     *      description="Update Order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Order",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Order that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Order")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Order"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/orders.singular')])
            );
        }

        $order = $this->orderRepository->update($input, $id);

        return $this->sendResponse(
            $order->toArray(),
            __('messages.updated', ['model' => __('models/orders.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/orders/{id}",
     *      summary="Remove the specified Order from storage",
     *      tags={"Order"},
     *      description="Delete Order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Order",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Order $order */
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/orders.singular')])
            );
        }

        $order->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/orders.singular')])
        );
    }
}
