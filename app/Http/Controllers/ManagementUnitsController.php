<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\ManagementUnitRepository;
use SisConPat\Repositories\RegionRepository;
use SisConPat\Repositories\CityRepository;
use SisConPat\Repositories\PatrimonialRepository;
use SisConPat\Repositories\PatrimonialMovementRepository;

class ManagementUnitsController extends Controller
{
    private $management_unitRepository;
    private $regionRepository;
    private $cityRepository;
    private $patrimonialRepository;
    private $patrimonial_movementRepository;

    public function __construct(ManagementUnitRepository $management_unitRepository, RegionRepository $regionRepository, CityRepository $cityRepository, PatrimonialRepository $patrimonialRepository, PatrimonialMovementRepository $patrimonial_movementRepository)
    {
        $this->management_unitRepository = $management_unitRepository;
        $this->regionRepository = $regionRepository;
        $this->cityRepository = $cityRepository;
        $this->patrimonialRepository = $patrimonialRepository;
        $this->patrimonial_movementRepository = $patrimonial_movementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $management_units = $this->management_unitRepository->allManagementUnits();
        #dd($management_units);
        return view('management_units.index', compact('management_units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(RegionRepository $regionRepository, CityRepository $cityRepository)
    {
        $regions = array(''=>'') + $regionRepository
            ->allRegions()
            ->lists('description', 'id')
            ->all();

        $cities = array(''=>'') + $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();

        return view('management_units.create', compact('regions', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ManagementUnitRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $management_unit = $this->management_unitRepository->storeManagementUnit($input);

        return redirect('management_units');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $management_unit = $this->management_unitRepository->findManagementUnitById($id);
        
        $logs = $management_unit->revisionHistory;

        $patrimonials = $this->management_unitRepository->allPatrimonialsByManagementUnitId($id);

        return view('management_units.show', compact('management_unit', 'patrimonials', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, RegionRepository $regionRepository, CityRepository $cityRepository)
    {
        $regions = array(''=>'') + $regionRepository
            ->allRegions()
            ->lists('description', 'id')
            ->all();

        $cities = array(''=>'') + $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();

        $management_unit = $this->management_unitRepository->findManagementUnitById($id);
        
        return view('management_units.edit', compact('management_unit', 'regions', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ManagementUnitRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $management_unit = $this->management_unitRepository->findManagementUnitById($id);
        $management_unit->update($input);

        return redirect('management_units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonial_movementRepository->allPatrimonialMovementsByManagementId($id)->count()>0)
        {
           return redirect('management_units')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) histórico(s) de movimentação(ções) de bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->management_unitRepository->findManagementUnitById($id)->delete();

        return redirect('management_units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->management_unitRepository->withTrashed()->findManagementUnitById($id)->restore();

        return redirect('management_units');
    }

    public function search_results_back()
    { 
        return redirect('management_units');
    }
}
