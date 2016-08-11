<?php

namespace UserManagementApp\Http\Controllers;

use Illuminate\Http\Request;

use UserManagementApp\Http\Requests;

class PagesController extends Controller
{
   public function about()
   {
   	 //$name='<span style="color: red;">Khushbu</span>';
   	$tech=['PHP','Android','Programming'];
   	//$tech=[];

   	 return view('pages.about',compact('tech'));
   }
}
