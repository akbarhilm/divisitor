<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tamu extends Model
{
    use HasFactory;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tmvmsdetail';

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
        'nama'  			=> 'n_visitor',
        'jumlah'  			=> 'q_visitor',
        'email'  			=> 'n_visitor_email',
        'handphone'  		=> 'n_visitor_hp',
        'namaPerusahaan'  	=> 'n_visitor_pt',
        'alamatPerusahaan'  => 'a_visitor',
        'kotaPerusahaan'  	=> 'n_visitor_city',
        'kategori'  		=> 'i_idcategory',
        'tipe'  			=> 'i_idtype',
        'created_by'  		=> 'i_entry',
        'created_at'  		=> 'd_entry',
        'updated_by'  		=> 'i_update',
        'updated_at'  		=> 'd_update'
    ];

    protected $fillable = [
		'id',
        'idvms',
        'nama',
        'jumlah',
        'email',
        'handphone',
        'namaPerusahaan',
        'alamatPerusahaan',
        'kotaPerusahaan',
        'kategori',
        'tipe',		
        'created_by',
        'updated_by',
        'updated_at'
    ];			
	
}
