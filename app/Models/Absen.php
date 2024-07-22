<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absen extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tmvmsattendance';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'i_id';		
    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';	

    protected $maps = [
        'id'    			=> 'i_id',
        'idvms'   			=> 'i_idvms',
        'idvmsdetail'       => 'i_idvmsdetail',
        'nama'  			=> 'n_visitor_card',
        'nik    '  			=> 'i_visitor_card',
        'finger'  			=> 'i_visitor_finger',
        'email'      		=> 'i_visitor_email',
        'hp'            	=> 'i_visitor_hp',
        'org'               => 'c_org_cur',
        'created_by'  		=> 'i_entry',
        'created_at'  		=> 'd_entry',
        'updated_by'  		=> 'i_update',
        'updated_at'  		=> 'd_update'
    ];

    protected $fillable = [
		'id',
        'idvms',
        'idvmsdetail',
        'nama',
        'nik',
        'finger',
        'email',
        'hp',
        'org',    	
        'created_by',
        'updated_by',
        'updated_at'
    ];			
	
}
