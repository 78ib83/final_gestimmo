<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Properties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Inertia\Inertia;

class PropertiesController extends Controller
{
    

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $search = $request->search;

        //return response()->json(Properties::count());
        /*
        $properties = Properties::all();
        return Inertia::render('Properties/IndexProp', ['properties' => $properties]);
*/

        // $countprop = Properties::count();
        $properties = Properties::orderBy("code", "ASC")
        ->when($search, function ($query) use($search) {
            $query->where("type", "like", "%{$search}%");
        })
        ->paginate(5);

        return inertia("Properties/IndexProp", [
            "properties" => $properties,
           // "countprop" => $countprop
        ]);

        /*
        $count = Properties::count();
        dd($count);*/
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        $addresses = Addresses::all();

        return Inertia::render('Properties/CreateProp', [
            "addresses" => $addresses,
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
            "code" => "required",
            "type" => "required",
            "libelle" => "required",
            "prix" => "required",
            "etat" => "required",
            "addresses_id" => "required|exists:addresses,id"
        ]);
        try {
            DB::beginTransaction();
            $properties = Properties::create([...$validatedData]);
            if ($request->hasFile("photo")) {
                $photo = $request->photo;
                // $fileName = $photo->getClientOriginalName();
                // $name = $client->nom."".$client->prenom;
                $type = $properties->type;
                $fileName = str_replace("", "_", $type);
                $filePath = $photo->storeAs("photos", $fileName, "public");
                $properties->photo = $filePath;
                $properties->save();
            }
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
    public function edit(Properties $property)
    {
        $addresses = Addresses::all();
        return Inertia::render(
            'Properties/EditProp',
            [
                "properties" => $property,
                "addresses" => $addresses
            ]
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request, Properties $property)
    {
        $validatedData = $request->validate([
            "code" => "required",
            "type" => "required",
            "libelle" => "required",
            "prix" => "required",
            "etat" => "required",
            "addresses_id" => "required|exists:addresses,id"

        ]);
        try {
            DB::beginTransaction();
            $property->update([...$validatedData]);
            if ($request->hasFile("photo")) {
                if (FacadesStorage::exists($property->photo)) {
                    FacadesStorage::delete($property->photo);
                }
                $photo = $request->photo;
                // $fileName = $photo->getClientOriginalName();
                // $name = $client->nom."".$client->prenom;
                $type = $property->type;
                $fileName = str_replace("", "_", $type);
                $filePath = $photo->storeAs("photos", $fileName, "public");
                $property->photo = $filePath;
                $property->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('properties');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Properties $property)
    {
        if ($property->photo) {
            if (FacadesStorage::exists($property->photo)) {
                FacadesStorage::delete($property->photo);
            }
        }
        $property->delete();
        return redirect()->back();
    }
}
