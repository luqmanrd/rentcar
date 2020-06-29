<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Sewa;
use Illuminate\Http\Request;


class ControllerSewa extends Controller
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
        // $Sewa = Sewa::all();
        // return response()->json($Sewa);
        $Sewa = DB::table('sewa')->join('mobil', 'sewa.ID_MOBIL', '=', 'mobil.ID_MOBIL')->join('penyewa', 'sewa.ID_PENYEWA', '=', 'penyewa.USERNAME')->select('sewa.ID_SEWA','sewa.ID_MOBIL','sewa.ID_PENYEWA','penyewa.NAMA','mobil.PLATNOMOR','mobil.MERK','sewa.TGL_PINJAM', 'sewa.TGL_KEMBALI', 'sewa.BIAYA_SEWA')->get();
        return response()->json($Sewa);
    }

    public function read($id){
        // $Sewa = Sewa::where('ID_Sewa', $id)->get();
        $Sewa = DB::table('sewa')->join('mobil', 'sewa.ID_MOBIL', '=', 'mobil.ID_MOBIL')->join('penyewa', 'sewa.ID_PENYEWA', '=', 'penyewa.USERNAME')->select('sewa.ID_SEWA','sewa.ID_MOBIL','sewa.ID_PENYEWA','penyewa.NAMA','mobil.PLATNOMOR','mobil.MERK','sewa.TGL_PINJAM', 'sewa.TGL_KEMBALI', 'sewa.BIAYA_SEWA')->where('ID_Sewa', $id)->get();
        return response()->json($Sewa);
    }

    // public function select(){
    //     $Sewa = DB::table('sewa')->join('mobil', 'sewa.ID_MOBIL', '=', 'mobil.ID_MOBIL')->join('penyewa', 'sewa.ID_PENYEWA', '=', 'penyewa.USERNAME')->select('sewa.ID_SEWA','penyewa.NAMA','mobil.PLATNOMOR','mobil.MERK','sewa.TGL_PINJAM', 'sewa.TGL_KEMBALI', 'sewa.BIAYA_SEWA')->get();
    //     return response()->json($Sewa);
    // }


    public function create(Request $request)
    {
        $Sewa = Sewa::create($request->all());

        return response()->json($Sewa);
    }

    public function update(Request $request, $id){
        // update semua
        // $updated = Sewa::where('ID_Sewa', $id)->update($request->all());

        // update sebagian
        $updated = Sewa::where('ID_SEWA', $id)->update([
            "ID_PENYEWA" => $request->ID_PENYEWA,
            "ID_MOBIL" => $request->ID_MOBIL,
            "TGL_PINJAM" => $request->TGL_PINJAM,
            "TGL_KEMBALI" => $request->TGL_KEMBALI,
            "BIAYA_SEWA" => $request->BIAYA_SEWA
        ]);
        return response()->json(['updated'=> $updated]);
    }
    public function delete($id)
    {
        // $ID_Sewa=$id;
        // $deletedRows = Sewa::destroy($ID_Sewa);

        // $deleted = $deletedRows == 1;

        // return response()->json(['deleted' => $deleted]);

        $deleted = Sewa::where('ID_SEWA', $id)->delete();
        
        return response()->json(['deleted' => $deleted]);

    }
}
