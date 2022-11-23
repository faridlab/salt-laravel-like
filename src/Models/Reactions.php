<?php

namespace SaltLike\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;
use SaltLaravel\Observers\Traits\Actorable;

class Reactions extends Resources {
    use Uuids;
    use ObservableModel;
    use Actorable;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'foreign_table',
        'foreign_id',
        'type',
        'reaction',
    ];

    protected $rules = array(
        'foreign_table' => 'nullable|string',
        'foreign_id' => 'nullable|string',
        'type' => 'required|string',
        'reaction' => 'nullable|string',
    );

    protected $auths = array (
        // 'index',
        'store',
        // 'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $forms = array();
    protected $structures = array();
    protected $searchable = array(
        'foreign_table',
        'foreign_id',
        'type',
        'reaction',
    );

    protected $fillable = array(
        'foreign_table',
        'foreign_id',
        'type',
        'reaction',
    );

    public function user() {
        return $this->belongsTo('App\Models\Users', 'created_by', 'id')->withTrashed();
    }

}
