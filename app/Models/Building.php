<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
	
	//protected $connection = 'pgsql';	// idns , 24-06-2024

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tritgnbuilding';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'i_id';		

    protected $maps = [
        'id'    => 'i_id',
        'name'  => 'n_bldg'
    ];
	
}
