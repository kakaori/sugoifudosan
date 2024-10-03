<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PropertyUnitMansion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['property_type', 'property_name', 'price', 'disable_discount_mark_flag', 'monthly_income', 'gross_return', 'prefecture_id', 'city_id', 'address', 'property_station_1_line_id', 'property_station_1_station_id', 'property_station_1_way_type', 'property_station_1_way_minutes', 'property_station_2_line_id', 'property_station_2_station_id', 'property_station_2_way_type', 'property_station_2_way_minutes', 'property_station_3_line_id', 'property_station_3_station_id', 'property_station_3_way_type', 'property_station_3_way_minutes', 'other_access', 'structure_type', 'story', 'story_base', 'completion_year', 'completion_month', 'new_built_flag', 'building_area', 'layout_amount', 'layout_type', 'layout_rooms', 'layout2_amount', 'layout2_type', 'layout2_rooms', 'layout', 'footprint_min', 'footprint_max', 'footprint_unknown_flag', 'number_of_houses', 'number_of_dwelling_houses', 'parking', 'confirming_letter_number', 'land_area_type', 'land_area', 'land_certificate_type', 'land_category', 'city_planning_area_type', 'use_district_type', 'coverage', 'capacity', 'notification_type', 'sidewalk_direction_type', 'sidewalk_wide', 'sidewalk_public_flag', 'sidewalk_direction_type2', 'sidewalk_wide2', 'sidewalk_public2_flag', 'sidewalk_situation', 'unreconstructible_flag', 'driveway_burden_area', 'realtor_property_code', 'transaction_type', 'source', 'source_adviser_name', 'source_phone_number', 'source_confirmed_date', 'next_update_date', 'memo', 'present_condition', 'delivery_type', 'pr_point', 'notice', 'images', 'rakumachi_publication_status'];

    public function propertyunitmansion()
    {
      return $this->belongsTo(PropertyUnitMansion::class);
    }  

}
