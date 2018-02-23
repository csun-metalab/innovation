<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table = 'funds';
    protected $primaryKey = 'id';
    protected $fillable = [
        'project_id', 'sponsor_id', 'amount', 'received_at'
    ];

    public function sponsor()
    {
    	return $this->belongsTo('Helix\Models\Sponsor');
    }
}
