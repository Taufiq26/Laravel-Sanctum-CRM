<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Programs;

class ProgramsController extends Controller
{
    public function getAll () 
    {
        $program = Programs::all();

        return response()->json([
            'data' => $program
        ]);
    }

    public function store (Request $request) 
    {
        $program = Programs::insert($request->all());

        $message = 'Program gagal dibuat!';
        if ($program)
            $message = 'Program berhasil dibuat!';

        return response()->json([
            'message' => $message
        ]);
    }

    public function update (Request $request, $id) 
    {
        $program = Programs::find($id);
        if ($program) {
            $program->name = $request->name;
            $program->desc = $request->desc;
            $program->save();

            $message = 'Program berhasil diubah!';
        } else {
            $message = 'Program gagal diubah!';
        }

        return response()->json([
            'data' => $program,
            'message' => $message
        ]);
    }

    public function destroy ($id) 
    {
        $program = Programs::find($id)->delete();

        $message = 'Transaksi gagal dihapus!';
        if ($program)
            $message = 'Transaksi berhasil dihapus';

        return response()->json([
            'message' => $message
        ]);
    }
}
