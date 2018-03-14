<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';
    protected $primaryKey = 'sponsor_id';
    public $incrementing = false;
}
