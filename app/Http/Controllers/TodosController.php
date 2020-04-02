<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index()
    {
        return DB::table('todos')->get();
    }

    public function store(Request $request)
    {
        DB::table('todos')->insert([
            'name' => $request->name,
        ]);
        return 'true';
    }
    public function update(Request $request,$id)
    {
        return DB::table('todos')->where('id',$id)->update([
            'name' => $request->name
        ]);
    }
    public function view($id)
    {
        return json_encode(DB::table('todos')->where('id',$id)->first());
    }
    public function destroy($id)
    {
        return DB::table('todos')->where('id',$id)->delete();
    }

    //
}
