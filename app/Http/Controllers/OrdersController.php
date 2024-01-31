<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Http\Resources\OrdersResource;
use App\Models\Orders;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function get(): OrdersResource
    {
        $data = Orders::all()->first();
        if (Orders::all()->count() == 0) {
            throw new HttpResponseException(response(['errors' => ["message" => ["data not found"]]], 404));
        }

        return new OrdersResource($data);
    }

    public function create(OrdersRequest $request): JsonResponse
    {
        $data = $request->validated();
        if (Orders::where('number', $data['number'])->count() == 1) {
            throw new HttpResponseException(response(['errors' => ["number" => ["number already exist"]]], 400));
        }
        $orders = new Orders($data);
        $orders->save();

        return (new OrdersResource($orders))->response()->setStatusCode(201);
    }

    public function delete(int $id): JsonResponse
    {
        $orders = Orders::where('id', $id)->first();
        if (!$orders) {
            throw new HttpResponseException(response(['errors' => ["message" => ["data not found"]]], 404));
        }
        $orders->delete();

        return response()->json(['message' => 'Orders Success Deleted'])->setStatusCode(200);
    }
}
