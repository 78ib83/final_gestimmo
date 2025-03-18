<?php

namespace App\Http\Controllers;

use App\Models\Contrats;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ContratsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $contrats = Contrats::orderBy("type", "ASC")->paginate(10);

        return inertia("Contrats/IndexCont", [
            "contrats" => $contrats
        ]);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Contrats/CreateCont');
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
            "duree" => "required",

        ]);
        try {
            DB::beginTransaction();
            Contrats::create([...$validatedData]);


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
    public function edit(Contrats $contrat)
    {
        return Inertia::render(
            'Contrats/EditCont',
            [
                'contrat' => $contrat
            ]
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request, Contrats $contrat)
    {
        $validatedData = $request->validate([
            "type" => "required",
            "libelle" => "required",
            "duree" => "required",

        ]);
        try {
            DB::beginTransaction();
            $contrat->update([...$validatedData]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('contrats');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Contrats $contrat)
    {

        $contrat->delete();
        return redirect()->back();
    }
}
