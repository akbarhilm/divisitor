<?php

namespace App\Models;

use App\Models\Incident;
use App\Models\Level;
use App\Models\ServiceCatalog;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resolution extends Model
{
    use HasFactory;

	//protected $connection = 'oracle';	// idns , 24-06-2024

    protected $table = 'TMKEDBRES';
    protected $primaryKey = 'i_id_kedbres';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'                    => 'i_id_kedbres',
        'subject'               => 'n_kedb_subject',
        'service_catalog_id'    => 'i_serv',
        'service_catalog_name'  => 'service_catalog.n_serv',
        'level_id'              => 'c_kedb_reslvl',
        'level_name'            => 'level.n_kedb_lvl',
        'category'              => 'c_kedb_resacct',
        'status'                => 'c_kedb_resstat',
        'incident_desc'         => 'e_kedb_incident',
        'resolution_desc'       => 'e_kedb_res',
        'retired_desc'          => 'e_kedb_retired',
        'file'                  => 'n_file_path',
        'created_by'            => 'i_entry',
        'created_at'            => 'd_entry',
        'updated_by'            => 'i_update',
        'updated_at'            => 'd_update'
    ];

    protected $fillable = [
        'id',
        'subject',
        'service_catalog_id',
        'service_catalog_name',
        'level_id',
        'level_name',
        'category',
        'status',
        'incident_desc',
        'resolution_desc',
        'retired_desc',
        'file',
        'created_by',
        'updated_by',
        'updated_at'
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class, 'i_id_kedbnote', 'i_id_kedbnote');
    }

    public function service_catalog()
    {
        return $this->belongsTo(ServiceCatalog::class, 'i_serv', 'i_serv');
    }

    public function level()
    {
        return $this->hasOne(Level::class, 'i_id_kedblvl', 'c_kedb_reslvl');
    }
}
