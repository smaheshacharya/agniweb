<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;


class AutocompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            // $data = DB::table('countries')
            // ->where('name','LIKE','%'.$query.'%')->get();
            $data = Country::where('name', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu"
            style="display:block;
            position:relative">';
            foreach($data as $row)
            {
                $output .= '<li><a href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;

        }
    }

}
