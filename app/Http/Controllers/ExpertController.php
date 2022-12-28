<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return   response()-> view('blog.index',[
        'experts'=>Expert::OrderBy('name','desc')->get()
       ]);


       $expert=Expert::select('name','experience','info')->get();

      // return response()->json([
        // 'message'=>'Done',
         //'data'=>$expert
       //]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('blog.create');


       // return response()->json([
         //   'name'=>'required',
           // 'info'=>'required',
           // '//experience'=>'required',
            //'available_time'=>'required',
            //'image'=>''
        //]);
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
            'name'=>'required|unique:experts|max:255',
            'experience'=>'required',
            'info'=>'required',
            'availabe_time'=>'required',
            'image'=>['required','mimes:jpg,png,jpeg','max:5048'],
            'rank'=>' min:1|max:10'
         ]);


        Expert::create([
        'name'=>$request->name,
        'experience'=>$request->experience,
        'info'=>$request->info,
        'available_time'=>$request->available_time,
        'rank'=>$request->rank,
        'image_path'=>$this->storeImage($request)
          ]);

          return  redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       return view('blog.show',[
          'expert'=>Expert::findOrFail($id)
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return  view('blog.edit',[
        'expert'=>Expert::where('id',$id)->first()
        ]);

    //   $expert=Expert::where('id',$id)->first();
      // return response($expert,200);
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
            'name'=>'required|max:255|unique:experts,name,' .$id,
            'experience'=>'required',
            'info'=>'required',
            'availabe_time'=>'required',
            'image'=>['mimes:jpg,png,jpeg','max:5048'],
            'rank'=>' min:1|max:10'
         ]);

       $expert= Expert::where('id',$id)->update($request->except([
            '_token','-method'
        ]));
        //return redirect(route('blog.index'));

        return response($expert,200);
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


      private function storeImage($request)
      {
        $newImageName=uniqid() . '-' . $request -> title . '-' .
        $request -> image -> extension();

        return   $request -> image ->move(public_path('images'),$newImageName);
      }
}
