<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDriverAPIRequest;
use App\Http\Requests\API\UpdateDriverAPIRequest;
use App\Models\Driver;
use App\Repositories\DriverRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DriverController
 * @package App\Http\Controllers\API
 */

class DriverAPIController extends AppBaseController
{
    /** @var  DriverRepository */
    private $driverRepository;

    public function __construct(DriverRepository $driverRepo)
    {
        $this->driverRepository = $driverRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/drivers",
     *      summary="Get a listing of the Drivers.",
     *      tags={"Driver"},
     *      description="Get all Drivers",
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
     *                  @SWG\Items(ref="#/definitions/Driver")
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
        $drivers = $this->driverRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $drivers->toArray(),
            __('messages.retrieved', ['model' => __('models/drivers.plural')])
        );
    }

    /**
     * @param CreateDriverAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/drivers",
     *      summary="Store a newly created Driver in storage",
     *      tags={"Driver"},
     *      description="Store Driver",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Driver that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Driver")
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
     *                  ref="#/definitions/Driver"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDriverAPIRequest $request)
    {
        $input = $request->all();

        $driver = $this->driverRepository->create($input);

        return $this->sendResponse(
            $driver->toArray(),
            __('messages.saved', ['model' => __('models/drivers.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/drivers/{id}",
     *      summary="Display the specified Driver",
     *      tags={"Driver"},
     *      description="Get Driver",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Driver",
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
     *                  ref="#/definitions/Driver"
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
        /** @var Driver $driver */
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/drivers.singular')])
            );
        }

        return $this->sendResponse(
            $driver->toArray(),
            __('messages.retrieved', ['model' => __('models/drivers.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateDriverAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/drivers/{id}",
     *      summary="Update the specified Driver in storage",
     *      tags={"Driver"},
     *      description="Update Driver",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Driver",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Driver that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Driver")
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
     *                  ref="#/definitions/Driver"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDriverAPIRequest $request)
    {
        $input = $request->all();

        /** @var Driver $driver */
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/drivers.singular')])
            );
        }

        $driver = $this->driverRepository->update($input, $id);

        return $this->sendResponse(
            $driver->toArray(),
            __('messages.updated', ['model' => __('models/drivers.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/drivers/{id}",
     *      summary="Remove the specified Driver from storage",
     *      tags={"Driver"},
     *      description="Delete Driver",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Driver",
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
        /** @var Driver $driver */
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/drivers.singular')])
            );
        }

        $driver->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/drivers.singular')])
        );
    }
}
