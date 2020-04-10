<?php

namespace App\Http\Controllers\Admin;

use App\Essense;
use App\Http\Controllers\Controller;
use App\Http\Requests\EssenseRequest;
use App\Product;
use Illuminate\Http\Request;

class EssenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $essenses =$product->essenses()->latest()->paginate(10);
        return view('admin.essenses.essenses', compact('essenses', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.essenses.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EssenseRequest $request, Product $product)
    {
        $params = $request->all();
        $params['product_id'] = $request->product->id;
        $essense = Essense::create($params);
        $essense->options()->sync($request->property_id);
        return redirect()->route('essense.index', $product);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Essense  $essense
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Essense $essense)
    {
        return view('admin.essenses.show', compact('product', 'essense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Essense  $essense
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Essense $essense)
    {
        return view('admin.essenses.create', compact('product', 'essense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Essense  $essense
     * @return \Illuminate\Http\Response
     */
    public function update(EssenseRequest $request, Product $product, Essense $essense)
    {
        $params = $request->all();
        $params['product_id'] = $request->product->id;
        $essense->update($params);
        $essense->options()->sync($request->property_id);
        return redirect()->route('essense.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Essense  $essense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Essense $essense)
    {
        $essense->delete();

        return redirect()->route('essense.index', $product);
    }
}
