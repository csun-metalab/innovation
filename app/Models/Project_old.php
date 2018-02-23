<?php namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

//Project related details
class Project_old extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'project_id', 'start_date', 'end_date', 'url', 'visibility'
    ];
    public $incrementing = false;

    public function expertise(){
        return $this->belongsToMany('Helix\Models\Expertise', 'project_expertise', 'project_id', 'expertise_id');
    }   public function funds()
    {
      return $this->hasMany('Helix\Models\Fund','external_project_id','external_project_id');
    }


   // returns the funding for the most current period - portion of the lump sum
   public function fundingToDate()
   {
      $funds = $this->funds()
              ->where('external_project_id', $this->external_project_id)
              ->where('start_date', '<', \Carbon\Carbon::now())
              ->pluck('amount')
              ->toArray();
              
      return array_sum($funds);


   }
      // returns the entire fund amount the project will receive for its lifespan - lump sum amount
   public function totalFunding()
   {
      $funds = array_column($this->funds->toArray(), 'amount');
      return array_sum($funds);
   }

  // returns the project sponsors
   public function sponsors() {
      $sponsors = $this->funds->pluck('sponsor_id')->toArray();
      $sponsors = array_unique($sponsors);
      $names = [];

      foreach($sponsors as $sponsorId)
      {
        $name = Sponsor::findOrFail($sponsorId)->name;

        array_push($names, $name);
      }
      return $names;
   }

}