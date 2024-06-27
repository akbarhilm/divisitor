<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    protected $table = 'TRKEDBLVL';
    protected $primaryKey = 'i_id_kedblvl';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'    => 'i_id_kedblvl',
        'name'  => 'n_kedb_lvl'
    ];

    public function incidents()
    {
        return $this->belongsTo(Incident::class, 'i_id_kedblvl', 'i_id_kedblvl');
    }
}
