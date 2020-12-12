<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
                'source' => 'title'
            ]
        ];
    }


    protected $fillable=['title','parent_id'];


    public function products()
    {
        return$this->belongsToMany(Product::class);
    }

    public function getParentName()
    {
        if ($this->parent_id != 0){
            $parent=Category::whereId($this->parent_id)->first();
            return $parent->title;
        }else
            return "دسته اصلی";

    }
}
