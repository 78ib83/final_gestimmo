<?php

namespace App\Http\Controllers;

use App\Models\Maintenances;
use App\Models\Payments;
use App\Models\Properties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PaymentsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        /*   return response()->json(Payments::all());

        */
        $payments = Payments::orderBy("type", "ASC")->paginate(10);

        return inertia("Payments/IndexPay", [
            "payments" => $payments
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
        $maintenances = Maintenances::all();
        
        return Inertia::render('Payments/CreatePay', [
            "properties" => $properties,
            "maintenances" => $maintenances,
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
            "properties_id" => "",
            "maintenances_id" => "",
            "montant" => "required",
            /*
            exists:properties,id
            */

        ]);
        try {
            DB::beginTransaction();
            Payments::create([...$validatedData]);

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
    public function edit(Payments $payment)
    {
        return Inertia::render(
            'Payments/EditPay',
            [
                'payment' => $payment
            ]
        );
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request, Payments $payment)
    {
        $validatedData = $request->validate([
            "type" => "required",
            "libelle" => "required",
            "properties_id" => "",
            "maintenances_id" => "",
            "montant" => "required",

        ]);
        try {
            DB::beginTransaction();
            $payment->update([...$validatedData]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('payments');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Payments $payment)
    {

        $payment->delete();
        return redirect()->back();
    }
}
