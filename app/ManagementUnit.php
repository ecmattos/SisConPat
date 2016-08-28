<?php

namespace SisConPat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class ManagementUnit extends Revisionable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'region_id' => 'Filial',
        'code' => 'Código',
        'description' => 'Descrição',
        'address' => 'Endereço',
        'zip_code' => 'CEP',
        'neighborhood' => 'Bairro',
        'phone' => 'Telefone',
        'mobile' => 'Celular',
        'email' => 'E-mail', 
        'city_id' => 'Cidade',
        'comments' => 'Observações',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'region_id',
        'code',
        'description',
    	'address',
    	'zip_code',
    	'neighborhood',
    	'phone',
    	'mobile',
    	'email',
    	'city_id',
    	'comments'
    ];

    public function getCodeDescriptionAttribute()
    {
        return $this->code.' - '.$this->description;
    }

    public function getZipCodeMaskAttribute($value)
    {
        $value = $this->zip_code;
        
        $zip_code_mask = Utils::mask($value, Mask::CEP);

        return $zip_code_mask;
    }

    public function getPhoneMaskAttribute($value)
    {
        $value = $this->phone;
        
        $phone_mask =  Utils::mask($value, '(##) ####-####');

        return $phone_mask;
    }

    public function getMobileMaskAttribute($value)
    {
        $value = $this->mobile;
        
        $mobile_mask = Utils::mask($value, '(##) ####-####');
        
        return $mobile_mask;
    }

    public function region()
    {
        return $this->belongsTo('SisConPat\Region'); 
    }

    public function city()
    {
        return $this->belongsTo('SisConPat\City'); 
    }

    public function patrimonials()
    {
        return $this->hasMany('SisConPat\Patrimonial'); 
    }

    public function patrimonial_movements()
    {
        return $this->hasMany('SisConPat\PatrimonialMovement'); 
    }

    public function balance_sheets()
    {
        return $this->hasMany('SisConPat\BalanceSheet');   
    }

    public function balance_sheet_previouses()
    {
        return $this->hasMany('SisConPat\BalanceSheetPrevious');   
    }
}