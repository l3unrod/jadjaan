<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            
            // ข้อมูลพื้นฐาน
            $table->string('name');
            $table->string('email');
            $table->string('nation')->nullable();
            $table->string('age_group')->nullable();
            $table->string('gender')->nullable();
            $table->string('household_type')->nullable();
            $table->string('other_household')->nullable();
            $table->string('thai_food_frequency')->nullable();
            $table->string('where_eat')->nullable();
            $table->string('other_where_eat')->nullable();
            $table->string('cooked_thai_food')->nullable();
            
            // Section 1-4
            $table->json('appeal')->nullable();        // เปลี่ยนจาก text เป็น json
            $table->string('other_appeal')->nullable();
            $table->json('thai_dishes')->nullable();   // เปลี่ยนจาก text เป็น json
            $table->string('other_thai_dishes')->nullable();
            $table->string('purchase_location')->nullable();
            $table->string('other_purchase_location')->nullable();
            $table->string('willing_to_spend')->nullable();
            
            // Section 5: Ready-to-Cook Thai Products Feedback
            $table->json('challenges')->nullable();    // เปลี่ยนชื่อและประเภทจาก cooking_challenges
            $table->string('other_challenges')->nullable(); // เพิ่มฟิลด์ใหม่
            $table->string('buy_ready_to_cook')->nullable(); // เปลี่ยนชื่อและประเภทจาก ready_to_cook enum
            $table->json('brand_choice')->nullable();  // เปลี่ยนชื่อและประเภทจาก brand_preference
            $table->string('other_brand_choice')->nullable(); // เพิ่มฟิลด์ใหม่
            
            // Section 6: Ready-to-Cook Jad Jaan Products
            $table->json('menu_items')->nullable();    // เปลี่ยนชื่อและประเภทจาก jad_jaan_menu_item
            $table->string('flavors')->nullable();     // เปลี่ยนชื่อและประเภทจาก flavor_description enum
            $table->string('other_flavors')->nullable(); // เพิ่มฟิลด์ใหม่
            $table->string('packaging_size')->nullable(); // เปลี่ยนชื่อและประเภทจาก ideal_packaging_size enum
            $table->string('other_packaging_size')->nullable(); // เพิ่มฟิลด์ใหม่
            $table->text('suggestions')->nullable();   // เปลี่ยนชื่อจาก improvements_suggestion
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_responses');
    }
};