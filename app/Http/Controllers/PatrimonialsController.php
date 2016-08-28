<?php

namespace SisConPat\Http\Controllers;

use Illuminate\Http\Request;

use JasperPHP\JasperPHP as JasperPHP;

use SisConPat\Http\Requests;
use SisConPat\Http\Controllers\Controller;
use SisConPat\Repositories\AccountingAccountRepository;
use SisConPat\Repositories\PatrimonialRepository;
use SisConPat\Repositories\PatrimonialTypeRepository;
use SisConPat\Repositories\PatrimonialSubTypeRepository;
use SisConPat\Repositories\PatrimonialBrandRepository;
use SisConPat\Repositories\PatrimonialModelRepository;
use SisConPat\Repositories\ProviderRepository;
use SisConPat\Repositories\ManagementUnitRepository;
use SisConPat\Repositories\PatrimonialSectorRepository;
use SisConPat\Repositories\PatrimonialSubSectorRepository;
use SisConPat\Repositories\PatrimonialStatusRepository;
use SisConPat\Repositories\PatrimonialMovementRepository;
use SisConPat\Repositories\PatrimonialImageRepository;
use SisConPat\Repositories\MaterialRepository;
use SisConPat\Repositories\PatrimonialMaterialRepository;
use SisConPat\Repositories\ServiceRepository;
use SisConPat\Repositories\PatrimonialServiceRepository;
use SisConPat\Repositories\PatrimonialInterventionTypeRepository;

use Session;
#use Carbon\Carbon;

class PatrimonialsController extends Controller
{
    private $patrimonialRepository;
    private $accounting_accountRepository;
    private $patrimonial_typeRepository;
    private $patrimonial_sub_typeRepository;
    private $patrimonial_brandRepository;
    private $patrimonial_modelRepository;
    private $providerRepository;
    private $management_unitRepository;
    private $patrimonial_sectorRepository;
    private $patrimonial_sub_sectorRepository;
    private $patrimonial_statusRepository;
    private $patrimonial_movementRepository;
    private $patrimonial_imageRepository;
    private $materialRepository;
    private $patrimonial_materialRepository;
    private $serviceRepository;
    private $patrimonial_serviceRepository;
    private $patrimonial_intervention_typeRepository;

    public function __construct(PatrimonialRepository $patrimonialRepository, AccountingAccountRepository $accounting_accountRepository, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ProviderRepository $providerRepository, ManagementUnitRepository $management_unitRepository, PatrimonialSectorRepository $patrimonial_sectorRepository, PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository, PatrimonialStatusRepository $patrimonial_statusRepository, PatrimonialMovementRepository $patrimonial_movementRepository, PatrimonialImageRepository $patrimonial_imageRepository, MaterialRepository $materialRepository, PatrimonialMaterialRepository $patrimonial_materialRepository, ServiceRepository $serviceRepository, PatrimonialServiceRepository $patrimonial_serviceRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $this->patrimonialRepository = $patrimonialRepository;
        $this->accounting_accountRepository = $accounting_accountRepository;
        $this->patrimonial_typeRepository = $patrimonial_typeRepository;
        $this->patrimonial_sub_typeRepository = $patrimonial_sub_typeRepository;
        $this->patrimonial_brandRepository = $patrimonial_brandRepository;
        $this->patrimonial_modelRepository = $patrimonial_modelRepository;
        $this->providerRepository = $providerRepository;
        $this->management_unitRepository = $management_unitRepository;
        $this->patrimonial_sectorRepository = $patrimonial_sectorRepository;
        $this->patrimonial_sub_sectorRepository = $patrimonial_sub_sectorRepository;
        $this->patrimonial_statusRepository = $patrimonial_statusRepository;
        $this->patrimonial_movementRepository = $patrimonial_movementRepository;
        $this->patrimonial_imageRepository = $patrimonial_imageRepository;
        $this->materialRepository = $materialRepository;
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
        $this->serviceRepository = $serviceRepository;
        $this->patrimonial_serviceRepository = $patrimonial_serviceRepository;
        $this->patrimonial_intervention_typeRepository = $patrimonial_intervention_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonials = $this->patrimonialRepository->allPatrimonials();
        #dd($patrimonials);
        return view('patrimonials.index', compact('patrimonials'));
    }

    public function search(AccountingAccountRepository $accounting_accountRepository, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ProviderRepository $providerRepository, ManagementUnitRepository $management_unitRepository, PatrimonialSectorRepository $patrimonial_sectorRepository, PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository, PatrimonialStatusRepository $patrimonial_statusRepository)
    { 
        session()->forget('srch_asset_accounting_account_id');
        session()->forget('srch_patrimonial_code');
        session()->forget('srch_patrimonial_description');
        session()->forget('srch_patrimonial_serial');
        session()->forget('srch_patrimonial_type_id');
        session()->forget('srch_patrimonial_sub_type_id');
        session()->forget('srch_patrimonial_brand_id');
        session()->forget('srch_patrimonial_model_id');
        session()->forget('srch_patrimonial_provider_id');
        session()->forget('srch_patrimonial_management_unit_id');
        session()->forget('srch_patrimonial_sector_id');
        session()->forget('srch_patrimonial_sub_sector_id');
        session()->forget('srch_patrimonial_status_id');
        session()->forget('srch_patrimonial_invoice_date_start');
        session()->forget('srch_patrimonial_invoice_date_end');
        session()->forget('srch_patrimonial_status_date_start');
        session()->forget('srch_patrimonial_status_date_end');

        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_types = array(''=>'') + $patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $patrimonial_modelRepository
            ->allPatrimonialModels()
            ->lists('description', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_sectors = array(''=>'') + $patrimonial_sectorRepository
            ->allPatrimonialSectors()
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_sub_sectors = array(''=>'') + $patrimonial_sub_sectorRepository
            ->allPatrimonialSubSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->lists('description', 'id')
            ->all();

        return view('patrimonials.search', compact('accounting_accounts', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'management_units', 'patrimonial_sectors', 'patrimonial_sub_sectors', 'patrimonial_statuses'));
    }

    public function search_results(Requests\PatrimonialSearchRequest $request)
    { 
        $input = $request->all();

        $request->flash();

        session(['srch_asset_accounting_account_id'         => $input['srch_asset_accounting_account_id']]);
        session(['srch_patrimonial_description'             => $input['srch_patrimonial_description']]);
        session(['srch_patrimonial_code'                    => $input['srch_patrimonial_code']]);
        session(['srch_patrimonial_serial'                  => $input['srch_patrimonial_serial']]);
        session(['srch_patrimonial_type_id'                 => $input['srch_patrimonial_type_id']]);
        session(['srch_patrimonial_sub_type_id'             => $input['srch_patrimonial_sub_type_id']]);
        session(['srch_patrimonial_brand_id'                => $input['srch_patrimonial_brand_id']]);
        session(['srch_patrimonial_model_id'                => $input['srch_patrimonial_model_id']]);
        session(['srch_patrimonial_provider_id'             => $input['srch_patrimonial_provider_id']]);
        session(['srch_patrimonial_management_unit_id'      => $input['srch_patrimonial_management_unit_id']]);
        session(['srch_patrimonial_sector_id'               => $input['srch_patrimonial_sector_id']]);
        session(['srch_patrimonial_sub_sector_id'           => $input['srch_patrimonial_sub_sector_id']]);
        session(['srch_patrimonial_invoice_date_start'      => $input['srch_patrimonial_invoice_date_start']]);
        session(['srch_patrimonial_invoice_date_end'        => $input['srch_patrimonial_invoice_date_end']]);
        session(['srch_patrimonial_status_id'               => $input['srch_patrimonial_status_id']]);
        session(['srch_patrimonial_status_date_start'       => $input['srch_patrimonial_status_date_start']]);
        session(['srch_patrimonial_status_date_end'         => $input['srch_patrimonial_status_date_end']]);

        session(['srch_depreciation_date_BR'                => $input['srch_depreciation_date']]);
        $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');

        session(['srch_depreciation_date_EN'                => \DateTime::createFromFormat('d/m/Y', $srch_depreciation_date_BR)->format('Y-m-d')]);
        $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');

        $patrimonials = $this->patrimonialRepository->searchPatrimonials();

        return view('patrimonials.search_results', compact('patrimonials', 'srch_depreciation_date_BR', 'srch_depreciation_date_EN'));
    }

    public function search_results_back()
    { 
        $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');
        $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');

        $patrimonials = $this->patrimonialRepository->searchPatrimonials();

        return view('patrimonials.search_results', compact('patrimonials', 'srch_depreciation_date_BR', 'srch_depreciation_date_EN'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(AccountingAccountRepository $accounting_accountRepository, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ProviderRepository $providerRepository, ManagementUnitRepository $management_unitRepository, PatrimonialSectorRepository $patrimonial_sectorRepository, PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository, PatrimonialStatusRepository $patrimonial_statusRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_types = array(''=>'') + $patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $patrimonial_modelRepository
            ->allPatrimonialModels()
            ->lists('description', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_sectors = array(''=>'') + $patrimonial_sectorRepository
            ->allPatrimonialSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_sectors = array(''=>'') + $patrimonial_sub_sectorRepository
            ->allPatrimonialSubSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $patrimonial_statusRepository
            ->allPatrimonialNewStatuses()
            ->lists('description', 'id')
            ->all();
        
        return view('patrimonials.create', compact('accounting_accounts', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'management_units', 'patrimonial_sectors', 'patrimonial_sub_sectors', 'patrimonial_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($input['patrimonial_sub_type_id']);
        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($input['patrimonial_brand_id']);
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($input['patrimonial_model_id']);

        $input['serial'] = strtoupper($input['serial']);

        $input['description'] = strtoupper($input['description']);

        #$input['description'] = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$input['serial'];

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_value'] = $numberFormatter_ptBR2en->parse($input['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['residual_value'] = $numberFormatter_ptBR2en->parse($input['residual_value']);
        #dd($input['purchase_value']);

        $input['invoice'] = strtoupper($input['invoice']);

        $input['depreciation_date_start'] = \DateTime::createFromFormat('d/m/Y', $input['depreciation_date_start']);
        $input['depreciation_date_start'] = $input['depreciation_date_start']->format('Y-m-d');

        $input['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $input['invoice_date']);
        $input['invoice_date'] = $input['invoice_date']->format('Y-m-d');

        $input['purchase_process'] = strtoupper($input['purchase_process']);

        $input['patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $input['patrimonial_status_date']);
        $input['patrimonial_status_date'] = $input['patrimonial_status_date']->format('Y-m-d');

        $input['comments'] = strtoupper($input['comments']);

        $patrimonial = $this->patrimonialRepository->storePatrimonial($input);

        $last_patrimonial = $this->patrimonialRepository->allPatrimonialsById()->last();
        $input['patrimonial_id'] = $last_patrimonial->id;
        $patrimonial_movement = $this->patrimonial_movementRepository->storePatrimonialMovement($input);      
    
        return redirect()->route('patrimonials.show', ['id' => $last_patrimonial->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');
        $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');

        $today = $srch_depreciation_date_EN;

        # Lista todas as movimentacoes
        $patrimonial_movements = $this->patrimonial_movementRepository->allPatrimonialMovementsByPatrimonialId($id);
        $patrimonial_movement_date_last = $this->patrimonial_movementRepository->lastPatrimonialMovementDateByPatrimonialId($id);
        
        # Lista todos os materiais associados
        $patrimonial_materials = $this->patrimonial_materialRepository->allPatrimonialMaterialsByPatrimonialId($id);
        
        $total_materials = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialId($id);
        $total_materials_intervention_type_1_before    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdBefore($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));

        # Lista todos os servicos associados
        $patrimonial_services = $this->patrimonial_serviceRepository->allPatrimonialServicesByPatrimonialId($id);
        $total_services = $this->patrimonial_serviceRepository->totalServicesByPatrimonialId($id);

        $patrimonial_depreciation_month_percentage = $this->patrimonialRepository->DepreciationMonthlyPercentage($patrimonial->patrimonial_type->useful_life_years);

        $patrimonial_useful_life_months_qty = $this->patrimonialRepository->UsefulLifeMonthsQty($patrimonial->patrimonial_type->useful_life_years);


        $logs = $patrimonial->revisionHistory;

        #Custo de aquisicao anteriores a Data Inicio Depreciacao - inicio
            $total_materials_intervention_type_1_before    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdBefore($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
            $total_services_intervention_type_1_before    = $this->patrimonial_serviceRepository->totalServicesByPatrimonialIdInterventionTypeIdBefore($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
            $total_materials_services_intervention_type_1_before = $total_materials_intervention_type_1_before +$total_services_intervention_type_1_before;
            $purchase_cost = $total_materials_intervention_type_1_before + $total_services_intervention_type_1_before;
        #Custo de aquisicao anteriores a Data Inicio Depreciacao - fim

        $patrimonial_depreciation_month_value = $this->patrimonialRepository->DepreciationMonthlyValue($patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value, $patrimonial->patrimonial_type->useful_life_years);

        $patrimonial_depreciation_accumulated_month_qty = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->depreciation_date_start, $today, $patrimonial->patrimonial_type->useful_life_years);

        $patrimonial_depreciation_accumulated_value = $this->patrimonialRepository->DepreciationAccumulatedValue($patrimonial->depreciation_date_start, $today, $patrimonial->patrimonial_type->useful_life_years, $patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value);

        $patrimonial_accounting_balance_value = $this->patrimonialRepository->AccountingBalance($patrimonial->purchase_value, $purchase_cost, $patrimonial_depreciation_accumulated_value, $patrimonial->residual_value);

        #Custo de aquisicao posteriores a Data Inicio Depreciacao (ERRO) - inicio
            $total_materials_intervention_type_1_after    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdAfter($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
            $total_services_intervention_type_1_after    = $this->patrimonial_serviceRepository->totalServicesByPatrimonialIdInterventionTypeIdAfter($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));

            if(($total_materials_intervention_type_1_after + $total_services_intervention_type_1_after)>'0')
            {
                Session::flash('flash_message_danger', 'Existem R$ '.($total_materials_intervention_type_1_after + $total_services_intervention_type_1_after).' referente a MATERIAIS e/ou SERVIÇOS em intervenções do tipo AQUISIÇAO posteriores a Data de início da Depreciação que NÃO serão considerados como Custos de Aquisição !');
            }
        #Custo de aquisicao posteriores a Data Inicio Depreciacao (ERRO) - fim

        return view('patrimonials.show', compact('patrimonial', 'patrimonial_useful_life_months_qty', 'patrimonial_depreciation_month_percentage', 'patrimonial_depreciation_month_value', 'patrimonial_depreciation_accumulated_month_qty', 'patrimonial_depreciation_accumulated_value', 'patrimonial_accounting_balance_value', 'patrimonial_movements', 'patrimonial_movement_date_last', 'patrimonial_materials', 'total_materials', 'total_materials_intervention_type_1_before', 'total_services_intervention_type_1_before', 'purchase_cost', 'patrimonial_services', 'total_services', 'logs', 'srch_depreciation_date_BR', 'srch_depreciation_date_EN'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, AccountingAccountRepository $accounting_accountRepository, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ProviderRepository $providerRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_types = array(''=>'') + $patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $patrimonial_modelRepository
            ->allPatrimonialModels()
            ->lists('description', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.edit', compact('accounting_accounts', 'patrimonial', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function copy($id, AccountingAccountRepository $accounting_accountRepository, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ProviderRepository $providerRepository, ManagementUnitRepository $management_unitRepository, PatrimonialSectorRepository $patrimonial_sectorRepository, PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository, PatrimonialStatusRepository $patrimonial_statusRepository)
    {
        $patrimonial_types =  $patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = $patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = $patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = $patrimonial_modelRepository
            ->allPatrimonialModels()
            ->lists('description', 'id')
            ->all();

        $providers = $providerRepository
            ->allProviders()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $management_units = $management_unitRepository
            ->allManagementUnits()
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_sectors = $patrimonial_sectorRepository
            ->allPatrimonialSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_sectors = $patrimonial_sub_sectorRepository
            ->allPatrimonialSubSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_statuses = $patrimonial_statusRepository
            ->allPatrimonialNewStatuses()
            ->lists('description', 'id')
            ->all();
        
        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);

        return view('patrimonials.copy', compact('patrimonial', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'management_units', 'patrimonial_sectors', 'patrimonial_sub_sectors', 'patrimonial_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\PatrimonialUpdateRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($input['patrimonial_sub_type_id']);
        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($input['patrimonial_brand_id']);
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($input['patrimonial_model_id']);

        $input['serial'] = strtoupper($input['serial']);

        $input['description'] = strtoupper($input['description']);

        #$input['description'] = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$input['serial'];

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_value'] = $numberFormatter_ptBR2en->parse($input['purchase_value']);
        #dd($input['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['residual_value'] = $numberFormatter_ptBR2en->parse($input['residual_value']);
        #dd($input['purchase_value']);

        $input['invoice'] = strtoupper($input['invoice']);

        $input['depreciation_date_start'] = \DateTime::createFromFormat('d/m/Y', $input['depreciation_date_start']);
        $input['depreciation_date_start'] = $input['depreciation_date_start']->format('Y-m-d');

        $input['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $input['invoice_date']);
        $input['invoice_date'] = $input['invoice_date']->format('Y-m-d');

        $input['purchase_process'] = strtoupper($input['purchase_process']);

        $input['patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $input['patrimonial_status_date']);
        $input['patrimonial_status_date'] = $input['patrimonial_status_date']->format('Y-m-d');

        $input['comments'] = strtoupper($input['comments']);

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        $patrimonial->update($input);

        $total_materials_intervention_type_1_after    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdAfter($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
        if($total_materials_intervention_type_1_after>'0')
        {
            Session::flash('flash_message_danger', 'Existem R$ '.$total_materials_intervention_type_1_after.' em intervenções do tipo AQUISIÇAO posteriores a Data de início da Depreciação que NÃO serão considerados como Custos de Aquisição !');
        }

        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByPatrimonialId($id)->count()>0)
        {
           return redirect('patrimonials')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonialRepository->findPatrimonialById($id)->delete();

        return redirect('patrimonials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonialRepository->withTrashed()->findPatrimonialById($id)->restore();

        return redirect('patrimonials');
    }

    public function create_movement($id, AccountingAccountRepository $accounting_accountRepository, PatrimonialTypeRepository $patrimonial_typeRepository, PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, PatrimonialBrandRepository $patrimonial_brandRepository, PatrimonialModelRepository $patrimonial_modelRepository, ProviderRepository $providerRepository, ManagementUnitRepository $management_unitRepository, PatrimonialSectorRepository $patrimonial_sectorRepository, PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository, PatrimonialStatusRepository $patrimonial_statusRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccounts()
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_types = $patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_types = $patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->lists('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->lists('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $patrimonial_modelRepository
            ->allPatrimonialModels()
            ->lists('description', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->lists('code_description', 'id')
            ->all();

        $patrimonial_sectors = array(''=>'') + $patrimonial_sectorRepository
            ->allPatrimonialSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_sub_sectors = array(''=>'') + $patrimonial_sub_sectorRepository
            ->allPatrimonialSubSectors()
            ->lists('description', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->lists('description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.movements.create', compact('patrimonial', 'accounting_accounts', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'management_units', 'patrimonial_sectors', 'patrimonial_sub_sectors', 'patrimonial_statuses'));
    }

    public function store_movement($id, Requests\PatrimonialMovementRequest $request)
    {
        $input = $request->all();

        #$patrimonial = $this->patrimonialRepository->findPatrimonialById($id);

        $input['patrimonial_id'] = $id;

        $input['patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $input['patrimonial_status_date']);
        $input['patrimonial_status_date'] = $input['patrimonial_status_date']->format('Y-m-d');

        $patrimonial_movement = $this->patrimonial_movementRepository->findPatrimonialMovementByVariousParams1($input['patrimonial_id'], $input['patrimonial_status_id'], $input['patrimonial_status_date'], $input['management_unit_id'], $input['patrimonial_sector_id'], $input['patrimonial_sub_sector_id']);

        if($patrimonial_movement->isEmpty())
        {
            $patrimonial_movement = $this->patrimonial_movementRepository->storePatrimonialMovement($input);

            $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
            $patrimonial->update($input);

            Session::flash('flash_message_success', 'MOVIMENTAÇÃO incluída com sucesso !');
        }
        else
        {
            Session::flash('flash_message_danger', 'MOVIMENTAÇÃO já existente !');
        }

        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function images($id)
    {
        return $patrimonial = $this->patrimonial_imageRepository->allPatrimonialImagesByPatrimonialId($id);
    }

    public function create_material($id, MaterialRepository $materialRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->lists('description', 'id')
            ->all();

        $materials = array(''=>'') + $materialRepository
            ->allMaterials()
            ->lists('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.materials.create', compact('patrimonial', 'patrimonial_intervention_types', 'materials', 'providers'));
    }

    public function store_material($id, Requests\PatrimonialMaterialRequest $request)
    {
        $input = $request->all();

        $input['patrimonial_id'] = $id;

        $input['purchase_process'] = strtoupper($input['purchase_process']);

        $input['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $input['intervention_date']);
        $input['intervention_date'] = $input['intervention_date']->format('Y-m-d');

        $input['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $input['invoice_date']);
        $input['invoice_date'] = $input['invoice_date']->format('Y-m-d');

        $input['invoice'] = strtoupper($input['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_value'] = $numberFormatter_ptBR2en->parse($input['purchase_value']);
        #dd($input['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_qty'] = $numberFormatter_ptBR2en->parse($input['purchase_qty']);

        $patrimonial_material = $this->patrimonial_materialRepository->storePatrimonialMaterial($input);
        
        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function edit_material($id, MaterialRepository $materialRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->lists('description', 'id')
            ->all();

        $materials = array(''=>'') + $materialRepository
            ->allMaterials()
            ->lists('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $patrimonial_material = $this->patrimonial_materialRepository->findPatrimonialMaterialById($id);

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial_material->patrimonial_id);
        
        return view('patrimonials.materials.edit', compact('patrimonial', 'patrimonial_intervention_types', 'patrimonial_material', 'materials', 'providers'));
    }

    public function update_material($id, Requests\PatrimonialMaterialRequest $request)
    {
        $input = $request->all();

        $input['patrimonial_id'] = $id;

        $input['purchase_process'] = strtoupper($input['purchase_process']);

        $input['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $input['intervention_date']);
        $input['intervention_date'] = $input['intervention_date']->format('Y-m-d');

        $input['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $input['invoice_date']);
        $input['invoice_date'] = $input['invoice_date']->format('Y-m-d');

        $input['invoice'] = strtoupper($input['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_value'] = $numberFormatter_ptBR2en->parse($input['purchase_value']);
        #dd($input['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_qty'] = $numberFormatter_ptBR2en->parse($input['purchase_qty']);

        $patrimonial_material = $this->patrimonial_materialRepository->findPatrimonialMaterialById($id);
        $patrimonial_material->update($input);

        return redirect()->route('patrimonials.show', ['id' => $patrimonial_material->patrimonial_id]);
    }

    public function create_service($id, ServiceRepository $serviceRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->lists('description', 'id')
            ->all();
            
        $services = array(''=>'') + $serviceRepository
            ->allServices()
            ->lists('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.services.create', compact('patrimonial', 'patrimonial_intervention_types', 'services', 'providers'));
    }

    public function store_service($id, Requests\PatrimonialServiceRequest $request)
    {
        $input = $request->all();

        $input['patrimonial_id'] = $id;

        $input['purchase_process'] = strtoupper($input['purchase_process']);

        $input['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $input['intervention_date']);
        $input['intervention_date'] = $input['intervention_date']->format('Y-m-d');

        $input['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $input['invoice_date']);
        $input['invoice_date'] = $input['invoice_date']->format('Y-m-d');

        $input['invoice'] = strtoupper($input['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_value'] = $numberFormatter_ptBR2en->parse($input['purchase_value']);
        #dd($input['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_qty'] = $numberFormatter_ptBR2en->parse($input['purchase_qty']);


        $patrimonial_service = $this->patrimonial_serviceRepository->storePatrimonialService($input);
        
        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function edit_service($id, ServiceRepository $serviceRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->lists('description', 'id')
            ->all();
            
        $services = array(''=>'') + $serviceRepository
            ->allServices()
            ->lists('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->lists('cnpj_mask_description', 'id')
            ->all();

        $patrimonial_service = $this->patrimonial_serviceRepository->findPatrimonialServiceById($id);

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial_service->patrimonial_id);
        
        return view('patrimonials.services.edit', compact('patrimonial', 'patrimonial_intervention_types', 'patrimonial_service', 'services', 'providers'));
    }

    public function update_service($id, Requests\PatrimonialServiceRequest $request)
    {
        $input = $request->all();

        $input['purchase_process'] = strtoupper($input['purchase_process']);

        $input['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $input['intervention_date']);
        $input['intervention_date'] = $input['intervention_date']->format('Y-m-d');

        $input['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $input['invoice_date']);
        $input['invoice_date'] = $input['invoice_date']->format('Y-m-d');

        $input['invoice'] = strtoupper($input['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_value'] = $numberFormatter_ptBR2en->parse($input['purchase_value']);
        #dd($input['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['purchase_qty'] = $numberFormatter_ptBR2en->parse($input['purchase_qty']);

        $patrimonial_service = $this->patrimonial_serviceRepository->findPatrimonialServiceById($id);
        $patrimonial_service->update($input);

        return redirect()->route('patrimonials.show', ['id' => $patrimonial_service->patrimonial_id]);
    }

    public function rpt_purchases_search(ManagementUnitRepository $management_unitRepository)
    {
        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->lists('code_description', 'id')
            ->all();

        return view('reports.patrimonials.purchases.search', compact('management_units'));
    }

    public function rpt_purchases_search_results(Requests\PatrimonialPurchaseSearchRequest $request)
    {
        $input = $request->all();

        $srch_management_unit_id            = $input['srch_management_unit_id'];
        
        $srch_purchase_date_start_ptBR      = $input['srch_purchase_date_start'];

        $input['srch_purchase_date_start']  = \DateTime::createFromFormat('d/m/Y', $input['srch_purchase_date_start']);
        $input['srch_purchase_date_start']  = $input['srch_purchase_date_start']->format('Y-m-d');
        $srch_purchase_date_start           = $input['srch_purchase_date_start'];

        $srch_purchase_date_end_ptBR        = $input['srch_purchase_date_end'];

        $input['srch_purchase_date_end']    = \DateTime::createFromFormat('d/m/Y', $input['srch_purchase_date_end']);
        $input['srch_purchase_date_end']    = $input['srch_purchase_date_end']->format('Y-m-d');
        $srch_purchase_date_end             = $input['srch_purchase_date_end'];

        #dd($srch_purchase_date_end);

        $output = public_path() . '/reports/patrimonials/allPurchasesByManagementUnitPeriod_'.date("Ymd_His");  
        $input = public_path() . '/reports/patrimonials/allPurchasesByManagementUnitPeriod.jrxml'; 

        $conditions = array("jsp_management_unit_id" => $srch_management_unit_id, "jsp_purchase_date_start" => $srch_purchase_date_start, "jsp_purchase_date_start_ptBR" => $srch_purchase_date_start_ptBR, "jsp_purchase_date_end" => $srch_purchase_date_end, "jsp_purchase_date_end_ptBR" => $srch_purchase_date_end_ptBR);
               
        $ext = "pdf";
       
        $database = \Config::get('database.connections.mysql');

        $report = new JasperPHP;
        $report->process
        (
            $input, 
            $output, 
            array('pdf'),
            $conditions,
            $database  
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=allPurchasesByManagementUnitPeriod_'.date("Ymd_His").'.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext);
    }

}
