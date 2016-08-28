<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\MaterialRepository;
use SisConPat\Repositories\MaterialUnitRepository;
use SisConPat\Repositories\PatrimonialMaterialRepository;

class MaterialsController extends Controller
{
    private $materialRepository;
    private $material_unitRepository;
    private $patrimonial_materialRepository;

    public function __construct(MaterialRepository $materialRepository, MaterialUnitRepository $material_unitRepository, PatrimonialMaterialRepository $patrimonial_materialRepository)
    {
        $this->materialRepository = $materialRepository;
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $materials = $this->materialRepository->allMaterials();
        #dd($materials);
        return view('materials.index', compact('materials'));
    }

    public function search_results_back()
    { 
        return redirect('materials');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(MaterialUnitRepository $material_unitRepository)
    {
        $material_units = array(''=>'') + $material_unitRepository
            ->allMaterialUnits()
            ->lists('description', 'id')
            ->all();

        return view('materials.create', compact('material_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MaterialRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $material = $this->materialRepository->storeMaterial($input);

        return redirect('materials');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $material = $this->materialRepository->findMaterialById($id);
        $logs = $material->revisionHistory;

        $material_patrimonials = $this->patrimonial_materialRepository->allPatrimonialMaterialsByMaterialId($id);

        return view('materials.show', compact('material', 'material_patrimonials', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, MaterialUnitRepository $material_unitRepository)
    {
       $material_units = array(''=>'') + $material_unitRepository
            ->allMaterialUnits()
            ->lists('description', 'id')
            ->all();

        $material = $this->materialRepository->findMaterialById($id);
        
        return view('materials.edit', compact('material', 'material_units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MaterialRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $material = $this->materialRepository->findMaterialById($id);
        $material->update($input);

        return redirect('materials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonial_materialRepository->allPatrimonialMaterialsByMaterialId($id)->count()>0)
        {
           return redirect('materials')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->materialRepository->findMaterialById($id)->delete();

        return redirect('materials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->materialRepository->withTrashed()->findMaterialById($id)->restore();

        return redirect('materials');
    }
}
