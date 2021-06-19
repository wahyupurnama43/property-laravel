<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $categori = Categori::orderByDesc('created_at')->get();
            return Datatables::of($categori)->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">Aksi</button>
                            <div class="dropdown-menu">
                                <a href="'.route('categori.edit',$item->id).'" class="dropdown-item">Sunting</a>
                                <form action="'.route('categori.destroy',$item->id).'" method="POST">
                                    '. method_field('delete') . csrf_field() .'
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->addIndexColumn()->rawColumns(['action'])->make();
        }
        return view('dashboard/categori/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/categori/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'name' => 'required|unique:categoris|max:255',
            ]);
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            Categori::create($data);
            return redirect()->route('categori.index')->with('success', 'Berhasil Di Tambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Gagal Di Tambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function show(Categori $categori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = Categori::FindOrFail($id);
        return view('dashboard/categori/edit',[
            'categori' => $categori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categoris|max:255',
            ]);
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);

            $items = Categori::FindOrFail($id);
            $items->update($data);

            return redirect()->route('categori.index')->with('success', 'Berhasil Di Rubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Gagal Di Ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categori  $categori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $items = Categori::FindOrFail($id);
            $items->delete();
            return redirect()->route('categori.index')->with('success', 'Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Gagal Di Hapus');
        }
    }
}
