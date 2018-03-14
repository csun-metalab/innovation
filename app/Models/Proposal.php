<?php 
namespace Helix\Models;


use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'exploration.proposals';
    protected $primaryKey = 'project_number';
}
