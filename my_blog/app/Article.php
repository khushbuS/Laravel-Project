<?php

namespace UserManagementApp;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $fillable=['title','body','published_at','user_id'];

     public function setPublishedAtAttribute($date)
     {
     	$this->attributes['published_at']=Carbon::createFromFormat('Y-m-d',$date);
     }

     public function user()
     {
     	return $this->belongsTo('UserManagementApp\User'); 
     }

     public function tags()
     {
     	return $this->belongsToMany('UserManagementApp\Tag')->withTimeStamps();
     }

     public function getTagListAttribute()
     {
     	return $this->tags->lists('id');
     }
}
