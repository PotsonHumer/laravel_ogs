<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index($account)
    {
    	echo $account;
    }

    public function method($account,$method)
    {
    	echo $account;
    }
}
