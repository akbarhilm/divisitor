<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Otoritas extends Model
{
    use HasFactory;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trvmsusermodul';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'i_emp';		

    protected $maps = [
        'iemp'    => 'i_emp',
        'idmodul'  => 'i_idmodul',
        'kode'  => 'c_active'
    ];
	
}
