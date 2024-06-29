<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;


class DepAdminController extends Controller
{
    
    public function HomeRouteDep(){
        return view('/dep_admin/dep_admin_home');
    }

}
