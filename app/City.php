<?php

namespace SisConPat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class City extends Revisionable
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
        'state_id' => 'UF', 
        'description' => 'Descrição',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'state_id',
    	'description'
    ];

    public function state()
    {
        return $this->belongsTo('SisConPat\State'); 
    }

    public function members()
    {
        return $this->hasMany('SisConPat\Member'); 
    }

    public function partners()
    {
        return $this->hasMany('SisConPat\Partner');
    }

    public function providers()
    {
        return $this->hasMany('SisConPat\Provider');
    }

    public function management_units()
    {
        return $this->hasMany('SisConPat\ManagementUnit'); 
    }
}
