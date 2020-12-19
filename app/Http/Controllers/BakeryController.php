<?php

namespace App\Http\Controllers;

use App\DataTables\BakeryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBakeryRequest;
use App\Http\Requests\UpdateBakeryRequest;
use App\Repositories\BakeryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BakeryController extends AppBaseController
{
    /** @var  BakeryRepository */
    private $bakeryRepository;

    public function __construct(BakeryRepository $bakeryRepo)
    {
        $this->bakeryRepository = $bakeryRepo;
    }

    /**
     * Display a listing of the Bakery.
     *
     * @param BakeryDataTable $bakeryDataTable
     * @return Response
     */
    public function index(BakeryDataTable $bakeryDataTable)
    {
        return $bakeryDataTable->render('bakeries.index');
    }

    /**
     * Show the form for creating a new Bakery.
     *
     * @return Response
     */
    public function create()
    {
        return view('bakeries.create');
    }

    /**
     * Store a newly created Bakery in storage.
     *
     * @param CreateBakeryRequest $request
     *
     * @return Response
     */
    public function store(CreateBakeryRequest $request)
    {
        $input = $request->all();

        $bakery = $this->bakeryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/bakeries.singular')]));

        return redirect(route('bakeries.index'));
    }

    /**
     * Display the specified Bakery.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            Flash::error(__('models/bakeries.singular').' '.__('messages.not_found'));

            return redirect(route('bakeries.index'));
        }

        return view('bakeries.show')->with('bakery', $bakery);
    }

    /**
     * Show the form for editing the specified Bakery.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bakeries.singular')]));

            return redirect(route('bakeries.index'));
        }

        return view('bakeries.edit')->with('bakery', $bakery);
    }

    /**
     * Update the specified Bakery in storage.
     *
     * @param  int              $id
     * @param UpdateBakeryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBakeryRequest $request)
    {
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bakeries.singular')]));

            return redirect(route('bakeries.index'));
        }

        $bakery = $this->bakeryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bakeries.singular')]));

        return redirect(route('bakeries.index'));
    }

    /**
     * Remove the specified Bakery from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bakery = $this->bakeryRepository->find($id);

        if (empty($bakery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bakeries.singular')]));

            return redirect(route('bakeries.index'));
        }

        $this->bakeryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/bakeries.singular')]));

        return redirect(route('bakeries.index'));
    }
}
