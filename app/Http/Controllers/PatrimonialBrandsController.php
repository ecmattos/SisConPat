<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\PatrimonialBrandRepository;
use SisConPat\Repositories\PatrimonialRepository;

class PatrimonialBrandsController extends Controller
{
    private $patrimonial_brandRepository;
    private $patrimonialRepository;

    public function __construct(PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialRepository $patrimonialRepository)
    {
        $this->patrimonial_brandRepository = $patrimonial_brandRepository;
        $this->patrimonialRepository = $patrimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonial_brands = $this->patrimonial_brandRepository->allPatrimonialBrands();
        #dd($patrimonial_brands);
        return view('patrimonial_brands.index', compact('patrimonial_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patrimonial_brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialBrandRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_brand = $this->patrimonial_brandRepository->storePatrimonialBrand($input);

        return redirect('patrimonial_brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        $logs = $patrimonial_brand->revisionHistory;

        return view('patrimonial_brands.show', compact('patrimonial_brand', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        
        return view('patrimonial_brands.edit', compact('patrimonial_brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialBrandRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        $patrimonial_brand->update($input);

        return redirect('patrimonial_brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonialRepository->allPatrimonialsByPatrimonialBrandId($id)->count()>0)
        {
           return redirect('patrimonial_brands')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) bem(ns) patrimonial(ais) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_brandRepository->findPatrimonialBrandById($id)->delete();

        return redirect('patrimonial_brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_brandRepository->withTrashed()->findPatrimonialBrandById($id)->restore();

        return redirect('patrimonial_brands');
    }
}
