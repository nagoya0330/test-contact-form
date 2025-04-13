<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getNameAttribute()
    {
    return $this->first_name . ' ' . $this->last_name;
    }
    public function getGenderLabelAttribute()
    {
    return $this->gender === 0 ? '男性' : '女性';
    }
}
