<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\PatrimonialSectorRepository;
use SisConPat\Repositories\PatrimonialRepository;

class PatrimonialSectorsController extends Controller
{
    private $patrimonial_sectorRepository;
    private $patrimonialRepository;

    public function __construct(PatrimonialSectorRepository $patrimonial_sectorRepository, PatrimonialRepository $patrimonialRepository)
    {
        $this->patrimonial_sectorRepository = $patrimonial_sectorRepository;
        $this->patrimonialRepository = $patrimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonial_sectors = $this->patrimonial_sectorRepository->allPatrimonialSectors();
        #dd($patrimonial_sectors);
        return view('patrimonial_sectors.index', compact('patrimonial_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patrimonial_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialSectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sector = $this->patrimonial_sectorRepository->storePatrimonialSector($input);

        return redirect('patrimonial_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patrimonial_sector = $this->patrimonial_sectorRepository->findPatrimonialSectorById($id);
        $logs = $patrimonial_sector->revisionHistory;

        return view('patrimonial_sectors.show', compact('patrimonial_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $patrimonial_sector = $this->patrimonial_sectorRepository->findPatrimonialSectorById($id);
        
        return view('patrimonial_sectors.edit', compact('patrimonial_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialSectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sector = $this->patrimonial_sectorRepository->findPatrimonialSectorById($id);
        $patrimonial_sector->update($input);

        return redirect('patrimonial_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonialRepository->allPatrimonialsByPatrimonialSectorId($id)->count()>0)
        {
           return redirect('patrimonial_sectors')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_sectorRepository->findPatrimonialSectorById($id)->delete();

        return redirect('patrimonial_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_sectorRepository->withTrashed()->findPatrimonialSectorById($id)->restore();

        return redirect('patrimonial_sectors');
    }
}
