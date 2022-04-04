<?php

namespace App\Http\Resources;

use App\Models\Zanr;
use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $zanr = Zanr::find($this->zanrId);

        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'autor' => $this->autor,
            'zanr' => $zanr->zanr,
            'procitano' => $this->procitano,
            'ocena' => $this->ocena
        ];
    }
}
