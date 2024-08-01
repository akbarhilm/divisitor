<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
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
	
    protected $maps = [
        'id'    	=> 'i_id',
        'name'  	=> 'n_visitor_pt',
        'alamat'	=> 'a_visitor',
        'kota'    	=> 'n_visitor_city'
    ];
	
}
