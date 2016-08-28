<?php

namespace SisConPat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class PatrimonialMovement extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at',
        'patrimonial_status_date',
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'patrimonial_status_id' => 'Situação',
        'patrimonial_status_date' => 'Data Situação', 
        'management_unit_id' => 'Unid.Gestora',
        'patrimonial_sector_id' => 'Setor',
        'patrimonial_sub_sector_id' => 'Sub Setor', 
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'patrimonial_id',
    	'patrimonial_movement_type_id',
        'patrimonial_status_id',
    	'patrimonial_status_date',
    	'management_unit_id',
    	'patrimonial_sector_id',
    	'patrimonial_sub_sector_id'
    ];

    public function patrimonial()
    {
        return $this->belongsToMany('SisConPat\Patrimonial');   
    }

    public function management_unit()
    {
        return $this->belongsTo('SisConPat\ManagementUnit');   
    }

    public function patrimonial_movement_type()
    {
        return $this->belongsTo('SisConPat\PatrimonialMovementType');   
    }

    public function patrimonial_status()
    {
        return $this->belongsTo('SisConPat\PatrimonialStatus');   
    }

    public function patrimonial_sector()
    {
        return $this->belongsTo('SisConPat\PatrimonialSector');   
    }

    public function patrimonial_sub_sector()
    {
        return $this->belongsTo('SisConPat\PatrimonialSubSector');   
    }
}