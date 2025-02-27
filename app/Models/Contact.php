<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'country',
        'email',
        'phone',
        'message',
        'has_company',
        'company',
        'business_type',
        'foodex_meeting',
        'meeting_location',
        'location_details',
        'meeting_date',
        'meeting_time1',
        'no_meeting_preference',
        'online_meeting_date',
        'online_meeting_time',
        'company_email_confirmation',
        'specific_info_request',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'has_company' => 'boolean',
        'meeting_date' => 'date',
        'online_meeting_date' => 'date',
    ];
}