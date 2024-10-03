<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained()->nullable();

            // 新しいカラムの追加（全てnullable）
            $table->string('property_type')->nullable(); // 物件種別
            $table->string('property_name')->nullable(); // 物件名
            $table->decimal('sale_price', 15, 2)->nullable(); // 販売価格
            $table->decimal('gross_yield', 5, 2)->nullable(); // 表面利回り
            $table->decimal('expected_annual_income', 15, 2)->nullable(); // 想定年間収入
            $table->string('location')->nullable(); // 所在地
            $table->string('transport_company')->nullable(); // 交通：会社
            $table->string('transport_line')->nullable(); // 交通：沿線
            $table->string('line_station')->nullable(); // 沿線：駅
            $table->integer('walk')->nullable(); // 徒歩
            $table->decimal('occupied_area', 10, 2)->nullable(); // 占有面積
            $table->string('building_structure')->nullable(); // 建物構造
            $table->date('construction_date')->nullable(); // 築年月
            $table->integer('floor')->nullable(); // 所在階
            $table->string('land_right')->nullable(); // 土地権利
            $table->decimal('building_area', 10, 2)->nullable(); // 建物面積（㎡）
            $table->decimal('land_area', 10, 2)->nullable(); // 土地面積（㎡）

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
