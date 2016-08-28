<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\PatrimonialModelRepository;
use SisConPat\Repositories\PatrimonialRepository;

class PatrimonialModelsController extends Controller
{
    private $patrimonial_modelRepository;
    private $patrimonialRepository;

    public function __construct(PatrimonialModelRepository $patrimonial_modelRepository, PatrimonialRepository $patrimonialRepository)
    {
        $this->patrimonial_modelRepository = $patrimonial_modelRepository;
        $this->patrimonialRepository = $patrimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonial_models = $this->patrimonial_modelRepository->allPatrimonialModels();
        #dd($patrimonial_models);
        return view('patrimonial_models.index', compact('patrimonial_models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patrimonial_models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialModelRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_model = $this->patrimonial_modelRepository->storePatrimonialModel($input);

        return redirect('patrimonial_models');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $logs = $patrimonial_model->revisionHistory;

        return view('patrimonial_models.show', compact('patrimonial_model', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        
        return view('patrimonial_models.edit', compact('patrimonial_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialModelRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $patrimonial_model->update($input);

        return redirect('patrimonial_models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonialRepository->allPatrimonialsByPatrimonialModelId($id)->count()>0)
        {
           return redirect('patrimonial_models')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_modelRepository->findPatrimonialModelById($id)->delete();

        return redirect('patrimonial_models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_modelRepository->withTrashed()->findPatrimonialModelById($id)->restore();

        return redirect('patrimonial_models');
    }
}
