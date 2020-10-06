<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentUserResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'contenu' => $this->content,
            'commentaire_date' => $this->updated_at,
            // 'user' => [
            //     'id' => $this->user->id,
            //     'name' => $this->user->name,
            //     ]
            'user' => new CommentUserResource($this->whenLoaded('user'))
        ];
    }
}
