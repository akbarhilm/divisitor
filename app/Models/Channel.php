<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'TRKEDBNOTERPT';

    protected $primaryKey = 'i_id_kedbnoterpt';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'    => 'i_id_kedbnoterpt',
        'name'  => 'n_kedb_noterpt'
    ];

    public function incident()
    {
        return $this->belongsTo(incident::class, 'i_id_kedbnoterpt', 'i_id_kedbnoterpt');
    }
}
