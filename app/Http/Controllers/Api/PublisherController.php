<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Modules\Publisher\PublisherService;
use App\Http\Requests\PublisherValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{

    protected PublisherService $service;

    public function __construct(PublisherService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $publishers = $this->service->getAllPublishers();
        $available = $publishers->count();

        if ($available)
        {
            return response()->json([
                'status' => 200,
                'data' => $publishers
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'error_msg' => 'Publisher is not available'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);

        if ($validated->fails())
        {
            return response()->json([
                'status' => 422,
                'error_msg' => 'Data is not in a correct format!'
            ], 422);
        }
        else
        {
            $this->service->create($request->all());
            return response()->json([
                'status' => 200,
                'data' => 'Publisher is successfully created!'
            ], 200);
        }
    }

    public function show($id)
    {
        $found = $this->service->getPublisherById($id);
        if ($found)
        {
            return response()->json([
                'status' => 200,
                'data' => $found
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'error_msg' => 'Publisher Not Found!'
            ], 404);
        }
    }

    public function update($id, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);

        if ($validated->fails())
        {
            return response()->json([
                'status' => 422,
                'error_msg' => 'Data is not in a correct format!'
            ], 422);
        }
        else
        {
            $this->service->create($request->all());
            return response()->json([
                'status' => 200,
                'data' => 'Publisher is successfully created!'
            ], 200);
        }

        $found = $this->service->getPublisherById($id);
        if ($found)
        {
            $this->service->update($id, $found);
            return response()->json([
                'status' => 200,
                'data' => $found
            ], 200);    

        }
        else
        {
            return response()->json([
                'status' => 404,
                'error_msg' => 'Publisher Not Found!'
            ], 404);
       
        }
    }

    public function delete($id)
    {
        $found = $this->service->getPublisherById($id);
        if ($found)
        {
            $this->service->delete($id);
            return response()->json([
                'status' => 200,
                'mesg' => 'Publisher is successfully deleted!'
            ], 200);    
        }
        else
        {
            return response()->json([
                'status' => 404,
                'error_msg' => 'Publisher Cannot be Deleted!'
            ], 404);
        }
    }
}
