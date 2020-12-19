<?php

namespace App\Http\Controllers;

use App\DataTables\DriverDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Repositories\DriverRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DriverController extends AppBaseController
{
    /** @var  DriverRepository */
    private $driverRepository;

    public function __construct(DriverRepository $driverRepo)
    {
        $this->driverRepository = $driverRepo;
    }

    /**
     * Display a listing of the Driver.
     *
     * @param DriverDataTable $driverDataTable
     * @return Response
     */
    public function index(DriverDataTable $driverDataTable)
    {
        return $driverDataTable->render('drivers.index');
    }

    /**
     * Show the form for creating a new Driver.
     *
     * @return Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created Driver in storage.
     *
     * @param CreateDriverRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverRequest $request)
    {
        $input = $request->all();

        $driver = $this->driverRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/drivers.singular')]));

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified Driver.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error(__('models/drivers.singular').' '.__('messages.not_found'));

            return redirect(route('drivers.index'));
        }

        return view('drivers.show')->with('driver', $driver);
    }

    /**
     * Show the form for editing the specified Driver.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error(__('messages.not_found', ['model' => __('models/drivers.singular')]));

            return redirect(route('drivers.index'));
        }

        return view('drivers.edit')->with('driver', $driver);
    }

    /**
     * Update the specified Driver in storage.
     *
     * @param  int              $id
     * @param UpdateDriverRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverRequest $request)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error(__('messages.not_found', ['model' => __('models/drivers.singular')]));

            return redirect(route('drivers.index'));
        }

        $driver = $this->driverRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/drivers.singular')]));

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified Driver from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error(__('messages.not_found', ['model' => __('models/drivers.singular')]));

            return redirect(route('drivers.index'));
        }

        $this->driverRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/drivers.singular')]));

        return redirect(route('drivers.index'));
    }
}
