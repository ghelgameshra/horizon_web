<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];
    protected $with = ['category', 'kategori'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('price', 'like', '%'.$search.'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category );
            });
        });

        // $query->when($filters['author'] ?? false, fn($query, $author)
        //         => $query->whereHas('author', fn($query)
        //         => $query->where('username', $author)
        //         )
        //     ); 

        $query->when($filters['kategori'] ?? false, fn($query, $kategori)
                => $query->whereHas('kategori', fn($query)
                => $query->where('name', $kategori)
                )
            ); 


    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function kategori(){
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function  getRouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
