<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
:root {
    --primary-red: #d2202f;
    --primary-yellow: #fac724;
    --primary-orange: #e98d26;
    --light-yellow: rgba(250, 199, 36, 0.1);
    --light-orange: rgba(233, 141, 38, 0.1);
}

/* Solid red background */
body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    background-color: var(--primary-red);
    min-height: 100vh;
    display: flex; /* ใช้ flexbox */
    justify-content: center; /* จัดกึ่งกลางแนวนอน */
    align-items: center; /* จัดกึ่งกลางแนวตั้ง */
    flex-direction: column; /* จัดเรียงในแนวตั้ง */
    padding: 2rem 0;
    margin: 0; /* ลบ margin ของ body */
}

/* แก้ไข .container เพื่อให้เหมาะสมกับการจัดกลาง */
.container {
    max-width: 800px;
    background-color: #fac724; /* สีเหลือง */
    padding: 2rem;
    border-radius: 0; /* ขอบสี่เหลี่ยม */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%; /* ให้ container ขยายเต็มความกว้าง */
    margin: 0 auto; /* จัดให้ container อยู่กลาง */
}

/* เพิ่ม effect hover สำหรับ .container */
.container:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}


.container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, var(--primary-red), var(--primary-yellow), var(--primary-orange));
}

/* Logo animations */
.logo-container {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
}

.logo-container img {
    max-width: 500px;
    height: auto;
    margin: 0 auto;
    transition: transform 0.3s ease;
}

.logo-container img:hover {
    transform: scale(1.05);
}

/* Enhanced headings with animated underline */
h2 {
    color: var(--primary-red);
    text-align: center;
    margin-bottom: 2rem;
    font-weight: bold;
    font-size: 2.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

h3 {
    color: var(--primary-orange);
    margin-top: 3rem;
    font-size: 1.8rem;
    position: relative;
    padding-left: 1rem;
}

h3::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 70%;
    background-color: var(--primary-orange);
    border-radius: 2px;
}

h3::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--primary-orange);
    transition: width 0.3s ease;
}

h3:hover::after {
    width: 100%;
}

/* Enhanced form elements */
.form-label {
    color: rgb(0, 0, 0);
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.form-control {
    border: 2px solid #eee;
    border-radius: 10px;
    padding: 0.8rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    transform: scale(1.02);
    border-color: var(--primary-yellow);
    box-shadow: 0 0 15px rgba(250, 199, 36, 0.3);
}

.input-group {
    position: relative;
}

.input-group i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary-orange);
    z-index: 10;
}

/* Enhanced submit button with shine effect */
button[type="submit"] {
    background-color: var(--primary-red);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(210, 32, 47, 0.3);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

button[type="submit"]:hover {
    background-color: #b5101e;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(210, 32, 47, 0.4);
}

button[type="submit"]::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0.2) 0%,
        rgba(255, 255, 255, 0.2) 40%,
        rgba(255, 255, 255, 0.6) 50%,
        rgba(255, 255, 255, 0.2) 60%,
        rgba(255, 255, 255, 0.2) 100%
    );
    transform: rotate(45deg);
    animation: shine 3s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
}

/* Alert styles */
.alert-success {
    background-color: var(--light-yellow);
    border-left: 4px solid var(--primary-yellow);
    color: #333;
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 2rem;
}

/* Enhanced iframe */
iframe {
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

iframe:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Form spacing */
.form-floating {
    margin-bottom: 1.5rem;
}

/* Enhanced contact info with animation */
.contact-info {
    background-color: var(--light-yellow);
    border-radius: 15px;
    padding: 2rem;
    margin-top: 3rem;
    position: relative;
    animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.contact-info i {
    color: var(--primary-orange);
    font-size: 1.5rem;
    margin-right: 10px;
}

/* Responsive styles */
@media (max-width: 768px) {
    .container {
        margin: 1rem;
        padding: 1.5rem;
    }
    
    h2 {
        font-size: 2rem;
    }
}
.custom-select {
    position: relative;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23333' d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    padding-right: 2.25rem !important;
}

.custom-select::-ms-expand {
    display: none;
}

/* สไตล์สำหรับ placeholder */
.custom-select option[value=""] {
    color: #6c757d;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
        <img src="{{ asset('Photo/CX_Jadjaan.png') }}" alt="JadJaan Logo">
        </div>
        @if(session('message'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('message') }}
        </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="firstname" class="form-label">
                <i class="fas fa-user me-2"></i>First Name
            </label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="col-md-6">
            <label for="lastname" class="form-label">
                <i class="fas fa-user me-2"></i>Last Name
            </label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
    </div>

    <div class="mb-4">
    <label for="country" class="form-label">
        <i class="fas fa-globe me-2"></i> Country <span class="text-danger">*</span>
    </label>
    <small class="text-danger">Please enter country</small>
    <input type="text" class="form-control" id="country" name="country" required>
</div>




<div class="mb-4">
    <label class="form-label">
        <i class="fas fa-building me-2"></i>Company Name
    </label>
    
    <!-- Dropdown Container -->
    <div id="company_select_container">
        <select class="form-select" id="company_option" name="company_option" onchange="handleCompanyOption()">
            <option value="None" selected>No</option>
            <option value="has_company" {{ old('company_option') == 'has_company' ? 'selected' : '' }}>Yes</option>
        </select>
    </div>
    
    <!-- Text input Container (hidden initially) -->
    <div id="company_input_container" style="display: none;">
        <div class="d-flex">
            <input type="text" 
                   class="form-control" 
                   id="company" 
                   name="company" 
                   placeholder="Enter company name" 
                   value="{{ old('company') }}">
            <button type="button" class="btn btn-outline-secondary ms-2" onclick="backToCompanySelect()">
                <i class="fas fa-undo"></i>
            </button>
        </div>
    </div>
</div>

<div class="mb-4" id="business_type_container" style="display: none;">
    <label for="business_type" class="form-label">
        <i class="fas fa-briefcase me-2"></i>Business Type
    </label>
    
    <!-- Dropdown Container -->
    <div id="business_type_select_container">
        <select class="form-control custom-select" id="business_type" name="business_type" onchange="toggleBusinessTypeInput()">
            <option value="" selected></option>
            <option value="Retailer" {{ old('business_type') == 'Retailer' ? 'selected' : '' }}>Retailer</option>
            <option value="Wholesaler" {{ old('business_type') == 'Wholesaler' ? 'selected' : '' }}>Wholesaler</option>
            <option value="Food Service" {{ old('business_type') == 'Food Service' ? 'selected' : '' }}>Food Service</option>
            <option value="E-commerce" {{ old('business_type') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
            <option value="Hotel" {{ old('business_type') == 'Hotel' ? 'selected' : '' }}>Hotel</option>
            <option value="Other" {{ old('business_type') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    
    <!-- Other Input Container (hidden initially) -->
    <div id="other_business_type_container" style="display: none;">
        <div class="d-flex">
            <input type="text" 
                   class="form-control" 
                   id="other_business_type" 
                   name="other_business_type" 
                   placeholder="Please specify" 
                   value="{{ old('other_business_type') }}">
            <button type="button" class="btn btn-outline-secondary ms-2" onclick="backToBusinessTypeSelect()">
                <i class="fas fa-undo"></i>
            </button>
        </div>
    </div>
</div>

<div class="mb-4" id="foodex_meeting_container">
    <label class="form-label mt-4">
        <i class="fas fa-calendar-alt me-2"></i>Would you like to arrange a meeting with us during the Foodex Japan event?
    </label>
    <select class="form-select" id="foodex_meeting" name="foodex_meeting" onchange="toggleFoodexQuestions()">
        <option value="" selected></option>
        <option value="Yes" {{ old('foodex_meeting') == 'Yes' ? 'selected' : '' }}>Yes</option>
        <option value="No" {{ old('foodex_meeting') == 'No' ? 'selected' : '' }}>No</option>
    </select>
</div>

<div id="foodex_questions" style="display: none;">
    <!-- Location Question -->
    <div class="mb-4" id="question_location">
        <label for="foodex_location" class="form-label">
            <i class="fas fa-map-marker-alt me-2"></i>Location
        </label>
        <select class="form-select" id="foodex_location" name="foodex_location" onchange="showLocationDetails()">
            <option value="" selected>Choose location</option>
            <option value="Jadjaan Exhibition Booth" {{ old('foodex_location') == 'Jadjaan Exhibition Booth' ? 'selected' : '' }}>Jadjaan Exhibition Booth</option>
            <option value="Your Booth Exhibition Booth" {{ old('foodex_location') == 'Your Booth Exhibition Booth' ? 'selected' : '' }}>Your Booth Exhibition Booth</option>
            <option value="Other" {{ old('foodex_location') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        
        <!-- Location specific additional inputs - Removed the jadjaan_location_details div -->
        <div id="your_booth_location_details" class="mt-2 d-none">
            <input type="text" class="form-control" id="your_booth_details" name="your_booth_details" placeholder="Enter the booth number">
        </div>
        
        <div id="other_location_details" class="mt-2 d-none">
            <input type="text" class="form-control" id="other_location" name="other_location" placeholder="please specify">
        </div>
    </div>

    <!-- JadJaan Exhibition Booth Date Selection - Always visible when foodex_questions is shown -->
    <div class="mb-4" id="question_jadjaan_date">
        <label for="jadjaan_date" class="form-label">
            <i class="fas fa-calendar-alt me-2"></i>Date
        </label>
        <select class="form-select" id="jadjaan_date" name="jadjaan_date">
            <option value="" selected>Choose a date</option>
            <option value="2025-03-11" {{ old('jadjaan_date') == '2025-03-11' ? 'selected' : '' }}>March 11, 2025</option>
            <option value="2025-03-12" {{ old('jadjaan_date') == '2025-03-12' ? 'selected' : '' }}>March 12, 2025</option>
            <option value="2025-03-13" {{ old('jadjaan_date') == '2025-03-13' ? 'selected' : '' }}>March 13, 2025</option>
            <option value="2025-03-14" {{ old('jadjaan_date') == '2025-03-14' ? 'selected' : '' }}>March 14, 2025</option>
        </select>
    </div>

    <!-- Time Question -->
    <div class="mb-4" id="question_time">
        <label for="meeting_time1" class="form-label">
            <i class="fas fa-clock me-2"></i>Time
        </label>
        <input type="time" class="form-control" id="meeting_time1" name="meeting_time1" value="{{ old('meeting_time1') }}">
    </div>
</div>

<!-- Add a container for the follow-up question when the answer is No -->
<div class="mb-4" id="follow_up_options" style="display: none;">
    <label class="form-label mt-4">
        <i class="fas fa-question-circle me-2"></i>Do you prefer to arrange an online meeting at another time after Foodex Japan or receive our company profile and sales kit through email?
    </label>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="follow_up_option" id="online_meeting_option" value="Online Meeting">
        <label class="form-check-label" for="online_meeting_option">
            Arrange an online meeting at another time
        </label>
    </div>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="follow_up_option" id="email_profile_option" value="Email Profile">
        <label class="form-check-label" for="email_profile_option">
            Receive company profile and sales kit through email
        </label>
    </div>
</div>

<!-- Input for online meeting date and time, initially hidden -->
<div class="mb-4" id="online_meeting_details" style="display: none;">
    <label for="meeting_date" class="form-label">
        <i class="fas fa-calendar-alt me-2"></i>Select a Date for Online Meeting
    </label>
    <input type="date" class="form-control" id="meeting_date" name="meeting_date">

    <label for="meeting_time" class="form-label mt-2">
        <i class="fas fa-clock me-2"></i>Select a Time for Online Meeting
    </label>
    <input type="time" class="form-control" id="meeting_time" name="meeting_time">
</div>

<!-- Input for receiving company profile and sales kit through email -->
<div class="mb-4" id="email_profile_details" style="display: none;">
    <label for="email_profile_message" class="form-label">
        <i class="fas fa-envelope me-2"></i>Message (Optional)
    </label>
    <textarea class="form-control" id="email_profile_message" name="email_profile_message" rows="4"></textarea>
</div>


<script>
function handleCompanyOption() {
    const companyOption = document.getElementById("company_option");
    const companySelectContainer = document.getElementById("company_select_container");
    const companyInputContainer = document.getElementById("company_input_container");
    const companyInput = document.getElementById("company");
    const businessTypeContainer = document.getElementById("business_type_container");
    const businessType = document.getElementById("business_type");
    const businessTypeSelectContainer = document.getElementById("business_type_select_container");
    const otherBusinessTypeContainer = document.getElementById("other_business_type_container");
    const foodexContainer = document.getElementById("foodex_meeting_container");

    if (companyOption.value === "has_company") {
        // Hide dropdown and show input field
        companySelectContainer.style.display = "none";
        companyInputContainer.style.display = "block";
        companyInput.focus();
        companyInput.setAttribute("required", "required");
        
        // Show business type section
        businessTypeContainer.style.display = "block";
        businessType.setAttribute("required", "required");
        
        // Show Foodex Meeting section
        foodexContainer.style.display = "block";
        
        // Make sure the business type select is visible and other input is hidden initially
        if (businessTypeSelectContainer && otherBusinessTypeContainer) {
            businessTypeSelectContainer.style.display = "block";
            otherBusinessTypeContainer.style.display = "none";
        }
    } else {
        // Show dropdown and hide input field
        companySelectContainer.style.display = "block";
        companyInputContainer.style.display = "none";
        companyInput.value = "";
        companyInput.removeAttribute("required");
        
        // Hide business type section
        businessTypeContainer.style.display = "none";
        businessType.removeAttribute("required");
        businessType.value = "";

        // Hide Foodex Meeting section
        foodexContainer.style.display = "none";
        document.getElementById("foodex_meeting").value = "";
        toggleFoodexQuestions(); // Reset Foodex Questions values
    }

    toggleBusinessTypeInput();
}

function backToCompanySelect() {
    const companyOption = document.getElementById("company_option");
    const companySelectContainer = document.getElementById("company_select_container");
    const companyInputContainer = document.getElementById("company_input_container");
    const companyInput = document.getElementById("company");
    
    // Reset dropdown to "No"
    companyOption.value = "None";
    
    // Show dropdown and hide input field
    companySelectContainer.style.display = "block";
    companyInputContainer.style.display = "none";
    companyInput.value = "";
    companyInput.removeAttribute("required");
    
    // Run the main function to hide dependent fields
    handleCompanyOption();
}

function toggleBusinessTypeInput() {
    const businessType = document.getElementById("business_type");
    const businessTypeSelectContainer = document.getElementById("business_type_select_container");
    const otherBusinessTypeContainer = document.getElementById("other_business_type_container");
    const otherInput = document.getElementById("other_business_type");

    if (businessType && businessType.value === "Other") {
        // Hide the select container and show the other input container
        if (businessTypeSelectContainer && otherBusinessTypeContainer) {
            businessTypeSelectContainer.style.display = "none";
            otherBusinessTypeContainer.style.display = "block";
            otherInput.focus();
            otherInput.setAttribute("required", "required");
        }
    } else {
        // Hide other input if any other option is selected
        if (otherInput) {
            otherInput.removeAttribute("required");
            otherInput.value = "";
        }
    }
}

function backToBusinessTypeSelect() {
    const businessTypeSelectContainer = document.getElementById("business_type_select_container");
    const otherBusinessTypeContainer = document.getElementById("other_business_type_container");
    const businessType = document.getElementById("business_type");
    const otherInput = document.getElementById("other_business_type");
    
    if (businessTypeSelectContainer && otherBusinessTypeContainer) {
        businessTypeSelectContainer.style.display = "block";
        otherBusinessTypeContainer.style.display = "none";
    }
    
    if (businessType) {
        businessType.value = "";
    }
    
    if (otherInput) {
        otherInput.removeAttribute("required");
        otherInput.value = "";
    }
}

function toggleFoodexQuestions() {
    const foodexMeeting = document.getElementById("foodex_meeting").value;
    const foodexQuestions = document.getElementById("foodex_questions");
    
    // Get or create the div for follow-up questions
    let followupContainer = document.getElementById("foodex_no_followup");
    if (!followupContainer) {
        followupContainer = document.createElement("div");
        followupContainer.id = "foodex_no_followup";
        followupContainer.className = "mb-4";
        document.getElementById("foodex_meeting_container").insertAdjacentElement('afterend', followupContainer);
    }
    
    // Show original Foodex questions if "Yes" is selected
    if (foodexMeeting === "Yes") {
        foodexQuestions.style.display = "block";
        followupContainer.style.display = "none";
        
        // Make regular Foodex questions visible
        document.getElementById("question_location").style.display = "block";
        document.getElementById("question_jadjaan_date").style.display = "block";
        document.getElementById("question_time").style.display = "block";
    } 
    // Show follow-up options if "No" is selected
    else if (foodexMeeting === "No") {
        foodexQuestions.style.display = "none";
        followupContainer.style.display = "block";
        
        // Create and show follow-up options
        followupContainer.innerHTML = `
            <label class="form-label">
                <i class="fas fa-question-circle me-2"></i>Since you can't meet during Foodex Japan, What would you prefer?
            </label>
            <select class="form-select mb-3" id="no_meeting_preference" name="no_meeting_preference" onchange="handleNoMeetingPreference()">
                <option value="" selected>Please select an option</option>
                <option value="online_meeting">Arrange an online meeting at another time after Foodex Japan</option>
                <option value="company_info">Request company profile and sales kit to be sent through email.</option>
            </select>
            
            <!-- Container for online meeting options (initially hidden) -->
            <div id="online_meeting_options" style="display: none;">
                <div class="mb-3">
                    <label for="online_meeting_date" class="form-label">
                        <i class="fas fa-calendar-alt me-2"></i>Preferred Date
                    </label>
                    <input type="date" class="form-control" id="online_meeting_date" name="online_meeting_date">
                </div>
                <div class="mb-3">
                    <label for="online_meeting_time" class="form-label">
                        <i class="fas fa-clock me-2"></i>Preferred Time
                    </label>
                    <input type="time" class="form-control" id="online_meeting_time" name="online_meeting_time">
                </div>
            </div>
            
            <!-- Container for company info options (initially hidden) -->
            <div id="company_info_options" style="display: none;">
                <div class="mb-3">
                    <label for="company_email_confirmation" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Please confirm your company email
                    </label>
                    <input type="email" class="form-control" id="company_email_confirmation" name="company_email_confirmation">
                </div>
                <div class="mb-3">
                    <label for="specific_info_request" class="form-label">
                        <i class="fas fa-info-circle me-2"></i>Any specific information you're looking for?
                    </label>
                    <textarea class="form-control" id="specific_info_request" name="specific_info_request" rows="3"></textarea>
                </div>
            </div>
        `;
    } 
    // Hide everything if nothing is selected
    else {
        foodexQuestions.style.display = "none";
        followupContainer.style.display = "none";
        
        // Reset fields
        document.getElementById("foodex_location").value = "";
        document.getElementById("jadjaan_date").value = "";
        document.getElementById("meeting_time").value = "";
        
        // Hide all location details
        hideAllLocationDetails();
    }
}

// New function to handle the selection of follow-up options
function handleNoMeetingPreference() {
    const preference = document.getElementById("no_meeting_preference").value;
    const onlineMeetingOptions = document.getElementById("online_meeting_options");
    const companyInfoOptions = document.getElementById("company_info_options");
    
    // Hide both option containers first
    if (onlineMeetingOptions) onlineMeetingOptions.style.display = "none";
    if (companyInfoOptions) companyInfoOptions.style.display = "none";
    
    // Show the appropriate container based on selection
    if (preference === "online_meeting") {
        onlineMeetingOptions.style.display = "block";
    } else if (preference === "company_info") {
        companyInfoOptions.style.display = "block";
    }
}

function showLocationDetails() {
    const selectedLocation = document.getElementById("foodex_location").value;
    
    // Hide all location details first
    hideAllLocationDetails();
    
    // Show specific details based on selection
    if (selectedLocation === "Your Booth Exhibition Booth") {
        document.getElementById("your_booth_location_details").classList.remove("d-none");
    } 
    else if (selectedLocation === "Other") {
        document.getElementById("other_location_details").classList.remove("d-none");
    }
    
    // Always keep the date and time fields visible regardless of location choice
    document.getElementById("question_jadjaan_date").style.display = "block";
    document.getElementById("question_time").style.display = "block";
}

function hideAllLocationDetails() {
    document.getElementById("your_booth_location_details").classList.add("d-none");
    document.getElementById("other_location_details").classList.add("d-none");
    
    // Clear inputs
    document.getElementById("your_booth_details").value = "";
    document.getElementById("other_location").value = "";
}

// Initial setup on page load
window.addEventListener("DOMContentLoaded", function() {
    handleCompanyOption();
    toggleFoodexQuestions();
});
</script>
    <div class="mb-4">
        <label for="email" class="form-label">
            <i class="fas fa-envelope me-2"></i>E-mail
        </label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-4">
        <label for="phone" class="form-label">
            <i class="fas fa-phone me-2"></i>Phone Number
        </label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="mb-4">
        <label for="message" class="form-label">
            <i class="fas fa-comment me-2"></i>What would you like to know more about our JatJaan (options)?
        </label>
        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
    </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-paper-plane me-2"></i>Submit
    </button>
    </div>
</form>

      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>