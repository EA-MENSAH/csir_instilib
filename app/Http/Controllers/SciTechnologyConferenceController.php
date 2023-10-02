<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\sci_technology_conference;


class SciTechnologyConferenceController extends Controller
{
    public function index(){
        $sci_technology_conference =  sci_technology_conference::all();
        return response()->json($sci_technology_conference, 200);
    }

    public function show($id){
        $sci_technology_conference =  sci_technology_conference::where('id', $id)->first();
        return response()->json($sci_technology_conference, 200);

    }

    public function destroy($id){
        $sci_technology_conference =  sci_technology_conference::where('id', $id)->delete();
        return response()->json($sci_technology_conference, 200);
    }

    public function search($input){
        $result = sci_technology_conference::where('title','like','%'.$input.'%')
        ->orWhere('comments','like','%'.$input.'%')
        ->orWhere('facilitator','like','%'.$input.'%')
        ->orderBy('id')->get();

        return response()->json($result, 200);
    }

    public function create(request $request){
        $fields = $request->validate([
            'title'=>'required|string',
            'date'=>'required|date',
            'summary'=>'required|string',
            'facilitator'=>'required|string',
            'info_src'=>'required|string',
            'comments'=>'required|string'
        ]);

        $sci_technology_conference = sci_technology_conference::create($fields);

        return response()->json($sci_technology_conference, 200);
    }

    public function update(request $request, $id){
        $fields = $request->validate([
            'title'=>'nullable|string',
            'date'=>'nullable|date',
            'summary'=>'nullable|string',
            'facilitator'=>'nullable|string',
            'info_src'=>'nullable|string',
            'comments'=>'nullable|string'
        ]);

        $sci_technology_conference = sci_technology_conference::where('id',$id)->update($fields);

        return response()->json($sci_technology_conference, 200);
    }
}
