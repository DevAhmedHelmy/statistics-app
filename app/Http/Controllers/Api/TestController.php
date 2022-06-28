<?php

namespace App\Http\Controllers\Api;

use Validator;
use Carbon\Carbon;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->only(['name']);
        if(gettype($input['name']) == 'array'){
            return $this->storeArray($request);
        }
        $validate_data = [
            'name' => 'required|string|min:4',
        ];
        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        $test = Test::create([
            'name' => $input['name'],
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Test created successfully.',
            'data' => $test
        ]);
    }


    private function storeArray($request)
    {
        $input = $request->only(['name']);
        $validate_data = [
            'name' => 'array|required',
            'name.*' => 'required|string|min:4',
        ];
        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }
        $now = Carbon::now();
        $data = collect($input['name'])->map(function ($item) use ($now) {
            return [
                'name' => $item,
                'created_at' =>$now,
                'updated_at' =>$now,
            ];
        });
        Test::insert($data->toArray());
        return response()->json([
            'success' => true,
            'message' => 'Test created successfully.',

        ]);
    }
}
