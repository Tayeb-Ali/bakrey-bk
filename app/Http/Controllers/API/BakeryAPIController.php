<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBakeryAPIRequest;
use App\Http\Requests\API\UpdateBakeryAPIRequest;
use App\Models\Bakery;
use App\Repositories\BakeryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BakeryController
 * @package App\Http\Controllers\API
 */
class BakeryAPIController extends AppBaseController
{
    /** @var  BakeryRepository */
    private $bakeryRepository;

    public function __construct(BakeryRepository $bakeryRepo)
    {
        $this->bakeryRepository = $bakeryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/bakeries",
     *      summary="Get a listing of the Bakeries.",
     *      tags={"Bakery"},
     *      description="Get all Bakeries",
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
     *                  @SWG\Items(ref="#/definitions/Bakery")
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
        return $bakeries = Bakery::with('order')->paginate(10);
    }

    /**
     * @param CreateBakeryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/bakeries",
     *      summary="Store a newly created Bakery in storage",
     *      tags={"Bakery"},
     *      description="Store Bakery",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Bakery that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Bakery")
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
     *                  ref="#/definitions/Bakery"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBakeryAPIRequest $request)
    {
        $input = $request->all();

        $bakery = $this->bakeryRepository->create($input);

        return $this->sendResponse(
            $bakery->toArray(),
            __('messages.saved', ['model' => __('models/bakeries.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/bakeries/{id}",
     *      summary="Display the specified Bakery",
     *      tags={"Bakery"},
     *      description="Get Bakery",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Bakery",
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
     *                  ref="#/definitions/Bakery"
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
        /** @var Bakery $bakery */
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bakeries.singular')])
            );
        }

        return $this->sendResponse(
            $bakery->toArray(),
            __('messages.retrieved', ['model' => __('models/bakeries.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateBakeryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/bakeries/{id}",
     *      summary="Update the specified Bakery in storage",
     *      tags={"Bakery"},
     *      description="Update Bakery",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Bakery",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Bakery that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Bakery")
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
     *                  ref="#/definitions/Bakery"
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

        /** @var Bakery $bakery */
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bakeries.singular')])
            );
        }

        $bakery = $this->bakeryRepository->update($input, $id);

        return $this->sendResponse(
            $bakery->toArray(),
            __('messages.updated', ['model' => __('models/bakeries.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/bakeries/{id}",
     *      summary="Remove the specified Bakery from storage",
     *      tags={"Bakery"},
     *      description="Delete Bakery",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Bakery",
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
        /** @var Bakery $bakery */
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bakeries.singular')])
            );
        }

        $bakery->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/bakeries.singular')])
        );
    }
}
