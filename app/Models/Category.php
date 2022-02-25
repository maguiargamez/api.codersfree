<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    //Relación uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopeIncluded(Builder $query)
    {
        $relations = explode(',', request('included')); // ['posts','relacion']
        $query->with($relations);
    }
}
