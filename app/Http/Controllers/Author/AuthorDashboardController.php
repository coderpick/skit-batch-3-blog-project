<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

class AuthorDashboardController extends Controller {

    public function index() {
        return view( 'backend.author.dashboard' );
    }
}
