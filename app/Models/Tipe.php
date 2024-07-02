<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trvmstype';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'i_id';		

    protected $maps = [
        'id'    => 'i_id',
        'name'  => 'n_type'
    ];
	
}
