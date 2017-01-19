<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function __construct(){
        $this->middleware('partner');
   }
public function index(){
        return view('partner.dashboard');
    }
}