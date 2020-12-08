<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $data['pageTitle'] = 'Admin Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $data['parentRoute']    ='admin.dashboard';
        return view('backend.admin.dashboard',$data);
    }
}
