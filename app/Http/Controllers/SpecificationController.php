<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specification;
use App\Category;
use Illuminate\Pagination\Paginator;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;

>>>>>>> a2c7d9df466bcf34d77c74cba40608854a27f83c
class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $specifications = Specification::paginate(10);
=======
        $specifications = Specification::paginate(15);
        // $specifications = DB::table('specifications')->paginate(15);
        //dd($specifications);
>>>>>>> a2c7d9df466bcf34d77c74cba40608854a27f83c
        $categories = Category::all();
        return view('specification.index',compact('specifications','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
            $base_url = 'http://mobile.khaingthinkyi.me/';
         $request->validate([
            'category_id' => 'required',
            'cpu' => 'required|max:191',
            'memory' => 'required|max:191',
            'main_camera' => 'required|min:3|max:191',
            'selfie_camera' => 'required|min:3|max:191',
            'battery' => 'required|max:191',
            'features' => 'required|min:3|max:191',
            'display' => 'required|min:3|max:191',
            'capacity' => 'required|max:191',
            'price' => 'required|max:191',
            'os' => 'required|min:3|max:191',
            'date' => 'required',
            'cpu_rank'      => 'required',
            'gpu_rank'      => 'required',
            'memory_rank'   => 'required',
            'ux_rank'       => 'required',
            'total'         => 'required',
            
        ]);
       
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $image=$base_url.'/image/'.$name;
        }
       
         // dd($request);
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
              'youtube'         => request('youtube'),
              'cpu_rank'        => request('cup_rank'),
            'gpu_rank'          => request('gpu_rank'),
            'memory_rank'       => request('memory_rank'),
            'ux_rank'           => request('ux_rank'),
            'total'             => request('total'),
              
        ]);


        return redirect()->route('specification.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specification = Specification::find($id);
        $categories = Category::all();
        return view('specification.edit',compact('specification','categories'));
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
         $base_url = "http://mobile.khaingthinkyi.me/";
        $request->validate([

            'category_id' => 'required',
            'cpu' => 'required|max:191',
            'memory' => 'required|max:191',
            'main_camera' => 'required|min:3|max:191',
            'selfie_camera' => 'required|min:3|max:191',
            'battery' => 'required|max:191',
            'features' => 'required|min:3|max:191',
            'display' => 'required|max:191',
            'capacity' => 'required|max:191',
            'price' => 'required|max:191',
            'os' => 'required|min:3|max:191',
            'date' => 'required',
            'cpu_rank'      => 'required',
            'gpu_rank'      => 'required',
            'memory_rank'   => 'required',
            'ux_rank'       => 'required',
            'total'         => 'required',
        ]);
        
        // dd($request);
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $image= $base_url.'/image/'.$name;
        }else{
            $image = request('old_image');
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
        $specificates->image = $image;
        $specificates->os = request('os');
        $specificates->date = request('date');
        $specificates->review = request('review');
        $specificates->youtube = request('youtube');
        $specificates->cpu_rank      = request('cpu_rank');
        $specificates->gpu_rank      = request('gpu_rank');
        $specificates->memory_rank   = request('memory_rank');
        $specificates->ux_rank       = request('ux_rank');
        $specificates->total         = request('total');
        $specificates->save();   


        return redirect()->route('specification.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
