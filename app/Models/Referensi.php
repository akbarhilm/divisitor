<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Referensi extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';    // idns , 24-06-2024

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
    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'                => 'i_id',
        'namatypekunjungan' => 'n_type',
        'receiveStats'      => 'c_active',
        'created_by'        => 'i_entry',
        'created_at'        => 'd_entry',
        'updated_by'        => 'i_update',
        'updated_at'        => 'd_update'
    ];


    protected $fillable = [
        'id',
        'namatypekunjungan',
        'receiveStats',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
