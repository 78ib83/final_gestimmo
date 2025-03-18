<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Clients;
use App\Models\Contrats;
use App\Models\Properties;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class DashboardController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function propCount() {

        $properties = Properties::all();
        $countprop = Properties::count();
        $countclts = Clients::count();
        $countcontr = Contrats::count();
        //return response($count);
        return inertia("Dashboard", [
            "countprop" => $countprop,
            "countclts" => $countclts,
            "countcontr" => $countcontr,
            "properties" => $properties
        ]);

        
    }
    public function propList() {

        $properties = Properties::all();
        return inertia("Gest_Web", [
            "properties" => $properties
        ]);
    }
}