<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\ProviderRepository;
use SisConPat\Repositories\CityRepository;
use SisConPat\Repositories\PatrimonialRepository;
use SisConPat\Repositories\PatrimonialMaterialRepository;
use SisConPat\Repositories\PatrimonialServiceRepository;

class ProvidersController extends Controller
{
    private $providerRepository;
    private $cityRepository;
    private $patrimonialRepository;
    private $patrimonial_materialRepository;
    private $patrimonial_serviceRepository;

    public function __construct(ProviderRepository $providerRepository, CityRepository $cityRepository, PatrimonialRepository $patrimonialRepository, PatrimonialMaterialRepository $patrimonial_materialRepository, PatrimonialServiceRepository $patrimonial_serviceRepository)
    {
        $this->providerRepository = $providerRepository;
        $this->cityRepository = $cityRepository;
        $this->patrimonialRepository = $patrimonialRepository;
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
        $this->patrimonial_serviceRepository = $patrimonial_serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $providers = $this->providerRepository->allProviders();
        #dd($providers);
        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(CityRepository $cityRepository)
    {
        $cities = array(''=>'') + $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();
        
        return view('providers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ProviderRequest $request)
    {
        $input = $request->all();

        $input['description'] = strtoupper($input['description']);
        $input['description_short'] = strtoupper($input['description_short']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $provider = $this->providerRepository->storeProvider($input);

        return redirect('providers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $provider = $this->providerRepository->findProviderById($id);
        $logs = $provider->revisionHistory;

        return view('providers.show', compact('provider', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, CityRepository $cityRepository)
    {
        $cities = $cityRepository
            ->allCities()
            ->lists('description', 'id')
            ->all();

        $provider = $this->providerRepository->findProviderById($id);
        
        return view('providers.edit', compact('provider', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ProviderRequest $request, $id)
    {
        $input = $request->all();

        $input['description'] = strtoupper($input['description']);
        $input['description_short'] = strtoupper($input['description_short']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $provider = $this->providerRepository->findProviderById($id);
        $provider->update($input);

        return redirect('providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonialRepository->allPatrimonialsByProviderId($id)->count()>0)
        {
           return redirect('providers')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Bem(ns) Patrimonil(ais) vinculado(s) ao registro selecionado !']); 
        }

        if($this->patrimonial_materialRepository->allPatrimonialMaterialsByProviderId($id)->count()>0)
        {
           return redirect('providers')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Material(ais) vinculado(s) ao registro selecionado !']); 
        }

        if($this->patrimonial_serviceRepository->allPatrimonialServicesByProviderId($id)->count()>0)
        {
           return redirect('providers')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Serviço(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->providerRepository->findProviderById($id)->delete();

        return redirect('providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->providerRepository->withTrashed()->findProviderById($id)->restore();

        return redirect('providers');
    }
}
