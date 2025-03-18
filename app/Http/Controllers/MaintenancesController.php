<?php

namespace App\Http\Controllers;

use App\Models\Maintenances;
use App\Models\Properties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;



class MaintenancesController extends Controller
{
    

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $maintenances = Maintenances::orderBy("type", "ASC")->paginate(10);

        return inertia("Maintenances/IndexMaint", [
            "maintenances" => $maintenances
        ]);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        $properties = Properties::all();
        return Inertia::render('Maintenances/CreateMaint',[
            'properties' => $properties
        ]);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "type" => "required",
            "libelle" => "required",
            "properties_id" => "required",

        ]);
        try {
            DB::beginTransaction();
            Maintenances::create([...$validatedData]);


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Maintenances $maintenance)
    {
        $properties = Properties::all();
        return Inertia::render(
            'Maintenances/EditMaint',
            [
                'properties' => $properties,
                'maintenance' => $maintenance
            ]
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request, Maintenances $maintenance)
    {
        $validatedData = $request->validate([
            "type" => "required",
            "libelle" => "required",
            "properties_id" => "required",

        ]);
        try {
            DB::beginTransaction();
            $maintenance->update([...$validatedData]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('maintenances');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Maintenances $maintenance)
    {

        $maintenance->delete();
        return redirect()->back();
    }
}
