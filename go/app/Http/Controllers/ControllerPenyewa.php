<?php

namespace App\Http\Controllers;

use App\Penyewa;
use Illuminate\Http\Request;

class ControllerPenyewa extends Controller
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
        $penyewa = Penyewa::all();
        return response()->json($penyewa);
    }

    public function read($id){
        $penyewa = Penyewa::where('USERNAME', $id)->get();
        return response()->json($penyewa);
    }

    public function create(Request $request)
    {
        $penyewa = Penyewa::create($request->all());

        return response()->json($penyewa);
    }

    public function update(Request $request, $id){
        // update semua
        // $updated = Penyewa::where('ID_Penyewa', $id)->update($request->all());

        // update sebagian
        $updated = Penyewa::where('USERNAME', $id)->update([
            "NAMA" => $request->NAMA,
            "ALAMAT" => $request->ALAMAT,
            "NO_TELP" => $request->NO_TELP,
        ]);
        return response()->json(['updated'=> $updated]);
    }
    public function delete($id)
    {
        // $ID_Penyewa=$id;
        // $deletedRows = Penyewa::destroy($ID_Penyewa);

        // $deleted = $deletedRows == 1;

        // return response()->json(['deleted' => $deleted]);

        $deleted = Penyewa::where('USERNAME', $id)->delete();
        
        return response()->json(['deleted' => $deleted]);

    }
}
