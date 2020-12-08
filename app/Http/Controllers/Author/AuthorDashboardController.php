<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

class AuthorDashboardController extends Controller {

    public function index() {
        $data['pageTitle'] = 'Author Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $data['parentRoute'] = 'author.dashboard';
        return view( 'backend.author.dashboard',$data );
    }
}
