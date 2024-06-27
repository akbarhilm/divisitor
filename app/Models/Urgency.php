<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urgency extends Model
{
    use HasFactory;

    protected $table = 'TRKEDBURG';
    protected $primaryKey = 'i_id_kedburg';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'    => 'i_id_kedburg',
        'name'  => 'n_kedb_urg'
    ];

    public function incidents()
    {
        return $this->belongsTo(Incident::class, 'i_id_kedburg', 'i_id_kedburg');
    }
}
