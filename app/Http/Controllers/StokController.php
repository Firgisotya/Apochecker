<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Models\Product;
use App\Models\User;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.histori_stok.index', [
            'stoks' => Stok::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stok.create', [
            'users' => User::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStokRequest $request)
    {
        $validateData = $request->validate([
            'product_id' => 'required',
            'date' => 'required',
            'qty' => 'required',
        ]);
        $validateData['user_id'] = auth()->user()->id;
        Stok::create($validateData);
        return redirect('/admin/stok')->with('success', 'Stok Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStokRequest  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        Stok::where('id', $stok->id)->delete();
        return redirect('/admin/histori_stok')->with('success', 'Stok deleted successfully');
    }
}
