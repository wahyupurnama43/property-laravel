<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $product = Product::with(['gallery','user','categori'])->orderByDesc('created_at')->get();
        if  (request()->ajax()) {
                return Datatables::of($product)->addColumn('action',function($item){
                return '
                <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">Aksi</button>
                        <div class="dropdown-menu">
                            <a href="'.route('product.edit',$item->id).'" class="dropdown-item">Sunting</a>
                            <form action="'.route('product.destroy',$item->id).'" method="POST">
                                '. method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                ';
            })->editColumn('photo', function($item){
                return $item->gallery ? '<img src="'. Storage::url( optional($item->gallery->first())->photo) .'" style="max-hight:48px; width:100px;" />' : 'kosong';
            })
            ->addIndexColumn()
            ->rawColumns(['action','photo'])->make();
        }
        return view('dashboard/product/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Categori::all();
        return view('dashboard/product/create',[
            'categori' => $categori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {

            if($request->hasFile('photo')){

                $data = $request->all();
                $data['users_id'] = Auth::user()->id;
                $data['slug'] = Str::slug($request->name);
                Product::create($data);
                $product_id = Product::orderBy('created_at', 'desc')->first()->id;
                $images = $request->file('photo');

                foreach($images as $key => $img){
                    $photo = $img->store('assets/gallery','public');
                    if($key == 0){
                        ProductGallery::create([
                            'photo' => $photo,
                            'products_id' =>  $product_id,
                            'status' => 'active',
                        ]);
                    }else{
                        ProductGallery::create([
                            'photo' => $photo,
                            'products_id' =>  $product_id,
                            'status' => ''
                        ]);
                    }
                    
                }
                return redirect()->route('product.index')->with('success', 'Berhasil Di Tambahkan');
            }
            return redirect()->back()->with('error', 'Gambar Harus Ada');
        } catch (\Exception $e) {
            //throw $th;
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::with('galleries')->findOrFail($id);
        $categori = Categori::all();
        return view('dashboard.product.edit',[
            'product' => $products,
            'categori' => $categori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $data = $request->all();
            $items = Product::findOrFail($id);
            $data['users_id'] = Auth::user()->id;
            $data['slug'] = Str::slug($request->name);

            $items->update($data);
            if($request->hasFile('photo')){
                $images = $request->file('photo');

                foreach($images as $key => $img){
                    $photo = $img->store('assets/gallery','public');
                    if($key == 0){
                        ProductGallery::create([
                            'photo' => $photo,
                            'products_id' =>  $id,
                            'status' => 'active',
                        ]);
                    }else{
                        ProductGallery::create([
                            'photo' => $photo,
                            'products_id' =>  $id,
                            'status' => ''
                        ]);
                    }
                    
                }
            }
            return redirect()->back()->with('success', 'Berhasil Di Update');
        } catch (\Exception $e) {
            //throw $th;
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $gallery = ProductGallery::where('products_id',$product->id)->get();
        foreach($gallery as $gl){
            if(Storage::disk('public')->exists($gl->photo)){
                Storage::disk('public')->delete($gl->photo);
            }
        }
        // $gallery->delete();
        $product->delete();
        return redirect()->back()->with('success','Product Telah Terhapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteGallery($id)
    {

        $gallery = productGallery::findOrFail($id);
        
        $gallery->delete();
        return redirect()->back()->with('success','Gambar Terhapus');
    }
}
