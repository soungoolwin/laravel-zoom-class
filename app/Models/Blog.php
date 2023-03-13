<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   protected $with=['category','author'];

   public function scopeFilter($query,$filters){

      $query->when($filters['search'] ?? false, function($query, $search){
         $query->where(function($query) use ($search) {
            $query->where('title','LIKE', '%'.$search.'%')
                         ->orWhere('body','LIKE', '%'.$search.'%');
         });
     });
     $query->when($filters['category'] ?? false, function($query, $slug){
      $query->whereHas('category', function(Builder $query) use ($slug){
         $query->where(function($query) use ($slug){
            $query->where('slug',$slug);
         });
      });
  });

  $query->when($filters['author'] ?? false, function($query, $username){
   $query->whereHas('author', function(Builder $query) use ($username){
      $query->where(function($query) use ($username){
         $query->where('username',$username);
      });
   });   
});
   }
     public function category(){
        return $this->belongsTo(Category::class);
     }

     public function author(){
      return $this->belongsTo(User::class, 'user_id');
     }

     public function comments(){
      return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
     }

     public function subscribers(){
      return $this->belongsToMany(User::class);
     }
    use HasFactory;
}


