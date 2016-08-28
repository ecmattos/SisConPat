<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\PatrimonialSubSectorRepository;
use SisConPat\Repositories\PatrimonialRepository;

class PatrimonialSubSectorsController extends Controller
{
    private $patrimonial_sub_sectorRepository;
    private $patrimonialRepository;

    public function __construct(PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository, PatrimonialRepository $patrimonialRepository)
    {
        $this->patrimonial_sub_sectorRepository = $patrimonial_sub_sectorRepository;
        $this->patrimonialRepository = $patrimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonial_sub_sectors = $this->patrimonial_sub_sectorRepository->allPatrimonialSubSectors();
        #dd($patrimonial_sub_sectors);
        return view('patrimonial_sub_sectors.index', compact('patrimonial_sub_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patrimonial_sub_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialSubSectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->storePatrimonialSubSector($input);

        return redirect('patrimonial_sub_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id);
        $logs = $patrimonial_sub_sector->revisionHistory;

        return view('patrimonial_sub_sectors.show', compact('patrimonial_sub_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id);
        
        return view('patrimonial_sub_sectors.edit', compact('patrimonial_sub_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialSubSectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id);
        $patrimonial_sub_sector->update($input);

        return redirect('patrimonial_sub_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonialRepository->allPatrimonialsByPatrimonialSubSectorId($id)->count()>0)
        {
           return redirect('patrimonial_sub_sectors')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id)->delete();

        return redirect('patrimonial_sub_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_sub_sectorRepository->withTrashed()->findPatrimonialSubSectorById($id)->restore();

        return redirect('patrimonial_sub_sectors');
    }
}
