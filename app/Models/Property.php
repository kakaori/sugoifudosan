<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Property extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'property_type', 'property_name', 
        'sale_price', 'gross_yield', 'expected_annual_income', // 新しいカラムを追加
        'location', 'transport_company', 'transport_line', 'line_station', 'walk', // 新しいカラムを追加
        'occupied_area', 'building_structure', 'construction_date', 'floor', 'land_right', // 新しいカラムを追加
        'building_area', 'land_area' // 不要なカラムを削除
    ];

    public function partner()
    {
      return $this->belongsTo(Partner::class);
    }
}
