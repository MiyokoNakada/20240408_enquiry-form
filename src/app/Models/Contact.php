<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'last_name', 'first_name', 'gender', 'email', 'tell', 'address', 'building', 'detail'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //検索用のローカルスコープ
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
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }
    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }
    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->where('created_at', $date);
        }
    }
    



}
