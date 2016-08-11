<?php

namespace UserManagementApp;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


  protected $guarded = array('id');
  protected $fillable = array('name', 'email');

  public static $rules = array(
    'name' => 'required|min:5',
    'email' => 'required|email'
  );
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
    protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  public function articles()
  {
    return $this->hasMany('UserManagementApp\Article');
  }

  public function isATeamManager()
  {
    return true;
  }

}
