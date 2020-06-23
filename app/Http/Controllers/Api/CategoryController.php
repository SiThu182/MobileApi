<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
         $categories =  CategoryResource::collection($categories);

        return response()->json([
            'categories' => $categories,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'category_name' => 'required|min:3|max:191',
          
            'type_id' => 'required',
            'brand_id' => 'required']);
        $category = Category::create([
            'name'      => request('category_name'),
            'type_id'   => request('type_id'),
            'brand_id'  => request('brand_id'),
        ]);

        $category = new CategoryResource($category);



        return response()->json([
            'category' => $category,
            'message' => 'Insert Successful!!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|min:3|max:191',
          
            'type_id' => 'required',
            'brand_id' => 'required']);
        $category = Category::find($id);
        $category->name = request('category_name');
        $category->type_id = request('type_id');
        $category->brand_id = request('brand_id');
        $category->save();

        return response()->json([
            'message' => 'Update Successfule'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
