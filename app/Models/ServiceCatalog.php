<?php

namespace App\Models;

use App\Models\Resolution;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCatalog extends Model
{
    use HasFactory;

    protected $table = 'TMITPMSERVCATALOQUE';
    protected $primaryKey = 'i_id_serv';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'    => 'i_serv',
        'name'  => 'n_serv'
    ];

    public function resolution()
    {
        return $this->hasMany(Resolution::class, 'i_serv', 'i_serv');
    }
}
