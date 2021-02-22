<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Events\visit;
class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }
    public function getVideo()
    {
        $visitor = Visitor::first();
        event(new visit($visitor)); //fire event
        return view('admin.video')->with('visitor', $visitor);
    }
}
