<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

	protected $connection = 'pgsql';	// idns , 24-06-2024

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tmvms';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'i_id';		
    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';	

    protected $maps = [
        //'id'                    => 'i_id',
        'subject'               => 'e_meet_subject',
        'building_id'    		=> 'i_idbldg',
        'jenisRapat'  			=> 'c_meet_online',
        'orgPengundang'         => 'c_org_cur',
        'pengundang'            => 'i_emp_reqst',
        'tanggal'              	=> 'd_meet',
        'jamStart'              => 'd_meet_timestart',
        'jamFinish'             => 'd_meet_timefinish',
        'linkRapat'         	=> 'n_meet_link',
        'ruangRapat'       		=> 'n_room',
        'password'          	=> 'i_meet_password',
        'uraian'                => 'e_meet',
        'created_by'           	=> 'i_entry',
        'created_at'            => 'd_entry',
        'updated_by'            => 'i_update',
        'updated_at'            => 'd_update'
    ];
	
	
    protected $fillable = [
        'subject',
        'building_id',
        'jenisRapat',
        'orgPengundang',
        'pengundang',
        'tanggal',
        'jamStart',
		'jamFinish',
        'linkRapat',
        'ruangRapat',
        'password',
        'uraian',
        'created_by',
        'updated_by',
        'updated_at'
    ];	
/* 
    protected $fillable = [
        'i_id',
        'e_meet_subject',
        'i_idbldg',
        'c_meet_online',
        'c_org_cur',
        'i_emp_reqst',
        'd_meet',
        'd_meet_timestart',
		'd_meet_timefinish',
        'n_meet_link',
        'n_room',
        'i_meet_password',
        'e_meet',
        'i_entry'
    ];	
 */
}
