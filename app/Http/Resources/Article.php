<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Article extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->_id,
            'title' => $this->title,
            'intro' => $this->intro,
            'img' => $this->img,
            'category' => $this->category,
            'slug' => $this->slug,
            'created_at' => $this->created_at
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://www.figured.com')
        ];
    }
}
