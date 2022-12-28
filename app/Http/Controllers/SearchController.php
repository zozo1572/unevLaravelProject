<?php

namespace App\Http\Controllers;

use App\Models\Expert;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search()

    {

             //return view('search');

      $search=Expert::select('name','experience','info')
       ->get();

       return response($search,200);


    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function autocomplete(Request $request)

    {

        $data = Expert::select("name",'experience')

                   ->where('name', 'LIKE', '%'. $request->get('query'). '%')

                    ->get();



        return response()->json($data);

    }
}
