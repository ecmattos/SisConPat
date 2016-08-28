<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\StateRepository;
use SisConPat\Repositories\CityRepository;

class StatesController extends Controller
{
    private $stateRepository;

    public function __construct(StateRepository $stateRepository, CityRepository $cityRepository)
    {
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $states = $this->stateRepository->allStates();
        #dd($states);
        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\StateRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $state = $this->stateRepository->storeState($input);

        return redirect('states');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $state = $this->stateRepository->findStateById($id);
        $logs = $state->revisionHistory;

        return view('states.show', compact('state', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $state = $this->stateRepository->findStateById($id);
        
        return view('states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\StateRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $state = $this->stateRepository->findStateById($id);
        $state->update($input);

        return redirect('states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->cityRepository->findCitiesByStateId($id)->count()>0)
        {
           return redirect('states')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Cidade(s) vinculada(s) ao registro selecionado !']); 
        }

        $this->stateRepository->findStateById($id)->delete();

        return redirect('states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->stateRepository->withTrashed()->findStateById($id)->restore();

        return redirect('states');
    }
}
