<?php

namespace App\Http\Resources;

use App\Models\ServiceHeaders;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DynamicRenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $serviceHeaders = ServiceHeaders::where('status', 'ACTIVE')->get();
        if (!$serviceHeaders) {
            throw new HttpResponseException(response()->json([
                'code' => 404,
                'status' => 'failed',
                'errors' => ['message' => ['service header not found']]
            ])->setStatusCode(404));
        }
        if ($this->id != null) {
            $data = [
                'order_id' => $this->id,
                'order_no' => $this->number,
                'services' => new ServiceHeadersCollection($serviceHeaders),
                'services_json' => new ServiceJsonCollection($serviceHeaders),
            ];
        } else {
            $data = [
                'order_id' => null,
                'order_no' => null,
                'services' => new ServiceHeadersCollection($serviceHeaders),
                'services_json' => new ServiceJsonCollection($serviceHeaders),
            ];
        }
        return $data;
    }
}
