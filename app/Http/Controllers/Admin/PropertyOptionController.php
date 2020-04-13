<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyOptionRequest;
use App\Property;
use App\PropertyOption;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        $options = PropertyOption::latest()->paginate(10);
        return view('admin.options.options', compact('options', 'property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        return view('admin.options.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyOptionRequest $request, Property $property)
    {
        $params = $request->all();

        $params['property_id'] = $request->property->id;

        PropertyOption::create($params);
        return redirect()->route('options.index', $property);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, PropertyOption $option)
    {
        return view('admin.options.show', compact('option', 'property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, PropertyOption $option)
    {
        return view('admin.options.create', compact('property', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyOptionRequest $request, Property $property, PropertyOption $option)
    {
       $params = $request->all();

       $option->update($params);
       return redirect()->route('options.index', $property);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property, PropertyOption $option)
    {
        $option->delete();
        return redirect()->route('options.index', compact('property'));
    }
}
