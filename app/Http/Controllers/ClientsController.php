<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Clients;
use App\Models\Contrats;
use App\Models\Properties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Inertia\Inertia;

class ClientsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

        $clients = Clients::orderBy("prenom", "ASC")->paginate(10);

        return inertia("Clients/IndexClt", [
            "clients" => $clients,

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
        $contrats = Contrats::all();

        return Inertia::render("Clients/CreateClt", [
            "properties" => $properties,
            "contrats" => $contrats
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
            "prenom" => "required",
            "nom" => "required",
            "genre" => "required",
            "telephone" => "required",
            "email" => "required",
            "properties_id" => "required|exists:properties,id",
            "contrats_id" => "required|exists:contrats,id"
        ]);
        try {
            DB::beginTransaction();
            $client = Clients::create([...$validatedData]);
            if ($request->hasFile("photo")) {
                $photo = $request->photo;
                // $fileName = $photo->getClientOriginalName();
                // $name = $client->nom."".$client->prenom;
                $prenom = $client->prenom;
                $fileName = str_replace("", "_", $prenom);
                $filePath = $photo->storeAs("photos", $fileName, "public");
                $client->photo = $filePath;
                $client->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        // return redirect()->route('clients');
        return redirect()->back();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Clients $client)
    {
        $property = Properties::all();
        $contrats = Contrats::all();
        return Inertia::render(
            'Clients/EditClt',
            [
                'client' => $client,
                'properties' => $property,
                'contrats' => $contrats
            ]
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request, Clients $client)
    {
        $validatedData = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "genre" => "required",
            "telephone" => "required",
            "email" => "required",
            "properties_id" => "required",
            "contrats_id" => "required"
            





        ]);
        try {
            DB::beginTransaction();
            $client = Clients::create([...$validatedData]);
            if ($request->hasFile("photo")) {
                $photo = $request->photo;
                // $fileName = $photo->getClientOriginalName();
                // $name = $client->nom."".$client->prenom;
                $prenom = $client->prenom;
                $fileName = str_replace("", "_", $prenom);
                $filePath = $photo->storeAs("photos", $fileName, "public");
                $client->photo = $filePath;
                $client->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();
        //return redirect()->route('clients');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Clients $client)
    {
        if ($client->photo) {

            if (FacadesStorage::exists($client->photo)) {

                FacadesStorage::delete($client->photo);
            }
        }

        $client->delete();
        return redirect()->back();
    }
}
