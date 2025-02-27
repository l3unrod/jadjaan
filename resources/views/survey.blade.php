<!-- resources/views/survey_form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link rel="stylesheet" href="styles.css"> <!-- If you have external CSS -->
    <style>
        .rating-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .question-label {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .slider-container {
            position: relative;
            margin: 20px 0;
        }

        input[type="range"] {
            width: 100%;
            height: 15px;
            border-radius: 10px;
            background: linear-gradient(to right, #ff6b6b, #ffd93d, #6bcb77);
            outline: none;
            transition: 0.3s;
            -webkit-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 25px;
            height: 25px;
            background: #fff;
            border: 3px solid #4a90e2;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="range"]::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        .emoji-display {
            text-align: center;
            font-size: 40px;
            margin: 20px 0;
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rating-number {
            font-size: 24px;
            font-weight: bold;
            color: #4a90e2;
            margin-left: 10px;
        }
:root {
    --primary-red: #d2202f;
    --primary-yellow: #fac724;
    --primary-orange: #e98d26;
    --secondary-light: #d2202f;
    --secondary-dark: #333333;
}

body {
    font-family: 'Poppins', sans-serif; /* เปลี่ยนฟอนต์ */
    line-height: 1.6;
    background-color: var(--secondary-light);
    color: var(--secondary-dark);
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    max-width: 900px;
    margin: 30px auto;
    background: linear-gradient(135deg, #fac724, #e98d26); /* พื้นหลัง Gradient */
    border-radius: 0px; /* ทำให้เป็นสี่เหลี่ยม */
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    padding: 25px;
}

/* ปรับสำหรับมือถือ */
@media (max-width: 768px) {
    .container {
        width: 95%; /* ขยายให้เต็มจอมากขึ้น */
        padding: 15px; /* ลด padding ให้พอดีกับจอ */
        margin: 15px auto; /* ลดระยะห่างขอบจอ */
    }
}



h2 {
    color: var(--primary-yellow);
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 3px solid var(--primary-yellow);
    margin-bottom: 25px;
}

h3 {
    color: var(--primary-red);
    margin-top: 30px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary-yellow);
    font-size: 28px; /* เพิ่มขนาดตัวอักษร */
    font-weight: bold; /* ทำให้ตัวหนา */
}


.section {
    margin: 25px 0;
    padding: 15px;
    border-radius: 5px;
    background-color: #ffffff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* เพิ่มเงาให้กับ section */
}

/* ปรับระยะห่างระหว่างคำถามกับคำตอบ */
.question {
    margin-bottom: 10px; /* ระยะห่างระหว่างคำถามกับคำตอบ */
}

.answer {
    margin-top: 5px; /* ระยะห่างระหว่างคำตอบกับคำถามถัดไป */
}

/* ปรับความสูงของ input, select หรือ textarea ให้เหมาะสม */
input, select, textarea {
    margin-bottom: 10px; /* ลดระยะห่างของ input หรือ select */
    padding: 8px; /* เพิ่ม padding ใน input ให้เหมาะสม */
}


label {
    display: block;
    margin-bottom: 16px;
    font-weight: bold;
    color: var(--secondary-dark);
}
label {
    display: block; /* ให้ label และ input อยู่ในแนวตั้ง */
    margin-bottom: 0.1px; /* ลดระยะห่างระหว่าง label กับ input */
}


input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background-color: white; /* กำหนดสีพื้นหลังเป็นสีขาว */
    color: #333333; /* ข้อความเป็นสีเทาเข้ม */
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    border-color: var(--primary-orange);
    outline: none;
    box-shadow: 0 0 5px rgba(233, 141, 38, 0.5);
}

input[type="text"]:hover,
input[type="email"]:hover,
textarea:hover {
    border-color: var(--primary-red); /* สีขอบเปลี่ยนเมื่อ hover */
}

input[type="radio"],
input[type="checkbox"] {
    margin-right: 8px;
}

input[type="radio"] + label,
input[type="checkbox"] + label {
    display: inline;
    margin-bottom: 12px;
    font-weight: normal;
}

button[type="submit"] {
    background-color: #d2202f; /* สีแดงสด */
    color: white;
    border: none;
    padding: 12px 30px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: 30px auto 10px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #b5101e;
    transform: translateY(-2px); /* เลื่อนปุ่มขึ้นเล็กน้อยเมื่อ hover */
}

button[type="submit"]:active {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเมื่อคลิก */
}

.success-message {
    background-color: #eafaea;
    border-left: 5px solid #52c41a;
    padding: 15px;
    margin: 20px 0;
    border-radius: 4px;
}

#error-message {
    font-size: 14px;
    margin-top: 5px;
}

input[name="other_household"],
input[name="other_where_eat"],
input[name="other_appeal"],
input[name="other_thai_dishes"],
input[name="other_purchase_location"],
input[name="other_challenges"],
input[name="other_brand_choice"],
input[name="other_flavors"],
input[name="other_packaging_size"] {
    width: 60%;
    margin-top: 5px;
    transition: width 0.3s ease;
}

@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 15px;
    }

    input[name="other_household"],
    input[name="other_where_eat"],
    input[name="other_appeal"],
    input[name="other_thai_dishes"],
    input[name="other_purchase_location"],
    input[name="other_challenges"],
    input[name="other_brand_choice"],
    input[name="other_flavors"],
    input[name="other_packaging_size"] {
        width: 100%;
        margin-left: 0;
        margin-top: 8px;
    }
}


    </style>
</head>
<body>
    <div class="container">
    <img src="/Photo/CX_Jadjaan.png" alt="JadJaan Logo" style="display: block; margin: auto; max-width: 100%; height: auto;">

        <!-- Before Entering Question Form (Name and Email) -->
        <form action="{{ route('survey.store') }}" method="POST">
            @csrf  <!-- csrf token สำหรับความปลอดภัย -->
            <div class="question">
            <h2 style="color: black;">Survey Objective</h2>
            <p>Gathering insights for <strong>JadJaan</strong> product improvement.</p>
    </div>
            <div class="section">
            <div class="question">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="question">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            </div>

            <!-- Section 1: Demographics -->
            <div class="section">
                <h3>Section 1: Demographics</h3>

                <div class="question">
                    <label for="nation">1. Which nation do you belong to?</label>
                    <input type="text" id="nation" name="nation">
                </div>

                <div class="question">
                    <label>2. Age Group</label><br>
                    <input type="radio" id="under_20" name="age_group" value="Under 20">
                    <label for="under_20">Under 20</label><br>
                    <input type="radio" id="20_30" name="age_group" value="20-30">
                    <label for="20_30">20–30</label><br>
                    <input type="radio" id="31_40" name="age_group" value="31-40">
                    <label for="31_40">31–40</label><br>
                    <input type="radio" id="41_50" name="age_group" value="41-50">
                    <label for="41_50">41–50</label><br>
                    <input type="radio" id="over_50" name="age_group" value="Over 50">
                    <label for="over_50">Over 50</label>
                </div>

                <div class="question">
                    <label>3. Gender</label><br>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label><br>
                    <input type="radio" id="prefer_not_to_say" name="gender" value="Prefer not to say">
                    <label for="prefer_not_to_say">Prefer not to say</label>
                </div>

                <div class="question">
                    <label>4. Household Type</label><br>
                    <input type="radio" id="single" name="household_type" value="Single">
                    <label for="single">Single</label><br>
                    <input type="radio" id="couple" name="household_type" value="Couple">
                    <label for="couple">Couple</label><br>
                    <input type="radio" id="family_with_children" name="household_type" value="Family with children">
                    <label for="family_with_children">Family with children</label><br>
                    <input type="radio" id="others" name="household_type" value="Others">
                    <label for="others">Others</label>
                    <input type="text" id="other_household" name="other_household" placeholder="Please specify" style="margin-left: 10px;">
                </div>
                <div class="question">
    <label for="taste_thai_food">5. Have you ever tasted Thai food before?</label><br>
    <input type="radio" id="yes" name="taste_thai_food" value="Yes">
    <label for="yes">Yes</label><br>
    <input type="radio" id="no" name="taste_thai_food" value="No">
    <label for="no">No</label><br>
</div>
            </div>
           <!-- ส่วนที่จะแสดงหรือซ่อน -->
<!-- ฟอร์มที่มีคำถาม -->
<div class="section">
    <div class="question">
        <label for="reason_never_tried">Q1. What is the reason you have never tried Thai food?</label><br>
        <input type="checkbox" id="reason_not_familiar" name="reason_never_tried" value="Not familiar with Thai cuisine">
        <label for="reason_not_familiar">Not familiar with Thai cuisine</label><br>
        <input type="checkbox" id="reason_dont_like_spicy" name="reason_never_tried" value="Don't like spicy food">
        <label for="reason_dont_like_spicy">Don't like spicy food</label><br>
        <input type="checkbox" id="reason_concerned_ingredients" name="reason_never_tried" value="Concerned about ingredients">
        <label for="reason_concerned_ingredients">Concerned about ingredients</label><br>
        <input type="checkbox" id="reason_no_access" name="reason_never_tried" value="No access to Thai restaurants or products">
        <label for="reason_no_access">No access to Thai restaurants or products</label><br>
        <input type="checkbox" id="reason_price_high" name="reason_never_tried" value="Price is too high">
        <label for="reason_price_high">Price is too high</label><br>
        <input type="checkbox" id="reason_other" name="reason_never_tried" value="Other">
        <label for="reason_other">Other</label><br>
    </div>

    <div class="question">
        <label for="food_type_to_try">Q2. If you were to try Thai food, what type of food would you like to try?</label><br>
        <input type="checkbox" id="soup" name="food_type_to_try" value="Soup">
        <label for="soup">Soup</label><br>
        <input type="checkbox" id="noodles" name="food_type_to_try" value="Noodles">
        <label for="noodles">Noodles</label><br>
        <input type="checkbox" id="stir_fried" name="food_type_to_try" value="Stir-fried">
        <label for="stir_fried">Stir-fried</label><br>
        <input type="checkbox" id="curry" name="food_type_to_try" value="Curry">
        <label for="curry">Curry</label><br>
        <input type="checkbox" id="pasta" name="food_type_to_try" value="Pasta">
        <label for="pasta">Pasta</label><br>
        <input type="checkbox" id="deep_fried" name="food_type_to_try" value="Deep-fried">
        <label for="deep_fried">Deep-fried</label><br>
        <input type="checkbox" id="other_food" name="food_type_to_try" value="Other">
        <label for="other_food">Other</label><br>
    </div>

    <div class="question">
        <label for="product_platform_preference">Q3. If you were to try Thai food, which type of product or platform would you prefer to have Thai cuisine served on?</label><br>
        <input type="checkbox" id="ready_to_cook" name="product_platform_preference" value="Ready-to-cook product">
        <label for="ready_to_cook">Ready-to-cook product (e.g., from a store or online)</label><br>
        <input type="checkbox" id="ready_to_eat" name="product_platform_preference" value="Ready-to-eat product">
        <label for="ready_to_eat">Ready-to-eat product (e.g., from a store or online)</label><br>
        <input type="checkbox" id="restaurant" name="product_platform_preference" value="Restaurant">
        <label for="restaurant">Restaurant</label><br>
        <input type="checkbox" id="street_food" name="product_platform_preference" value="Street food">
        <label for="street_food">Street food</label><br>
        <input type="checkbox" id="other_platform" name="product_platform_preference" value="Other">
        <label for="other_platform">Other</label><br>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // กำหนดตัวแปรสำหรับ div ที่จะซ่อน
        var sectionToHide = document.querySelector('.section.hidden-section');
        sectionToHide.style.display = 'none';  // ซ่อน section เริ่มต้น

        // ฟังการเปลี่ยนแปลงของ radio button สำหรับคำถาม "Have you ever tasted Thai food?"
        const noRadioButton = document.querySelector('input#no[name="taste_thai_food"][value="No"]');
        const yesRadioButton = document.querySelector('input#yes[name="taste_thai_food"][value="Yes"]');

        // หากเลือก No ให้แสดงส่วนที่ถูกซ่อน
        if (noRadioButton) {
            noRadioButton.addEventListener('change', function() {
                if (this.checked) {
                    sectionToHide.style.display = 'block';  // แสดง section
                }
            });
        }

        // หากเลือก Yes ให้ซ่อนส่วนที่ไม่ต้องการ
        if (yesRadioButton) {
            yesRadioButton.addEventListener('change', function() {
                if (this.checked) {
                    sectionToHide.style.display = 'none';  // ซ่อน section
                }
            });
        }

        // ตรวจสอบสถานะเมื่อโหลดหน้า
        if (noRadioButton && noRadioButton.checked) {
            sectionToHide.style.display = 'block';  // ถ้าเลือก No ให้แสดง
        } else {
            sectionToHide.style.display = 'none';  // ถ้าเลือก Yes ให้ซ่อน
        }
    });
</script>


            <!-- Section 2: Eating Habits -->
            <div class="section">
                <h3>Section 2: Thai Food - Eating Habits</h3>


                <div class="question">
                    <label for="frequency">6. How often do you eat Thai food?</label><br>
                    <input type="radio" id="once_a_week_or_more" name="thai_food_frequency" value="Once a week or more">
                    <label for="once_a_week_or_more">Once a week or more</label><br>
                    <input type="radio" id="once_a_month" name="thai_food_frequency" value="Once a month">
                    <label for="once_a_month">Once a month</label><br>
                    <input type="radio" id="less_than_once_a_month" name="thai_food_frequency" value="Less than once a month">
                    <label for="less_than_once_a_month">Less than once a month</label><br>
                    <input type="radio" id="never" name="thai_food_frequency" value="Never">
                    <label for="never">Never</label>
                </div>

                <div class="question">
                    <label for="where_eat">7. Where do you usually eat Thai food?</label><br>
                    <input type="radio" id="restaurants" name="where_eat" value="Restaurants">
                    <label for="restaurants">Restaurants</label><br>
                    <input type="radio" id="home" name="where_eat" value="Home (Cook myself)">
                    <label for="home">Home (Cook myself)</label><br>
                    <input type="radio" id="takeout" name="where_eat" value="Takeout/Delivery">
                    <label for="takeout">Takeout&nbsp;Delivery</label><br>
                    <input type="radio" id="others" name="where_eat" value="Others">
                    <label for="others">Others</label>
                    <input type="text" id="other_where_eat" name="other_where_eat" placeholder="Please specify" style="margin-left: 10px;">
                </div>

                <div class="question">
                    <label>8. Have you ever cooked Thai food at home?</label><br>
                    <input type="radio" id="yes" name="cooked_thai_food" value="Yes">
                    <label for="yes">Yes</label><br>
                    <input type="radio" id="no" name="cooked_thai_food" value="No">
                    <label for="no">No</label>
                </div>
            </div>
            <!-- Section 3: Preferences for Ready-to-Cook Products -->
<div class="section">
    <h3>Section 3: Preferences for Thai Ready-to-Cook Products</h3>
    <div class="question">
    <label>9. Have you ever bought Thai Ready-to-cook products before?</label><br>
    <input type="radio" id="yes" name="bought_before" value="Yes">
    <label for="yes">Yes</label><br>
    <input type="radio" id="no" name="bought_before" value="No">
    <label for="no">No</label>
</div>

<div class="question">
    <label for="challenges">10. What challenges do you face when cooking Thai food at home?</label><br>
    <input type="checkbox" id="difficulty_finding_ingredients" name="challenges[]" value="Difficulty finding ingredients">
    <label for="difficulty_finding_ingredients">Difficulty finding ingredients</label><br>
    <input type="checkbox" id="complicated_recipes" name="challenges[]" value="Complicated recipes">
    <label for="complicated_recipes">Complicated recipes</label><br>
    <input type="checkbox" id="time_consuming_preparation" name="challenges[]" value="Time-consuming preparation">
    <label for="time_consuming_preparation">Time-consuming preparation</label><br>
    <input type="checkbox" id="unable_to_match_traditional_flavour" name="challenges[]" value="Unable to cook as same flavours as Thai traditional taste">
    <label for="unable_to_match_traditional_flavour">Unable to cook as same flavours as Thai traditional taste</label><br>
    <input type="checkbox" id="others_challenges" name="challenges[]" value="Others">
    <label for="others_challenges">Others:</label>
    <input type="text" name="other_challenges" placeholder="Please specify" style="margin-left: 10px;">
</div>

<div class="question">
    <label for="buy_ready_to_cook">11. Would you consider buying a Thai Ready-to-cook Thai product if it were available in your area?</label><br>
    <input type="radio" id="yes_ready_to_cook" name="buy_ready_to_cook" value="Yes">
    <label for="yes_ready_to_cook">Yes</label><br>
    <input type="radio" id="no_ready_to_cook" name="buy_ready_to_cook" value="No">
    <label for="no_ready_to_cook">No</label><br>

    <!-- ช่องกรอกข้อความที่ซ่อนอยู่ -->
    <div id="reason_div" style="display:none;">
        <label for="reason">Please specify why:</label><br>
        <textarea id="reason" name="reason"></textarea>
    </div>
</div>

<script>
    // เช็คเมื่อเลือก Yes หรือ No
    document.getElementById('yes_ready_to_cook').addEventListener('change', function() {
        document.getElementById('reason_div').style.display = 'none';
    });

    document.getElementById('no_ready_to_cook').addEventListener('change', function() {
        document.getElementById('reason_div').style.display = 'block';
    });
</script>


    <div class="question">
    <label>12. What appeals to you most in Thai Ready-to-cook products? (Able to select more than one option)</label><br>
    <input type="checkbox" id="convenience" name="appeal[]" value="Convenience">
    <label for="convenience">Convenience</label><br>
    <input type="checkbox" id="authentic_taste" name="appeal[]" value="Authentic taste">
    <label for="authentic_taste">Authentic taste</label><br>
    <input type="checkbox" id="healthy_ingredients" name="appeal[]" value="Healthy ingredients">
    <label for="healthy_ingredients">Healthy ingredients</label><br>
    <input type="checkbox" id="affordability" name="appeal[]" value="Affordability">
    <label for="affordability">Affordability</label><br>
    <input type="checkbox" id="easy_instructions" name="appeal[]" value="Easy instructions">
    <label for="easy_instructions">Easy instructions</label><br>
    <input type="checkbox" id="brand_reputation" name="appeal[]" value="Brand reputation">
    <label for="brand_reputation">Brand reputation</label><br>
    <input type="checkbox" id="sustainability" name="appeal[]" value="Sustainability">
    <label for="sustainability">Sustainability</label><br>
    <input type="checkbox" id="others_appeal" name="appeal[]" value="Others">
    <label for="others_appeal">Others:</label>
    <input type="text" name="other_appeal" placeholder="Please specify" style="margin-left: 10px;">
</div>


<div class="question">
    <label>13. What types of Thai dishes would you like as ready-to-cook products? (Able to select more than one option)</label><br>

    <!-- Soup (หมวดซุป) -->
    <input type="checkbox" id="tom_kha" name="thai_dishes[]" value="Tom Kha">
    <label for="tom_kha">1. Tom Kha (ต้มข่า)</label><br>
    <input type="checkbox" id="tom_yam" name="thai_dishes[]" value="Tom Yam">
    <label for="tom_yam">2. Tom Yam (ต้มยำ)</label><br>

    <!-- Curry (หมวดแกง) -->
    <input type="checkbox" id="panang_curry" name="thai_dishes[]" value="Panaeng Curry">
    <label for="panang_curry">3. Panaeng Curry (แกงพะแนง)</label><br>
    <input type="checkbox" id="massaman_curry" name="thai_dishes[]" value="Massaman Curry">
    <label for="massaman_curry">4. Massaman Curry (แกงมัสมั่น)</label><br>
    <input type="checkbox" id="green_curry" name="thai_dishes[]" value="Green Curry">
    <label for="green_curry">5. Green Curry (แกงเขียวหวาน)</label><br>
    <input type="checkbox" id="red_curry" name="thai_dishes[]" value="Red Curry">
    <label for="red_curry">6. Red Curry (แกงเผ็ด)</label><br>
    <input type="checkbox" id="khao_soi" name="thai_dishes[]" value="Khao Soi">
    <label for="khao_soi">7. Khao Soi (ข้าวซอย)</label><br>

    <!-- Stir-fry and Others (หมวดผัดและอื่นๆ) -->
    <input type="checkbox" id="pad_thai" name="thai_dishes[]" value="Phod Thai">
    <label for="pad_thai">8. Phod Thai (ผัดไทย)</label><br>
    <input type="checkbox" id="shrimp_paste" name="thai_dishes[]" value="Shrimp Paste">
    <label for="shrimp_paste">9. Shrimp Paste (กะปิ)</label><br>
    <input type="checkbox" id="stir_fry_basil" name="thai_dishes[]" value="Stir-fry Holy Basil">
    <label for="stir_fry_basil">10. Stir-fry Holy Basil "Krapao" (ผัดกะเพรา)</label><br>
    <input type="checkbox" id="other_dishes" name="thai_dishes[]" value="Others">
    <label for="other_dishes">11. Others:</label>
    <input type="text" name="other_thai_dishes" placeholder="Please specify" style="margin-left: 10px;"><br>
    <span id="error-message" style="color: red; display: none;">You can only select up to 5 options.</span>
</div>
</div>


<!-- Section 4: Shopping Behavior -->
<div class="section">
    <h3>Section 4: Shopping Behavior</h3>

    <div class="question">
        <label>14. Where do you usually purchase Thai Ready-to-cook products?</label><br>
        <input type="radio" id="supermarkets" name="purchase_location" value="Supermarkets">
        <label for="supermarkets">Supermarkets</label><br>
        <input type="radio" id="convenience_stores" name="purchase_location" value="Convenience stores">
        <label for="convenience_stores">Convenience stores (e.g., 7-11)</label><br>
        <input type="radio" id="online_stores" name="purchase_location" value="Online stores">
        <label for="online_stores">Online stores</label><br>
        <input type="radio" id="specialty_stores" name="purchase_location" value="Specialty stores">
        <label for="specialty_stores">Specialty stores (e.g., Thai grocery)</label><br>
        <input type="radio" id="other_purchase" name="purchase_location" value="Others">
        <label for="other_purchase">Others:</label>
        <input type="text" name="other_purchase_location" placeholder="Please specify" style="margin-left: 10px;">
    </div>

    <div class="question">
        <label>15. How much are you willing to spend on a ready-to-cook Thai product? (Package for 2 Servings)</label><br>
        <input type="radio" id="under_500" name="willing_to_spend" value="Under ¥500">
        <label for="under_500">Under &nbsp; ¥500</label><br>
        <input type="radio" id="500_1000" name="willing_to_spend" value="¥500–¥1,000">
        <label for="500_1000">¥500 > ¥1,000</label><br>
        <input type="radio" id="1000_1500" name="willing_to_spend" value="¥1,000–¥1,500">
        <label for="1000_1500">¥1,000 > ¥1,500</label><br>
        <input type="radio" id="over_1500" name="willing_to_spend" value="Over ¥1,500">
        <label for="over_1500">Over &nbsp; ¥1,500</label>
    </div>
</div>

<!-- Section 6: Ready-to-Cook Jad Jaan Products -->
<div class="section">
    <h3>Section 5: Jad Jaan Ready-to-Cook Products</h3>

    <div class="question">
        <label for="menu_items">16. Which Jad Jaan menu item have you tried?</label><br>
        <input type="checkbox" id="khao" name="menu_items[]" value="Khao">
        <label for="khao">Khao</label><br>
        <input type="checkbox" id="nam_prik_kapi" name="menu_items[]" value="Nam Prik Kapi">
        <label for="nam_prik_kapi">Nam Prik Kapi</label><br>
        <input type="checkbox" id="kanom_jeen" name="menu_items[]" value="Kanom Jeen">
        <label for="kanom_jeen">Kanom Jeen</label><br>
        <input type="checkbox" id="gaeng_pak_wan" name="menu_items[]" value="Gaeng Pak Wan">
        <label for="gaeng_pak_wan">Gaeng Pak Wan</label><br>
        <input type="checkbox" id="tom_yum" name="menu_items[]" value="Tom Yum">
        <label for="tom_yum">Tom Yum</label><br>
        <input type="checkbox" id="tom_kha" name="menu_items[]" value="Tom Kha">
        <label for="tom_kha">Tom Kha</label><br>
        <input type="checkbox" id="gaeng_nor_mai" name="menu_items[]" value="Gaeng Nor Mai">
        <label for="gaeng_nor_mai">Gaeng Nor Mai</label><br>
        <input type="checkbox" id="gaeng_khiew_wan" name="menu_items[]" value="Gaeng Khiew Wan">
        <label for="gaeng_khiew_wan">Gaeng Khiew Wan</label><br>
        <input type="checkbox" id="gaeng_khua_hoy" name="menu_items[]" value="Gaeng Khua Hoy">
        <label for="gaeng_khua_hoy">Gaeng Khua Hoy</label><br>
        <input type="checkbox" id="massaman" name="menu_items[]" value="Massaman">
        <label for="massaman">Massaman</label><br>
        <input type="checkbox" id="panang" name="menu_items[]" value="Panang">
        <label for="panang">Panang</label>
    </div>

    <div class="question">
    <label for="taste_rating">17. How would you rate the taste of JadJaan Sampling on a scale of 1 to 5?</label><br>
    <input type="range" id="taste_rating" name="taste_rating" min="1" max="5" value="3" style="width: 50%;" oninput="updateEmoji(this.value)">
    <div id="emoji_display" style="text-align: center; font-size: 24px;">😐 3</div>
</div>

<script>
    function updateEmoji(value) {
        let emoji = '';
        switch (value) {
            case '1':
                emoji = '😞 1';
                break;
            case '2':
                emoji = '🙁 2';
                break;
            case '3':
                emoji = '😐 3';
                break;
            case '4':
                emoji = '😊 4';
                break;
            case '5':
                emoji = '🤩 5';
                break;
        }
        document.getElementById('emoji_display').innerText = emoji;
    }
</script>





<div class="question">
    <label for="packaging_size">18. What packaging size do you find ideal for Jad Jaan?</label><br>
    <input type="radio" id="single_serving" name="packaging_size" value="Single-serving">
    <label for="single_serving">Single-serving</label><br>
    <input type="radio" id="couple_serving" name="packaging_size" value="Couple-serving (2 servings)">
    <label for="couple_serving">Couple-serving (2 servings)</label><br>
    <input type="radio" id="family_serving" name="packaging_size" value="Family-serving (3-5 servings)">
    <label for="family_serving">Family-serving (3-5 servings)</label><br>
    <input type="radio" id="others_packaging_size" name="packaging_size" value="Others">
    <label for="others_packaging_size">Others:</label>
    <input type="text" name="other_packaging_size" placeholder="Please specify" style="margin-left: 10px;">
</div>

<div class="question">
    <label for="design_rating">19. How would you rate the Jadjaan design on a scale of 1 to 5?</label><br>
    <input type="range" id="design_rating" name="design_rating" min="1" max="5" value="3" style="width: 50%;" oninput="updateDesignEmoji(this.value)">
    <div id="design_emoji_display" style="text-align: center; font-size: 24px;">😐 3</div>
</div>

<script>
    function updateDesignEmoji(value) {
        let emoji = '';
        switch (value) {
            case '1':
                emoji = '😞 1';
                break;
            case '2':
                emoji = '🙁 2';
                break;
            case '3':
                emoji = '😐 3';
                break;
            case '4':
                emoji = '😊 4';
                break;
            case '5':
                emoji = '🤩 5';
                break;
        }
        document.getElementById('design_emoji_display').innerText = emoji;
    }
</script>


<div class="question">
    <label for="future_products">20. What future Thai Ready-to-cook JadJaan products would you like to see? (You can select multiple options)</label><br>
    <input type="checkbox" id="curries" name="future_products[]" value="curries">
    <label for="curries">Curries (e.g., green curry, red curry, massaman curry)</label><br>

    <input type="checkbox" id="stir_fries" name="future_products[]" value="stir_fries">
    <label for="stir_fries">Stir-fries (e.g., Pad Thai, Pad See Ew)</label><br>

    <input type="checkbox" id="soups" name="future_products[]" value="soups">
    <label for="soups">Soups (e.g., Tom Yum, Tom Kha Gai)</label><br>

    <input type="checkbox" id="noodle_dishes" name="future_products[]" value="noodle_dishes">
    <label for="noodle_dishes">Noodle dishes (e.g., Pad Kee Mao, Pad Woon Sen)</label><br>

    <input type="checkbox" id="rice_dishes" name="future_products[]" value="rice_dishes">
    <label for="rice_dishes">Rice dishes (e.g., Pineapple Fried Rice, Khao Pad)</label><br>

    <input type="checkbox" id="dips_and_sauces" name="future_products[]" value="dips_and_sauces">
    <label for="dips_and_sauces">Dips and sauces (e.g., Nam Prik, Satay peanut sauce)</label><br>

    <input type="checkbox" id="spring_rolls" name="future_products[]" value="spring_rolls">
    <label for="spring_rolls">Spring rolls (ready-to-fry or pre-made)</label><br>

    <input type="checkbox" id="marinated_meats" name="future_products[]" value="marinated_meats">
    <label for="marinated_meats">Marinated meats (e.g., Moo Yang, Gai Yang)</label><br>
</div>
<div class="question">
    <label for="product_suggestions">21. Do you have any suggestions for improving JadJaan products?</label><br>
    <textarea id="product_suggestions" name="product_suggestions" rows="4" cols="50" placeholder="Please provide your suggestions here..."></textarea><br>
</div>
<button type="submit">Submit</button>

</form>
    </div>
</body>


</html>
