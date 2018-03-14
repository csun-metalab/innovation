<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * This model is poorly named. It represents all_interests, not just research Interest
 */
class Research extends Model
{
   protected $table = 'fresco.research_interests';
   protected $primaryKey = 'attribute_id';
   protected $fillable = [
      'attribute_id',
      'title',
      'parent_attribute_id',
      'hierarchy',
      'count'
   ];

   // this must be set for models that do not use an auto-incrementing PK
   public $incrementing = false;

    /**
     *  This is gets any research interest under the given hierarchy
     *  It checks the parent level first; then  if no match, it checks the sub-discipline,
     *  It finds any research interest under the highest level matched.
     *  If it does not match a parent or sub-discipline, it will just find find matching bottom-level
     *  research interests
     * @param string  $hierarchy         - the title of the hierarchy we are searching in.
     * @return Collection of research interests
     */
   public static function getAllLeavesInHierarchy($hierarchy){
       // We start with the top level.
       $topLevelInterests = self::with('children.children')
           ->has('children')
           ->doesntHave('parent')
           ->where('title', $hierarchy)
           ->get();
       // If no matches, search again on second level.
       if($topLevelInterests->isEmpty()) {
           $secondLevelInterests = self::with('children')
               ->has('children')
               ->has('parent')
               ->where('title', $hierarchy)
               ->get();
       }
       // If there are matches, move down a level in the hierarchy.
       else {
           // Get an array of all second-level interests under the matching topLevel Interests
           $secondLevelInterests = $topLevelInterests->map(function ($interest) {
               return $interest->children;
           })->flatten();
       }
       //If there were no second-level interests that match (either directly or through the parent)
       if($secondLevelInterests->isEmpty()) {
           //Then just get the specific bottom-level interests.
           $lowestLevelInterests = self::doesntHave('children')
               ->has('parent')
               ->where('title', $hierarchy)
               ->get();
       }
       // If there were matching interests
       else {
           // Then query people who have any of the lowest-level interests in this hierarchy
           $lowestLevelInterests = $secondLevelInterests->map(function ($interest) {
               return $interest->children;
           })->flatten();
       }
       return $lowestLevelInterests;
   }


   /**
   * Relates this Expertise to all of its associated Person models.
   *
   * @return Builder
   */
   public function people()
   {
     return $this->belongsToMany('Helix\Models\Person', 'fresco.expertise_entity', 'expertise_id', 'entities_id')
                 ->where('entities_id', "LIKE", "members:%");
   }

   /**
   * Relates this Expertise to all of its associated parent Expertise model.
   *
   * @return Builder
   */
   public function parent() {
      return $this->belongsTo('Helix\Models\Research', 'parent_attribute_id');
   }

   public function projects() {
      return $this->belongsToMany('Helix\Models\Projects', 'fresco.expertise_entity', 'expertise_id', 'entities_id')
                  ->where('entities_id', "LIKE", "projects:%");
   }

   /**
   * Relates this Expertise to all of its children Expertise.
   *
   * @return Builder
   */
   public function children() {
      return $this->hasMany('Helix\Models\Research', 'parent_attribute_id', 'attribute_id')
          ->orderBy('count','desc');
   }


  public function scopeWhereTitleContainsWords($query, $searchStr) {
    //Check the whole string
    $query = $query->where('title', $searchStr);
    //Split into words. \W (uppercase) matches non-word characters. We shall split around them.
    $words = preg_split("/\b(\W)+\b/",$searchStr);
    // Also check if the title contains any of the terms in the string.
    foreach ($words as $word) {
      // get results that contain  any of the terms as a whole word using regex word (\b)oundries
        //Note about REGEXP in mysql vs preg_split() in PHP.
        // in REGEXP: [[:<:]]  is used for the Start-of-word boundry
        // in REGEXP: [[:>:]]  is used for the End-of-word boundry
        // But in preg_split() \b is used for both.
        $query = $query->orWhere('title', 'REGEXP', "[[:<:]]${word}[[:>:]]");
    }
    return $query;
  }
}
