<?php namespace METALab\Auth;

use Schema;
use METALab\Auth\Interfaces\MetaAuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use GuzzleHttp\Exception\RequestException;


/**
 * Base class used with the META+Lab authentication mechanism. This can be
 * used on its own or subclassed for a specific application. If used on its
 * own it expects a table called "users" with a primary key of "user_id". The
 * constructor can also be used to provide an instance with modified table
 * and primary key names as well.
 */
class MetaUser extends Model implements AuthenticatableContract, MetaAuthenticatableContract {

	use Authenticatable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = "users";

	/**
	 * The primary key used by the database table.
	 *
	 * @var string
	 */
	protected $primaryKey = "user_id";

	/**
	 * Constructs a new MetaUser object. An optional table name and optional
	 * primary key name can also be provided.
	 *
	 * @param string $table The optional table name to use for the model
	 * @param string $primaryKey The optional primary key name to use
	 */
	public function __construct($table="users", $primaryKey="user_id") {
		parent::__construct();
		$this->table = $table;
		$this->primaryKey = $primaryKey;
	}

	/**
	 * Returns whether this model supports having a remember_token attribute.
	 *
	 * @return boolean
	 */
	public function canHaveRememberToken() {
		return Schema::hasColumn($this->table, 'remember_token');
	}

	// implements MetaAuthenticatableContract#findForAuth
	public static function findForAuth($identifier) {
		return MetaUser::where($this->primaryKey, '=', $identifier)
			->first();
	}

	// implements MetaAuthenticatableContract#findForAuthToken
	public static function findForAuthToken($identifier, $token) {
		return MetaUser::where($this->primaryKey, '=', $identifier)
			->where('remember_token', '=', $token)
			->first();
	}
	 public function profile_image()
	  {
	    $email = $this->email;
	      try {
	        $client = new \GuzzleHttp\Client();
	        $image = $client->get("https://directory.ptg.csun.edu/api/members/email/t".str_replace('nr_','', $email))->json();
	      if($image['people']['image']['image_url']){
	        return $this->image = $image['people']['image']['image_url'];
	      }
	      else{
	        return $this->image = 'http://www.csun.edu/faculty/imgs/profile-default.png';
	      }
	      } catch (RequestException $e) {
	        return $this->image = 'http://www.csun.edu/faculty/imgs/profile-default.png';
	      }
	  }
  public function profile_url()
  {
    $uri = preg_split('/[_ @]/', $this->email);
    if(env('APP_DEBUG')){
      $uri = $uri[1];
    }
    else{
      $uri = $uri[0];
    }
    return $this->url  = "http://www.csun.edu/faculty/profiles/".$uri; 
  }
}