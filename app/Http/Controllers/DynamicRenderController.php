<?php

namespace App\Http\Controllers;

use App\Http\Resources\DynamicRenderResource;
use App\Http\Resources\FrontServiceResource;
use App\Models\Orders;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DynamicRenderController extends Controller
{
    public function getByOrder(int $id): JsonResponse
    {
        $orders = Orders::where('id', $id)->first();

        if ($orders) {
            $data = new DynamicRenderResource($orders);
        } else {
            throw new HttpResponseException(response()->json([
                'code' => 404,
                'status' => 'failed',
                'errors' => ['message' => ['data not found']]
            ])->setStatusCode(404));
        }
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $data,

        ])->setStatusCode(200);
    }
}
