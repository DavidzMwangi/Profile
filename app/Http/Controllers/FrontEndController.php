<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\User;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function welcome()
    {
        return view('frontend.index')
            ->withUser(User::first())
            ->withServices(Service::all());
    }
}
