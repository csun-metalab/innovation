<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalAward extends Model
{
	protected $table = 'exploration.proposal_award_links';
	protected $primaryKey = 'proposal_id';
	public $incrementing = false;

}
