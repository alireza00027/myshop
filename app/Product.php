<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    protected $fillable=[
        'name',
        'description',
        'slug'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function path()
    {
        return "/products/$this->slug";
    }



}
