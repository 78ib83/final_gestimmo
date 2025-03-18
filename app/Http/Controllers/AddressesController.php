<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

use Inertia\Inertia;

class AddressesController extends Controller
{
    public function index()
    {
        //return response()->json(Addresses::all());
        $addresses = Addresses::orderBy("pays", "ASC")->paginate(10);
        return inertia("Addresses/IndexAddr", [
            "addresses" => $addresses
        ]);
    }
    public function create()
    {
        return Inertia::render("Addresses/CreateAddr");
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "pays" => "required",
            "ville" => "required",
            "quartier" => "required",
            "rue" => "required",
            "porte" => "required",
        ]);
        try {
            DB::beginTransaction();
            $client = Addresses::create([...$validatedData]);

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
    public function edit(Addresses $address)
    {
        return Inertia::render(
            'Addresses/EditAddr',
            [
                'address' => $address
            ]
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request, Addresses $address)
    {
        $validatedData = $request->validate([
            "pays" => "required",
            "ville" => "required",
            "quartier" => "required",
            "rue" => "required",
            "porte" => "required",

        ]);
        try {
            DB::beginTransaction();
            $address->update([...$validatedData]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('addresses');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Addresses $address)
    {
        $address->delete();
        return redirect()->back();
    }
}
