<?php

namespace App\Http\Controllers;

use App\Mobil;
use Illuminate\Http\Request;

class ControllerMobil extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $mobil = Mobil::all();
        return response()->json($mobil);
    }

    public function read($id){
        $mobil = Mobil::where('ID_MOBIL', $id)->get();
        return response()->json($mobil);
    }

    public function create(Request $request)
    {
        $mobil = Mobil::create($request->all());

        return response()->json($mobil);
    }

    public function update(Request $request, $id){
        // update semua
        // $updated = Mobil::where('ID_MOBIL', $id)->update($request->all());

        // update sebagian
        $updated = Mobil::where('ID_MOBIL', $id)->update([
            "PLATNOMOR" => $request->PLATNOMOR,
            "JENIS" => $request->JENIS,
            "MERK" => $request->MERK,
            "TAHUN" => $request->TAHUN,
            "WARNA" => $request->WARNA,
            "HARGA" => $request->HARGA
        ]);
        return response()->json(['updated'=> $updated]);
    }
    public function delete($id)
    {
        // $ID_MOBIL=$id;
        // $deletedRows = Mobil::destroy($ID_MOBIL);

        // $deleted = $deletedRows == 1;

        // return response()->json(['deleted' => $deleted]);

        $deleted = Mobil::where('ID_MOBIL', $id)->delete();
        
        return response()->json(['deleted' => $deleted]);

    }
}
