<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if ($gender != "null" && $gender != "4") {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategotySearch($query, $category_id)
    {
        if ($category_id != "null") {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if ($date != null) {
            $query->where('created_at', 'like', $date . '%');
        }
    }
}
