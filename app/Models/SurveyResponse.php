<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;

    // กำหนดชื่อของตารางให้ตรง
    protected $table = 'survey_responses';

    // กำหนดคอลัมน์ที่สามารถใส่ข้อมูลได้
    protected $fillable = [
        // ข้อมูลพื้นฐาน
        'name',
        'email',
        'nation',
        'age_group',
        'gender',
        'household_type',
        'other_household',
        'thai_food_frequency',
        'where_eat',
        'other_where_eat',
        'cooked_thai_food',
        'appeal',
        'other_appeal',
        'thai_dishes',
        'other_thai_dishes',
        'purchase_location',
        'other_purchase_location',
        'willing_to_spend',

        // Section 5
        'challenges',
        'other_challenges',
        'buy_ready_to_cook',
        'brand_choice',
        'other_brand_choice',

        // Section 6
        'menu_items',
        'flavors',
        'other_flavors',
        'packaging_size',
        'other_packaging_size',
        'suggestions'
    ];

    // กำหนดการแปลงค่าให้กับฟิลด์ที่มีข้อมูลเป็น array หรือ JSON
    protected $casts = [
        'appeal' => 'array',
        'thai_dishes' => 'array',
        'challenges' => 'array',
        'brand_choice' => 'array',
        'menu_items' => 'array',
    ];

    // กำหนดคอลัมน์ที่ต้องแปลงเป็นวันและเวลา
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // หากต้องการใช้ query scopes หรือ methods อื่น ๆ สามารถเพิ่มได้
}
