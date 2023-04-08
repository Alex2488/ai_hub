<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'slug', 'title', 'developer', 'release_date', 'logo', 'image', 'link_to_service','category_id','excerpt','main_content', 'is_published'
    ];

    protected $withCount = ['likedUsers'];


    public function scopeFilter ($query, array $filters) {

        $query -> when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query)=>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
            )

        );

        $query -> when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category))



//                ->whereExists(fn($query)  =>
//                $query->from('categories')
//                    ->whereColumn ('categories.id', 'services.category_id')
//                    ->where ('categories.slug', $category)
//                );
        );

    }



    public function category () {
        return $this -> belongsTo(Category::class);

    }

    public function comments (){
        return $this->hasMany(Comment::class);
    }

    public function likedUsers() {
        return $this->belongsToMany(User::class, 'service_user_likes', 'service_id', 'user_id');
    }








}
