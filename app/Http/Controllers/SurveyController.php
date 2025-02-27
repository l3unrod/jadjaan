<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    // ฟังก์ชันสำหรับแสดงฟอร์ม Survey
    public function showSurveyForm()
    {
        return view('survey1');  // ส่งไปที่ view 'survey1'
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูล survey (ถ้าต้องการ)
    public function storeSurveyData(Request $request)
    {
        // บันทึกข้อมูลที่ได้รับจากฟอร์ม
        // คุณสามารถทำการ validate ข้อมูลที่นี่ก่อนบันทึกลงในฐานข้อมูล

        return redirect()->route('survey1');  // หรือหน้าอื่นหลังจากบันทึก
    }
}
