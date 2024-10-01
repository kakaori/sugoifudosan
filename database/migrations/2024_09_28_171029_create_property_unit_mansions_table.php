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
        Schema::create('property_unit_mansions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained();

            $table->string('property_type')->default('1棟マンション');            
            $table->string('property_name', 30)->nullable(); // 物件名カラム

            $table->decimal('price', 10, 2); // 販売価格(税込)
            $table->boolean('disable_discount_mark_flag')->default(false); // 値下げマーク表示フラグ
            $table->decimal('monthly_income', 10, 2)->nullable(); // 想定年間収入
            $table->decimal('gross_return', 5, 2)->nullable(); // 表面利回り

            // 所在地関連のカラムを追加
            $table->foreignId('prefecture_id')->nullable(); // 都道府県ID
            $table->foreignId('city_id')->nullable(); // 市区郡ID
            $table->string('address', 50)->nullable(); // 町村番地

            // 交通情報関連のカラムを追加
            $table->string('property_station_1_line_id')->nullable(); // 最寄り駅1の路線ID
            $table->string('property_station_1_station_id')->nullable(); // 最寄り駅1の駅ID
            $table->integer('property_station_1_way_type')->nullable(); // 最寄り駅1の移動手段
            $table->integer('property_station_1_way_minutes')->nullable(); // 最寄り駅1の所要時間

            $table->string('property_station_2_line_id')->nullable(); // 最寄り駅2の路線ID
            $table->string('property_station_2_station_id')->nullable(); // 最寄り駅2の駅ID
            $table->integer('property_station_2_way_type')->nullable(); // 最寄り駅2の移動手段
            $table->integer('property_station_2_way_minutes')->nullable(); // 最寄り駅2の所要時間

            $table->string('property_station_3_line_id')->nullable(); // 最寄り駅3の路線ID
            $table->string('property_station_3_station_id')->nullable(); // 最寄り駅3の駅ID
            $table->integer('property_station_3_way_type')->nullable(); // 最寄り駅3の移動手段
            $table->integer('property_station_3_way_minutes')->nullable(); // 最寄り駅3の所要時間

            $table->string('other_access')->nullable(); // その他交通情報

            $table->integer('structure_type')->nullable(); // 建物構造

            // 階数関連のカラムを追加
            $table->integer('story')->nullable(); // 地上階数
            $table->integer('story_base')->nullable(); // 地下階数

            // 築年月関連のカラムを追加
            $table->year('completion_year')->nullable(); // 築年
            $table->integer('completion_month')->nullable(); // 築月
            $table->boolean('new_built_flag')->default(false); // 新築フラグ

            // 建物面積関連のカラムを追加
            $table->decimal('building_area', 10, 2)->nullable(); // 建物面積をdecimal型で追加

            // 間取り関連のカラムを追加
            $table->integer('layout_amount')->nullable(); // 間取り1の数
            $table->string('layout_type')->nullable(); // 間取り1のタイプ
            $table->integer('layout_rooms')->nullable(); // 間取り1の戸数

            $table->integer('layout2_amount')->nullable(); // 間取り2の数
            $table->string('layout2_type')->nullable(); // 間取り2のタイプ
            $table->integer('layout2_rooms')->nullable(); // 間取り2の戸数

            $table->string('layout')->nullable(); // その他の間取り情報

            // 住戸専有面積関連のカラムを追加
            $table->decimal('footprint_min', 10, 2)->nullable(); // 最小住戸専有面積
            $table->decimal('footprint_max', 10, 2)->nullable(); // 最大住戸専有面積
            $table->boolean('footprint_unknown_flag')->default(false); // 専有面積不明フラグ

            // 総戸数関連のカラムを追加
            $table->integer('number_of_houses')->nullable(); // 総戸数

            // 住戸数関連のカラムを追加
            $table->integer('number_of_dwelling_houses')->nullable(); // 住戸数

            // 駐車場関連のカラムを追加
            $table->string('parking', 100)->nullable(); // 駐車場情報

            // 建築確認番号関連のカラムを追加
            $table->string('confirming_letter_number', 50)->nullable(); // 建築確認番号

            // 土地面積関連のカラムを追加
            $table->string('land_area_type')->nullable(); // 土地面積の種類（公簿/実測）
            $table->decimal('land_area', 10, 2)->nullable(); // 土地面積を保存するカラム

            // 土地権利関連のカラムを追加
            $table->integer('land_certificate_type')->nullable(); // 土地権利の種類

            // 地目関連のカラムを追加
            $table->integer('land_category')->nullable(); // 地目を保存するカラム

            // 都市計画区域関連のカラムを追加
            $table->integer('city_planning_area_type')->nullable(); // 都市計画区域を保存するカラム

            // 用途地域関連のカラムを追加
            $table->string('use_district_type')->nullable(); // 用途地域を保存するカラム

            // 建ペイ率関連のカラムを追加
            $table->decimal('coverage', 5, 2)->nullable(); // 建ペイ率を保存するカラム

            // 容積率関連のカラムを追加
            $table->decimal('capacity', 5, 2)->nullable(); // 容積率を保存するカラム

            // 国土法届出関連のカラムを追加
            $table->boolean('notification_type')->nullable(); // 国土法届出の要否を保存するカラム

            // 接道状況関連のカラムを追加
            $table->string('sidewalk_direction_type')->nullable(); // 接道方角1
            $table->decimal('sidewalk_wide')->nullable(); // 接道幅員1
            $table->boolean('sidewalk_public_flag')->default(false); // 接道が公道

            $table->string('sidewalk_direction_type2')->nullable(); // 接道方角2
            $table->decimal('sidewalk_wide2')->nullable(); // 接道幅員2
            $table->boolean('sidewalk_public2_flag')->default(false); // 接道2が公道かどうか

            $table->string('sidewalk_situation')->nullable(); // その他接道状況

            // 再建築不可フラグを追加
            $table->boolean('unreconstructible_flag')->default(false); // 再建築不可のフラグ

            // 私道負担面積を追加
            $table->decimal('driveway_burden_area', 10, 2)->nullable(); // 私道負担面積を保存するカラム

            // 管理番号を追加
            $table->string('realtor_property_code', 20)->nullable(); // 管理番号を保存するカラム

            // 取引態様関連のカラムを追加
            $table->integer('transaction_type')->nullable(); // 取引態様を保存するカラム

            // 元付け業者関連のカラムを追加
            $table->string('source')->nullable(); // 元付け業者名を保存するカラム
            $table->string('source_adviser_name', 20)->nullable(); // 元付け業者担当者名を保存するカラム
            $table->string('source_phone_number', 20)->nullable(); // 元付け業者電話番号を保存するカラム
            $table->date('source_confirmed_date')->nullable(); // 広告承諾確認日を保存するカラム

            // 次回更新予定日を追加
            $table->date('next_update_date')->nullable(); // 次回更新予定日を保存するカラム

            // メモを追加
            $table->string('memo', 500)->nullable(); // メモを保存するカラム

            ////////PR情報
            // 現況を追加
            $table->string('present_condition', 10)->nullable(); // 現況

            // 引渡に関するカラムを追加
            $table->integer('delivery_type')->nullable(); // 引渡の種類を保存するカラム

            // PRポイントを追加
            $table->string('pr_point', 1000)->nullable(); // PRポイントを保存するカラム

            // 注意事項を追加
            $table->string('notice', 500)->nullable(); // 注意事項を保存するカラム

            ////////物件の画像
            $table->json('images')->nullable(); // 画像を保存するカラム（JSON形式）

            // 楽待掲載ステータスを追加
            $table->integer('rakumachi_publication_status')->nullable(); // 掲載ステータス

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_unit_mansions');
    }
};