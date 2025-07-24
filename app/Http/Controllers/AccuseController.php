<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccuseRequest;
use App\Http\Requests\UpdateAccuseRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AccuseRepository;
use Illuminate\Http\Request;
use Flash;

class AccuseController extends AppBaseController
{
    /** @var AccuseRepository $accuseRepository*/
    private $accuseRepository;

    public function __construct(AccuseRepository $accuseRepo)
    {
        $this->accuseRepository = $accuseRepo;
    }

    /**
     * Display a listing of the Accuse.
     */
    public function index(Request $request)
    {
        $accuses = $this->accuseRepository->paginate(10);

        return view('accuses.index')
            ->with('accuses', $accuses);
    }

    /**
     * Show the form for creating a new Accuse.
     */
    public function create()
    {
        return view('accuses.create');
    }

    /**
     * Store a newly created Accuse in storage.
     */
    public function store(CreateAccuseRequest $request)
    {
        $input = $request->all();

        $accuse = $this->accuseRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accuses.singular')]));

        return redirect(route('accuses.index'));
    }

    /**
     * Display the specified Accuse.
     */
    public function show($id)
    {
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            Flash::error(__('models/accuses.singular').' '.__('messages.not_found'));

            return redirect(route('accuses.index'));
        }

        return view('accuses.show')->with('accuse', $accuse);
    }

    /**
     * Show the form for editing the specified Accuse.
     */
    public function edit($id)
    {
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            Flash::error(__('models/accuses.singular').' '.__('messages.not_found'));

            return redirect(route('accuses.index'));
        }

        return view('accuses.edit')->with('accuse', $accuse);
    }

    /**
     * Update the specified Accuse in storage.
     */
    public function update($id, UpdateAccuseRequest $request)
    {
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            Flash::error(__('models/accuses.singular').' '.__('messages.not_found'));

            return redirect(route('accuses.index'));
        }

        $accuse = $this->accuseRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accuses.singular')]));

        return redirect(route('accuses.index'));
    }

    /**
     * Remove the specified Accuse from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $accuse = $this->accuseRepository->find($id);

        if (empty($accuse)) {
            Flash::error(__('models/accuses.singular').' '.__('messages.not_found'));

            return redirect(route('accuses.index'));
        }

        $this->accuseRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accuses.singular')]));

        return redirect(route('accuses.index'));
    }
}
