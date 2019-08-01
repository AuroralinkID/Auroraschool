<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SekolahImport;
use App\Exports\SekolahExport;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sekolahs = Sekolah::latest()->paginate(10);

        return view('sekolah.index', compact('sekolahs'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_sekolah'=>'required',
            'alamat_sekolah'=>'required',
            'nis'=>'required',
            'telepon'=>'required',
            'email'=>'required',
            'kota'=>'required'
        ]);
        // if ($request->fails())
        // {
        //     Alert::danger('Data Berhasil Di Simpan !!', 'Berhasil');
        //     return redirect()->back()->withInput()->with([
		// 		'field_errors' => $request->errors()
        //     ]);
        // }


        $sekolah = new Sekolah([
            'nama_sekolah' => $request->get('nama_sekolah'),
            'alamat_sekolah' => $request->get('alamat_sekolah'),
            'nis' => $request->get('nis'),
            'telepon' => $request->get('telepon'),
            'email' => $request->get('email'),
            'kota' => $request->get('kota')
        ]);

            $sekolah->save();
            Alert::success('Data Berhasil Di Simpan !!', 'Berhasil');
            return redirect('sekolah');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sekolah.show', ['sekolah' => sekolah::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        //
        // $sekolahan = sekolah::find($id);
        return view('sekolah.edit',compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Sekolah $sekolah)
    {
        //
        $request->validate([
            'nama_sekolah'=>'required',
            'alamat_sekolah'=>'required',
            'nis'=>'required'
        ]);

        $sekolahs = sekolah::find($sekolah);
        $sekolahs->nama_sekolah =  $request->get('nama_sekolah');
        $sekolahs->alamat_sekolah = $request->get('alamat_sekolah');
        $sekolahs->nis = $request->get('nis');
        $sekolahs->telepon = $request->get('telepon');
        $sekolahs->email = $request->get('email');
        $sekolahs->kota = $request->get('kota');
        $sekolahs->save();

        flashMe()->success();
        return redirect('sekolah')->with('success', 'data sekolahan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        return redirect()->route('sekolah.index')
                        ->with('success','Sekolahan deleted successfully');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new SekolahExport, 'sekolah.xlsx');
    }
        /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
        /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new SekolahImport,request()->file('file'));
        Alert::success('Data Berhasil Di Import !!', 'Berhasil');
        return back();
    }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("sekolah")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
