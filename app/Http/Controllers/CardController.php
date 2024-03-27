<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecardRequest;
use App\Http\Requests\UpdatecardRequest;
use App\Models\card;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {
        $cards = card::all();
        if($cards->count() > 0){
            return response()->json([
                'ye' => $cards->count(),
                'status' => 200,
                'cards' => $cards
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No records found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'company' => 'required',
            'title' => 'required',
            'coordinates' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'error_message' => $validator->messages()
            ], 422);
        }else
        {
            $cards = card::create([
                'name' => $request->name,
                'company' => $request->company,
                'title' => $request->title,
                'coordinates' => $request->coordinates,
            ]);
        }
        if($cards){
            return response()->json([
                'status' => 200,
                'cards'=> $cards,
            ], 200);
        }else
        {
            return response()->json([
                'status' => 510,
                'error_message'=> "error",
            ], 500);
        }
    }

    public function update($card)
    {
        $update = card::find($card);
        return 'coming soon';
    }

    public function find($card)
    {
        // if(!$card){
        //     return "huh";
        // }
        $search = card::find($card);
        if($search == NULL){
            return response()->json([
                "status" => 404,
                "error_message" => "Card id not found"
            ], 404);
        }else{
            return $search;
        }
    }

    public function destroy($card)
    {
        $delete = card::where('id', $card);
        $delete->delete();
    }
}
