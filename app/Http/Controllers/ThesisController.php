<?php

namespace App\Http\Controllers;

use App\Models\thesis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ThesisController extends Controller
{
    public function index(){
        $thesis =  thesis::all();
        return response()->json($thesis, 200);
    }

    public function show($id){
        $thesis =  thesis::where('id', $id)->first();
        return response()->json($thesis, 200);
    }

    public function destroy($id){
        $thesis =  thesis::where('id', $id)->delete();
                return response()->json($thesis, 200);
    }

    public function search($input){
        $result = thesis::where('title','like','%'.$input.'%')
        ->orWhere('authors','like','%'.$input.'%')
        ->orWhere('affiliate_inst','like','%'.$input.'%')
        ->orderBy('id')->get();

        return response()->json($result, 200);
    }

    public function create(request $request){
        $fields = $request->validate([
            'title'=>'required|string',
            'authors'=>'required|string',
            'date'=>'required|date',
            'yr_publication'=>'required|string',
            'affiliate_inst'=>'required|string',
            'no_copies'=>'required|string',
            'summary'=>'required|string',
            'accession_no'=>'required|string',
        ]);

        $thesis = thesis::create($fields);

        return response()->json($thesis, 200);
    }

    public function update(request $request, $id){
        $fields = $request->validate([
            'title'=>'nullable|string',
            'authors'=>'nullable|string',
            'date'=>'nullable|date',
            'summary'=>'nullable|string',
            'yr_publication'=>'nullable|string',
            'affiliate_inst'=>'nullable|string',
            'no_copies'=>'nullable|string',
            'accession_no'=>'nullable|string',
        ]);

        $thesis = thesis::where('id',$id)->update($fields);

        return response()->json($thesis, 200);
    }

}
