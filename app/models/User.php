<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use HasRole;
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $fillable =['username','password','active','token'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');



    /**
     *
     * User has a person
     *
     */
    public function Person(){
        return $this->hasOne('persona','user_id');
    }
    /*
     *
     * Skin belongs to a User
     *
     */
    public function Skin(){
        return $this->belongsTo('skin');
    }
    /**
     *
     *##User has profile
     *
     */
    public function Profile(){
        return $this->hasMany('perfil','users_id');
    }
    /**
     *
     *##User has role assigned
     *
     */
    public function AssignedRole(){
        return $this->hasOne('AssignedRole','user_id');
    }
	public static function get_image_profile($id){
		$foto = User::where('users.id', '=', $id)
		          ->join('perfiles', 'users.id', '=', 'perfiles.users_id')
		              ->select('perfiles.foto_perfil')->get();

        if(!Auth::user()->hasRole('padre-fb'))
		  return "/packages/images/perfil/".$foto[0]['foto_perfil'];
        else
		  return $foto[0]['foto_perfil'];
	}

    public static function get_image_profile_original($id){
		$foto = User::where('users.id', '=', $id)
                    ->join('perfiles', 'users.id', '=', 'perfiles.users_id')
                        ->select('perfiles.foto_perfil')->get();

        if(!Auth::user()->hasRole('padre-fb'))
		  return "/packages/images/perfil/original/".$foto[0]['foto_perfil'];
        else
		  return $foto[0]['foto_perfil'];
	}

    public static function getSkin(){
        $skin = User::join('skins', 'users.skin_id', '=', 'skins.id')
                    ->where('users.id', '=', Auth::user()->id)
                        ->first();
        return $skin;
    }
    public function sesionInfo(){
        return $this->hasOne('sesionInfo','users_id');
    }

}
