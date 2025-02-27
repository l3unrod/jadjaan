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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('country');
            $table->string('email');
            $table->string('phone');
            $table->text('message')->nullable();
            
            // ข้อมูลบริษัท
            $table->boolean('has_company')->default(false);
            $table->string('company')->nullable();
            $table->string('business_type')->nullable();
            
            // ข้อมูลเกี่ยวกับการนัดหมายในงาน Foodex Japan
            $table->string('foodex_meeting')->nullable(); // 'Yes' หรือ 'No'
            $table->string('meeting_location')->nullable(); // สำหรับ Foodex Meeting
            $table->string('location_details')->nullable(); // รายละเอียดสถานที่เพิ่มเติม
            $table->date('meeting_date')->nullable();
            $table->string('meeting_time1')->nullable();
            
            // ข้อมูลสำหรับกรณีที่ไม่สามารถนัดหมายในงาน Foodex Japan
            $table->string('no_meeting_preference')->nullable(); // 'online_meeting' หรือ 'company_info'
            $table->date('online_meeting_date')->nullable();
            $table->string('online_meeting_time')->nullable();
            $table->string('company_email_confirmation')->nullable();
            $table->text('specific_info_request')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};