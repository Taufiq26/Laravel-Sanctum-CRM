<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OnlineRetailTransaction;

class OnlineRetailTransactionController extends Controller
{
    public function getAllTransaction () 
    {
        $ort = OnlineRetailTransaction::paginate(10);

        return response()->json([
            'data' => $ort
        ]);
    }

    public function show ($inv_code) 
    {
        $ort = OnlineRetailTransaction::where('inv_code', $inv_code)->get();

        return response()->json([
            'data' => $ort
        ]);
    }

    // Body request must be an array, example :
    /*
    [
        {
            "inv_code": "123123", 
            "stock_code": "321321", 
            "description": "asd", 
            "qty": 2, 
            "inv_date": "2022-04-03 07:45:00", 
            "price": 10.0,
            "customer_id": 12345, 
            "country": "Indonesia"
        },
        {
            "inv_code": "123123", 
            "stock_code": "112233", 
            "description": "asd", 
            "qty": 2, 
            "inv_date": "2022-04-03 07:45:00", 
            "price": 6.5,
            "customer_id": 12345, 
            "country": "Indonesia"
        }
    ]
    */
    public function store (Request $request) 
    {
        $ort = OnlineRetailTransaction::insert($request->all());

        $message = 'Transaksi gagal!';
        if ($ort)
            $message = 'Transaksi berhasil!';

        return response()->json([
            'message' => $message
        ]);
    }

    // Body request must be an array, example :
    /*
    [
        {
            "id": 525462,
            "inv_code": "123123", 
            "stock_code": "321321", 
            "description": "asd updated", 
            "qty": 2, 
            "inv_date": "2022-04-03 07:45:00", 
            "price": 10.0,
            "customer_id": 12345, 
            "country": "Indonesia"
        },
        {
            "id": 525463,
            "inv_code": "123123", 
            "stock_code": "112233", 
            "description": "asd updated", 
            "qty": 2, 
            "inv_date": "2022-04-03 07:45:00", 
            "price": 6.5,
            "customer_id": 12345, 
            "country": "Indonesia"
        }
    ]
    */
    public function update (Request $request) 
    {
        try {
            foreach ($request->all() as $value) {
                $ort = OnlineRetailTransaction::find($value['id']);
                if ($ort) {
                    $ort->inv_code = $value['inv_code'];
                    $ort->stock_code = $value['stock_code'];
                    $ort->description = $value['description'];
                    $ort->qty = $value['qty'];
                    $ort->inv_date = $value['inv_date'];
                    $ort->price = $value['price'];
                    $ort->customer_id = $value['customer_id'];
                    $ort->country = $value['country'];
                    $ort->save();
                }
            }

            return response()->json([
                'message' => 'Data transaksi berhasil diubah'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th
            ]);
        }
    }

    public function destroy ($inv_code) 
    {
        $ort = OnlineRetailTransaction::where('inv_code', $inv_code)->delete();

        $message = 'Transaksi gagal dihapus!';
        if ($ort)
            $message = 'Transaksi berhasil dihapus';

        return response()->json([
            'message' => $message
        ]);
    }
}
