<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specification;
use App\Http\Resources\SpecificationResource;
use Illuminate\Support\Facades\DB;
class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specificates = Specification::all();
        $specificates = SpecificationResource::collection($specificates);
       return response()->json([
            'specificates' => $specificates
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $base_url = 'mobile.khaingthinkyi.me';
        $request->validate([

            'category_id' => 'required',
            'cpu' => 'required|min:3|max:191',
            'memory' => 'required|min:3|max:191',
            'main_camera' => 'required|min:3|max:191',
            'selfie_camera' => 'required|min:3|max:191',
            'battery' => 'required|min:3|max:191',
            'features' => 'required|min:3|max:191',
            'display' => 'required|min:3|max:191',
            'capacity' => 'required|min:3|max:191',
            'price' => 'required|min:3|max:191',
            'os' => 'required|min:3|max:191',
            'date' => 'required'
        
        ]);
        
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $image=$base_url.'/image/'.$name;
        }
       

        Specification::create([
              'category_id'     => request('category_id'),
              'cpu'             => request('cpu'),
              'memory'          => request('memory'),
              'main_camera'     => request('main_camera'),
              'selfie_camera'   => request('selfie_camera'),
              'battery'         => request('battery'),
              'features'        => request('features'),
              'display'         => request('display'),
              'capacity'        => request('capacity'),
              'price'           => request('price'),
              'image'           => $image,
              'os'              => request('os'),
              'date'            => request('date'),
              'review'          => request('review'),
              'youtube'         => request('youtube')
        ]);

        return response()->json([
            'message' => "Insert Successful!!"
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
        $specificates = Specification::find($id);
        $specificates = SpecificationResource::make($specificates);
        return response()->json([
            'specifications' => $specificates
        ]);
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
         $base_url = 'mobile.khaingthinkyi.me';
        $request->validate([

            'category_id' => 'required',
            'cpu' => 'required|min:3|max:191',
            'memory' => 'required|min:3|max:191',
            'main_camera' => 'required|min:3|max:191',
            'selfie_camera' => 'required|min:3|max:191',
            'battery' => 'required|min:3|max:191',
            'features' => 'required|min:3|max:191',
            'display' => 'required|min:3|max:191',
            'capacity' => 'required|min:3|max:191',
            'price' => 'required|min:3|max:191',
            'os' => 'required|min:3|max:191',
            'date' => 'required|min:3|max:191'
        ]);
        
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $image=$base_url.'/image/'.$name;
        }else{
            $image = request('oldimg');
        }
        $specificates = Specification::find($id);
       
        $specificates->category_id =  request('category_id');
        $specificates->cpu = request('cpu');
        $specificates->memory = request('memory');
        $specificates->main_camera = request('main_camera');
        $specificates->selfie_camera =request('selfie_camera');
        $specificates->battery = request('battery');
        $specificates->display = request('display');
        $specificates->capacity = request('capacity');
        $specificates->features = request('features');
        $specificates->price = request('price');
        $specificates->image = request('image');
        $specificates->os = request('os');
        $specificates->date = request('date');
        $specificates->review = request('review');
        $specificates->youtube = request('youtube');
        $specificates->save();

        return response()->json([
            'message' => 'Update Successful!!'
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
        $specificates = Specification::find($id);
        $specificates->delete();
        
        return response()->json([
            'message' => 'Delete Successful!!'
            ]);
    }
    
     public function getBrand(){

       
        if($brand_id=request('category_id')){
            //dd($listing_id);
             $infos=DB::table('categories')
        ->join('brands','brands.id','=','categories.brand_id')
        ->join('specifications','specifications.category_id','=','categories.id')
        ->select('categories.name as cname','brands.name as bname','specifications.*')
        ->where('categories.brand_id', '=', $brand_id)
        ->get();
            //dd($infos);
        }
        //dd($infos);
        return response()->json([
            'specificates' => $infos
        ]);
      }
         public function getSpecification(){

       
        if($category_id=request('category_id')){
            //dd($listing_id);
             $specifications=DB::table('specifications')
       
        ->join('categories','categories.id','=','specifications.id')
        ->select('specifications.*')
        ->where('specifications.category_id', '=', $category_id)
        ->get();
            //dd($infos);
        }
        //dd($infos);
        return response()->json([
            'specifications' => $specifications
        ]);


        //
    
    }
    
     public function orderDate()
    {
        // Specification::all();
        $specificates = DB::table('specifications') ->latest('date')
                ->get();   
        $specificates = SpecificationResource::collection($specificates);
       return response()->json([
            'specificates' => $specificates
        ]);

    }
}
