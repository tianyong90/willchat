<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
    ];

    protected $dates = ['published_at'];

//    /**
//     * 根据title自动生成slug.
//     *
//     * @param $value
//     */
//    public function setTitleAttribute($value)
//    {
//        $this->attributes['title'] = $value;
//
//        if (!$this->exists) {
//            $this->attributes['slug'] = str_slug($value);
//        }
//    }
}
