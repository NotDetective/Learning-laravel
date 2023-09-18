<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

//    protected $guarded = [];
    protected $fillable = ['title', 'description', 'due_date', 'completed_at', 'slug', 'user_id'];



    public function scopeFilters($query, $column, $direction)
    {
//        , array $filters
//        if ($filters['search'] ?? false) {
//            $query
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('description', 'like', '%' . request('search') . '%');
//        }

        $direction = $direction == 'ASC' ? 'ASC' : 'DESC';
        if ($column) {
            $query->orderby($column, $direction);
        }
        else{
            $query->latest();
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
