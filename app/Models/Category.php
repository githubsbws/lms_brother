<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id'; // ระบุชื่อ primary key
    protected $fillable = [
        'cate_title',
        'cate_short_detail',
        'cate_detail',
        'cate_image',
        // 'create_date',
        // 'update_date',
    ];
    public $timestamps = false;
    // ความสัมพันธ์ One-to-Many กับ Filecategory
    public function filecategories()
    {
        return $this->hasMany(Filecategory::class, 'category_id', 'cate_id');
    }
    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->update_date = now();
        });
    }
}