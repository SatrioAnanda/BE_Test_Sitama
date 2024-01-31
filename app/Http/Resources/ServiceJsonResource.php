<?php

namespace App\Http\Resources;

use App\Models\ServiceDetails;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceJsonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $serviceDetails = ServiceDetails::where('service_id', $this->id)->get();
        if (!$serviceDetails) {
            throw new HttpResponseException(response()->json([
                'code' => 404,
                'status' => 'failed',
                'errors' => ['message' => ['service detail not found']]
            ])->setStatusCode(404));
        }
        return [
            'service_id' => ['id' => $this->id, 'service_name' => $this->service_name],
            'json' => ServiceDetailsResource::collection($serviceDetails),
        ];
    }
}
