<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Priority extends Model
{
    use HasFactory;

    protected $table = 'TRKEDBPRTY';

    protected $primaryKey = 'i_id_kedbprty';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'    => 'i_id_kedbprty',
        'code'  => 'c_kedb_prty',
        'name'  => 'n_kedb_prty'
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class, 'i_id_kedbprty', 'i_id_kedbprty');
    }
}
