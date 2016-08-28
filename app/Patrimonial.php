<?php

namespace SisConPat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;

class Patrimonial extends Revisionable
{
    use SoftDeletes;
    
    #private $materials;
    #private $services;

    #public function __construct()
    #{
        #$this->materials = [];
        #$this->services = [];
    #}

    protected $dates = [
        'patrimonial_status_date',
        'invoice_date',
        'depreciation_date_start',
        'deleted_at'
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'code' => 'Código',
        'description' => 'Descrição',
        'patrimonial_type_id' => 'Tipo',
        'patrimonial_sub_type_id' => 'Sub-tipo',
        'patrimonial_brand_id' => 'Marca',
        'patrimonial_model_id' => 'Modelo',
        'patrimonial_status_id' => 'Situação',
        'patrimonial_status_date' => 'Data Situação',
        'provider_id' => 'Fornecedor',
        'management_unit_id' => 'Unid.Gestora',
        'patrimonial_sector_id' => 'Setor',
        'patrimonial_sub_sector_id' => 'Sub-setor',
        'serial' => 'Nr serial',
        'invoice_date' => 'Data da compra',
        'purchase_process' => 'Processo de compra',
        'purchase_value' => 'Valor da compra',
        'residual_value' => 'Valor residual',
        'depreciation_date_start'  => 'Data início depreciação',
        'invoice' => 'Nota Fiscal',
        'comments' => 'Observações', 
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'NULL';
    protected $revisionUnknownString = '(vazio)';

    public function identifiableCode() 
    {
        return $this->code;
    }

    protected $fillable = [
    	'code',
    	'description',
    	'patrimonial_type_id',
    	'patrimonial_sub_type_id',
    	'patrimonial_brand_id',
    	'patrimonial_model_id',
    	'patrimonial_status_id',
    	'patrimonial_status_date',
    	'provider_id',
    	'management_unit_id',
    	'patrimonial_sector_id',
    	'patrimonial_sub_sector_id',
    	'serial',
    	'invoice_date',
    	'purchase_process',
        'purchase_value',
        'residual_value',
        'depreciation_date_start',
    	'invoice',
    	'comments'
    ];
    
    public function setInvoiceDateAttribute($value)
    {
        return $this->attributes['invoice_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setPatrimonialStatusDateAttribute($value)
    {
        return $this->attributes['patrimonial_status_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setDepreciationDateStartAttribute($value)
    {
        return $this->attributes['depreciation_date_start'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function patrimonial_type()
    {
        return $this->belongsTo('SisConPat\PatrimonialType'); 
    }

    public function patrimonial_sub_type()
    {
        return $this->belongsTo('SisConPat\PatrimonialSubType'); 
    }

    public function patrimonial_brand()
    {
        return $this->belongsTo('SisConPat\PatrimonialBrand'); 
    }

    public function patrimonial_model()
    {
        return $this->belongsTo('SisConPat\PatrimonialModel'); 
    }

    public function patrimonial_status()
    {
        return $this->belongsTo('SisConPat\PatrimonialStatus'); 
    }

    public function provider()
    {
        return $this->belongsTo('SisConPat\Provider'); 
    }

    public function management_unit()
    {
        return $this->belongsTo('SisConPat\ManagementUnit'); 
    }

    public function patrimonial_sector()
    {
        return $this->belongsTo('SisConPat\PatrimonialSector'); 
    }

    public function patrimonial_sub_sector()
    {
        return $this->belongsTo('SisConPat\PatrimonialSubSector'); 
    }

    public function patrimonial_movements()
    {
        return $this->hasMany('SisConPat\PatrimonialMovement'); 
    }

    public function patrimonial_materials()
    {
        return $this->hasMany('SisConPat\PatrimonialMaterial'); 
    }

    public function getTotalMaterials()
    {
        $total_materials = 0;

        foreach($this->patrimonial_materials as $materials)
        {
            $total_materials += $materials['purchase_value'];
        }

        return round($total_materials, 2);
    }

    public function getTotalDepreciationMaterials()
    {
        $total_depreciation_materials = 0;

        foreach($this->patrimonial_materials as $materials)
        {
            if($materials->patrimonial_intervention_type_id == 1)
            {
                $total_depreciation_materials += $materials['purchase_value'];
            }
        }

        return round($total_depreciation_materials, 2);
    }

    public function patrimonial_services()
    {
        return $this->hasMany('SisConPat\PatrimonialService'); 
    }

    public function getTotalServices()
    {
        $total_services = 0;

        foreach($this->patrimonial_services as $services)
        {
            $total_services += $services['purchase_value'];
        }

        return round($total_services, 2);
    }

    public function getTotalDepreciationServices()
    {
        $total_depreciation_services = 0;

        foreach($this->patrimonial_services as $services)
        {
            if($services->patrimonial_intervention_type_id == 1)
            {
                $total_depreciation_services += $services['purchase_value'];
            }
        }

        return round($total_depreciation_services, 2);
    }

    public function getUsefulLifeYears()
    {
        return $this->patrimonial_type->attributes['useful_life_years'];
    }

    public function getUsefulLifeMonthsQty()
    {
        if($this->getUsefulLifeYears()>0)
        {
            if(($this->patrimonial_status_id == 4) || ($this->patrimonial_status_id == 5)) //Desativado ou Baixado
            {
                $date_end = new Carbon($this->patrimonial_status_date);

                $depreciation_date_start = new Carbon($this->attributes['depreciation_date_start']);
                    
                return $depreciation_date_start->diffInMonths($date_end) + 1;
            }
            else
            {
                return ($this->getUsefulLifeYears() * 12);
            }
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationMonthlyPercentage()
    {
        if($this->getUsefulLifeYears()>0)
        {
            return (100 / ($this->getUsefulLifeYears() * 12));
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationMonthlyValue()
    {
        if($this->getUsefulLifeYears()>0)
        {
            return round((($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value']) / $this->getUsefulLifeMonthsQty()), '2');
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationAccumulatedMonthsQty($date_end)
    {
        if($this->getUsefulLifeYears()>0)
        {
            if(is_null($date_end))
            {
                $date_end = Carbon::now();
            }
            else
            {
                $date_end = new Carbon($date_end);
            }

            if($date_end >= $this->attributes['depreciation_date_start'])
            {
                if($this->patrimonial_type->attributes['useful_life_years'] > 0)
                {
                    if(($this->patrimonial_status_id == 4) || $this->patrimonial_status_id == 5) //Desativado ou Baixado
                    {
                        if($this->patrimonial_status_date < $date_end)
                        {
                            $date_end = new Carbon($this->patrimonial_status_date);
                        }
                    }
                    
                    $depreciation_months_qty = $this->getUsefulLifeMonthsQty();

                    $depreciation_date_start = new Carbon($this->attributes['depreciation_date_start']);

                    $date_end_Y = substr($date_end, 0, 4);
                    $date_end_m = substr($date_end, 5, 2);

                    $depreciation_date_start_Y = substr($depreciation_date_start, 0, 4);
                    $depreciation_date_start_m = substr($depreciation_date_start, 5, 2);

                    $depreciation_months_to_date_qty = ($date_end_Y - $depreciation_date_start_Y - 1) * 12;
                    $depreciation_months_to_date_qty += 12 - $depreciation_date_start_m + $date_end_m + 1;

                    if($depreciation_months_qty > $depreciation_months_to_date_qty)
                    {
                        return $depreciation_months_to_date_qty;
                    }
                    else
                    {
                        return $this->getUsefulLifeMonthsQty();
                    }
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                return 0; 
            }
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationAccumulatedValue($date_end)
    {
        if($this->getUsefulLifeYears()>0)
        {
            if($date_end >= $this->attributes['depreciation_date_start'])
            {
                if(($this->patrimonial_status_id == 4) || $this->patrimonial_status_id == 5) //Desativado ou Baixado
                {
                    return round((($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value']) / ($this->getUsefulLifeYears() * 12) * $this->getDepreciationAccumulatedMonthsQty($date_end)), 2);
                }
                else
                {
                    return round((($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value']) / ($this->getUsefulLifeMonthsQty()) * $this->getDepreciationAccumulatedMonthsQty($date_end)), 2);
                }
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }


    public function getAccountingBalanceValue($date_end)
    {
        if($this->getUsefulLifeYears()>0)
        {
            return round($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value'] - $this->getDepreciationAccumulatedValue($date_end), 2);
        }
        else
        {
            return 0;
        }
    }

    public function images()
    {
        return $this->hasMany('SisConPat\PatrimonialImage'); 
    }
}