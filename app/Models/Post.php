<?php

namespace App\Models;

use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail', 'status'];

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag', 'post_id', 'tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function scopeActive($request)
    {
        return $request->where('status', 1);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('M d,Y');
    }

    public function getImage()
    {
        return $this->thumbnail ? asset("/images/{$this->thumbnail}") : asset('default.jpg');
    }

    public static function uploadImage(PostRequest $request, $oldImage = null)
    {
        if ($request->hasFile('thumbnail')){
            if ($oldImage) Storage::delete($oldImage);
            $dir = date('Y-m-d');
            $path = $request->file('thumbnail')->store($dir);
            return $path;
        }
        return null;
    }

    public static function toggleStatus(PostRequest $request, $data)
    {
        if ($request->has('status')){
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        return $data;
    }

}
