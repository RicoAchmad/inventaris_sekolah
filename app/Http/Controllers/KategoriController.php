<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('admin.kategori.index', compact('kategori'));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'List Data Kategori',
        //     'date' => $Kategori
        // ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Kategori.create');
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
        alert()->error('Mohon maaf', 'Nomor Minimal 11 Digit dan maksimal 14 digit');

        $validated = $request->validate([
            'kategori' => 'required',
            'nama_barang' => 'required',
            'alamat' => 'required',
            'no_wa' => 'required|min:11|max:14',
        ]);

        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        $kategori->nama_barang = $request->nama_barang;
        $kategori->alamat = $request->alamat;
        $kategori->no_wa = $request->no_wa;
        $kategori->save();
        Alert::success('Mantap', 'Data berhasil ditambah');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $Kategori)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Kategori = Kategori::findOrFail($id);
        return view('admin.Kategori.edit', compact('Kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_Kategori' => 'required',
            'nama_barang' => 'required',
            'alamat' => 'required',
            'no_wa' => 'required',
        ]);

        $Kategori = Kategori::findOrFail($id);
        $Kategori->nama_Kategori = $request->nama_Kategori;
        $Kategori->nama_barang = $request->nama_barang;
        $Kategori->alamat = $request->alamat;
        $Kategori->no_wa = $request->no_wa;
        $Kategori->save();
        Alert::success('Mantap', 'Data berhasil update');
        return redirect()->route('Kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!Kategori::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Mantap', 'Data berhasil dihapus');
        return redirect()->route('Kategori.index');
    }
}
