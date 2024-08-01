<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
	
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
        'id'    		=> 'i_id',
        'idvms'   		=> 'i_idvms',
        'idvmsdetail'   => 'i_idvmsdetail',
        'name'  		=> 'n_visitor_card',
        'email'  		=> 'i_visitor_email',
        'handphone'  	=> 'i_visitor_hp',
        'created_by'  	=> 'i_entry',
        'created_at'  	=> 'd_entry',
        'updated_by'  	=> 'i_update',
        'updated_at'  	=> 'd_update'
    ];

    protected $fillable = [
		'id',
        'idvms',
        'idvmsdetail',
        'name',
		'email',
        'created_by',
        'updated_by',
        'updated_at'
    ];			
}
