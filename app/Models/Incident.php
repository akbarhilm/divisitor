<?php

namespace App\Models;

use App\Models\Resolution;
use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'TMKEDBNOTE';
    protected $primaryKey = 'i_id_kedbnote';

    public $timestamps = false;

    const CREATED_AT = 'd_entry';
    const UPDATED_AT = 'd_update';

    protected $maps = [
        'id'                    => 'i_id_kedbnote',
        'ticket'                => 'i_tckt',
        'reporter'              => 'i_emp_req',
        'report_channel_id'     => 'i_id_kedbnoterpt',
        'report_channel_name'   => 'channel.n_kedb_noterpt',
        'date_received'         => 'd_kedb_notepick',
        'incident_file'         => 'n_kedb_notefile',
        'incident_desc'         => 'e_kedb_note',
        'service_catalog_id'    => 'i_serv',
        'service_catalog_name'  => 'service_catalog.n_serv',
        'report_category'       => 'c_kedb_categ',
        'initial_analysis'      => 'e_kedb_analstart',
        'impact_id'             => 'i_id_kedbimpact',
        'urgency_id'            => 'i_id_kedburg',
        'priority_id'           => 'i_id_kedbprty',
        'priority_level'        => 'priority.c_kedb_prty',
        'priority_name'         => 'priority.n_kedb_prty',
        'level_id'              => 'i_id_kedblvl',
        'resolution_desc'       => 'e_kedb_resstart',
        'resolution_file'       => 'n_kedb_resfile',
        'status'                => 'c_kedb_notestat',
        'created_by'            => 'i_entry',
        'updated_by'            => 'i_update',
        'updated_at'            => 'd_update'
    ];

    protected $fillable = [
        'id',
        'ticket',
        'reporter',
        'report_channel_id',
        'date_received',
        'incident_file',
        'incident_desc',
        'service_catalog_id',
        'report_category',
        'initial_analysis',
        'impact_id',
        'urgency_id',
        'priority_id',
        'level_id',
        'resolution_desc',
        'resolution_file',
        'status',
        'created_by',
        'updated_by',
        'updated_at'
    ];

    public function channel()
    {
        return $this->hasOne(Channel::class, 'i_id_kedbnoterpt', 'i_id_kedbnoterpt');
    }

    public function level()
    {
        return $this->hasOne(Level::class, 'i_id_kedblvl', 'i_id_kedblvl');
    }

    public function service_catalog()
    {
        return $this->belongsTo(ServiceCatalog::class, 'i_serv', 'i_serv');
    }

    public function resolution()
    {
        return $this->hasOne(Resolution::class, 'i_id_kedbnote', 'i_id_kedbnote');
    }

    public function priority()
    {
        return $this->hasOne(Priority::class, 'i_id_kedbprty', 'i_id_kedbprty');
    }
}
