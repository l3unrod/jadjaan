<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    /**
     * แสดงหน้าฟอร์มติดต่อ
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('ContactForm');
    }

    /**
     * บันทึกข้อมูลจากฟอร์มติดต่อ (ชื่อเมธอดตาม route)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        return $this->store($request);
    }

    /**
     * บันทึกข้อมูลจากฟอร์มติดต่อ
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // ลบ dd() เพื่อให้โค้ดทำงานต่อไปได้
        // dd($request->all());
        
        // ตรวจสอบข้อมูลที่ส่งมา
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company_option' => 'required|string|in:None,has_company',
            'company' => 'nullable|string|max:255',
            'business_type' => 'nullable|string|max:255',
            'other_business_type' => 'nullable|string|max:255',
            'foodex_meeting' => 'nullable|string|in:Yes,No',
            'foodex_location' => 'nullable|string|max:255',
            'your_booth_details' => 'nullable|string|max:255',
            'other_location' => 'nullable|string|max:255',
            'jadjaan_date' => 'nullable|date', // Validate jadjaan_date as a date
            'meeting_time1' => 'nullable|string', // เพิ่มการตรวจสอบข้อมูล meeting_time1
            'no_meeting_preference' => 'nullable|string|in:online_meeting,company_info',
            'online_meeting_date' => 'nullable|date',
            'online_meeting_time1' => 'nullable|string',
            'company_email_confirmation' => 'nullable|email',
            'specific_info_request' => 'nullable|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'nullable|string',

            // Conditional validation for meeting_date
            'meeting_date' => ['nullable', function ($attribute, $value, $fail) use ($request) {
                if ($request->foodex_meeting === 'Yes' && !$value) {
                    $fail('The meeting date field is required when selecting Foodex meeting.');
                }
            }],
        ]);


        // สร้างข้อมูลที่จะบันทึกลงในฐานข้อมูล
        $contactData = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            
            
            // ข้อมูลบริษัท
            'has_company' => $request->company_option === 'has_company' ? true : false,
            'company' => $request->company_option === 'has_company' ? $request->company : null,
            
            // ข้อมูลประเภทธุรกิจ
            'business_type' => $request->business_type,
        ];

        // จัดการกรณีที่เลือก 'Other' สำหรับ business_type
        if ($request->business_type === 'Other' && $request->filled('other_business_type')) {
            $contactData['business_type'] = $request->other_business_type;
        }

        // ข้อมูลเกี่ยวกับการนัดหมายในงาน Foodex Japan
        if ($request->foodex_meeting === 'Yes') {
            $contactData['foodex_meeting'] = $request->foodex_meeting;
            $contactData['meeting_location'] = $request->foodex_location;
            
            // รายละเอียดสถานที่เพิ่มเติม
            if ($request->foodex_location === 'Your Booth Exhibition Booth') {
                $contactData['location_details'] = $request->your_booth_details;
            } elseif ($request->foodex_location === 'Other') {
                $contactData['location_details'] = $request->other_location;
            }
            
            $contactData['meeting_date'] = $request->jadjaan_date;
            // เพิ่มการเก็บค่า meeting_time1
            $contactData['meeting_time1'] = $request->meeting_time1;
            
            // ตรวจสอบว่ามีค่า meeting_time ที่ส่งมาหรือไม่
            if ($request->has('meeting_time') && !empty($request->meeting_time)) {
                $contactData['meeting_time'] = $request->meeting_time;
            }
            
        } 
        // ข้อมูลสำหรับกรณีที่ไม่สามารถนัดหมายในงาน Foodex Japan
        elseif ($request->foodex_meeting === 'No') {
            $contactData['foodex_meeting'] = $request->foodex_meeting;
            $contactData['no_meeting_preference'] = $request->no_meeting_preference;
            
            if ($request->no_meeting_preference === 'online_meeting') {
                $contactData['online_meeting_date'] = $request->online_meeting_date;
                $contactData['online_meeting_time'] = $request->online_meeting_time;
            } elseif ($request->no_meeting_preference === 'company_info') {
                $contactData['company_email_confirmation'] = $request->company_email_confirmation;
                $contactData['specific_info_request'] = $request->specific_info_request;
            }
        }

        // บันทึกข้อมูลลงในฐานข้อมูล
        try {
            // เพิ่ม Log เพื่อตรวจสอบข้อมูลก่อนบันทึก
            Log::info('ข้อมูลที่จะบันทึก:', $contactData);
            
            $contact = Contact::create($contactData);
            
            // ส่งอีเมลแจ้งเตือนถึงผู้ดูแลระบบ (ตัวอย่าง)
            // Mail::to('admin@jadjaan.com')->send(new ContactFormSubmission($contact));
            
            return redirect()->back()->with('message', 'Thank you for contacting us. We will get back to you shortly.');
        } catch (\Exception $e) {
            // บันทึก Log หากเกิดข้อผิดพลาด
            Log::error('เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error processing your request. Please try again.')->withInput();
        }
    }
}