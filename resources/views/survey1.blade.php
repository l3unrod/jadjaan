<!-- resources/views/survey_form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- เพิ่ม jQuery เพื่อให้สามารถใช้ $ selector ได้ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <img src="/Photo/CX_Jadjaan.png" alt="JadJaan Logo" style="display: block; margin: auto; max-width: 100%; height: auto;">

        <!-- Before Entering Question Form (Name and Email) -->
        <form action="{{ route('survey.store') }}" method="POST">
            @csrf
            <!-- csrf token สำหรับความปลอดภัย -->
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
            <div class="section_1">
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
                    <input type="radio" id="others_household" name="household_type" value="Others">
                    <label for="others_household">Others</label>
                    <input type="text" id="other_household" name="other_household" placeholder="Please specify" style="margin-left: 10px;">
                </div>

                <div class="question">
                    <label for="taste_thai_food">5. Have you ever tasted Thai food before?</label><br>
                    <input type="radio" id="skip_yes" name="taste_thai_food" class="skip" value="Yes">
                    <label for="skip_yes">Yes</label><br>
                    <input type="radio" id="skip_no" name="taste_thai_food" class="skip" value="No">
                    <label for="no">No</label><br>
                </div>
            </div>

            <!-- ส่วนที่จะแสดงหรือซ่อน -->
            <div class="section_2_1" id="reasonSection" style="display: none;">
                <h3>Section 2.1</h3>
                <div class="question">
                    <label for="reason_never_tried">Q1. What is the reason you have never tried Thai food?</label><br>
                    <input type="checkbox" id="reason_not_familiar" name="reason_never_tried[]" value="Not familiar with Thai cuisine">
                    <label for="reason_not_familiar">Not familiar with Thai cuisine</label><br>
                    <input type="checkbox" id="reason_dont_like_spicy" name="reason_never_tried[]" value="Don't like spicy food">
                    <label for="reason_dont_like_spicy">Don't like spicy food</label><br>
                    <input type="checkbox" id="reason_concerned_ingredients" name="reason_never_tried[]" value="Concerned about ingredients">
                    <label for="reason_concerned_ingredients">Concerned about ingredients</label><br>
                    <input type="checkbox" id="reason_no_access" name="reason_never_tried[]" value="No access to Thai restaurants or products">
                    <label for="reason_no_access">No access to Thai restaurants or products</label><br>
                    <input type="checkbox" id="reason_price_high" name="reason_never_tried[]" value="Price is too high">
                    <label for="reason_price_high">Price is too high</label><br>
                    <input type="checkbox" id="reason_other" name="reason_never_tried[]" value="Other">
                    <label for="reason_other">Other</label>
                    <input type="text" id="other_reason" name="other_reason" placeholder="Please specify" style="margin-left: 10px;">
                </div>

                <div class="question">
                    <label for="food_type_to_try">Q2. If you were to try Thai food, what type of food would you like to try?</label><br>
                    <input type="checkbox" id="soup" name="food_type_to_try[]" value="Soup">
                    <label for="soup">Soup</label><br>
                    <input type="checkbox" id="noodles" name="food_type_to_try[]" value="Noodles">
                    <label for="noodles">Noodles</label><br>
                    <input type="checkbox" id="stir_fried" name="food_type_to_try[]" value="Stir-fried">
                    <label for="stir_fried">Stir-fried</label><br>
                    <input type="checkbox" id="curry" name="food_type_to_try[]" value="Curry">
                    <label for="curry">Curry</label><br>
                    <input type="checkbox" id="pasta" name="food_type_to_try[]" value="Pasta">
                    <label for="pasta">Pasta</label><br>
                    <input type="checkbox" id="deep_fried" name="food_type_to_try[]" value="Deep-fried">
                    <label for="deep_fried">Deep-fried</label><br>
                    <input type="checkbox" id="other_food" name="food_type_to_try[]" value="Other">
                    <label for="other_food">Other</label>
                    <input type="text" id="other_food_type" name="other_food_type" placeholder="Please specify" style="margin-left: 10px;">
                </div>

                <div class="question">
                    <label for="product_platform_preference">Q3. If you were to try Thai food, which type of product or platform would you prefer to have Thai cuisine served on?</label><br>
                    <input type="checkbox" id="ready_to_cook" name="product_platform_preference[]" value="Ready-to-cook product">
                    <label for="ready_to_cook">Ready-to-cook product (e.g., from a store or online)</label><br>
                    <input type="checkbox" id="ready_to_eat" name="product_platform_preference[]" value="Ready-to-eat product">
                    <label for="ready_to_eat">Ready-to-eat product (e.g., from a store or online)</label><br>
                    <input type="checkbox" id="restaurant" name="product_platform_preference[]" value="Restaurant">
                    <label for="restaurant">Restaurant</label><br>
                    <input type="checkbox" id="street_food" name="product_platform_preference[]" value="Street food">
                    <label for="street_food">Street food</label><br>
                    <input type="checkbox" id="other_platform" name="product_platform_preference[]" value="Other">
                    <label for="other_platform">Other</label>
                    <input type="text" id="other_platform_type" name="other_platform_type" placeholder="Please specify" style="margin-left: 10px;">
                </div>

                <!-- Additional Questions -->
                <div class="question">
                    <label for="jadjaan_sample_rating">Q4. Please rate the JadJaan sample on a scale of 1-5:(1 = Bad, 5 = Good)</label><br>
                    <input type="radio" id="rate_1" name="jadjaan_sample_rating" value="1">
                    <label for="rate_1">1</label><br>
                    <input type="radio" id="rate_2" name="jadjaan_sample_rating" value="2">
                    <label for="rate_2">2</label><br>
                    <input type="radio" id="rate_3" name="jadjaan_sample_rating" value="3">
                    <label for="rate_3">3</label><br>
                    <input type="radio" id="rate_4" name="jadjaan_sample_rating" value="4">
                    <label for="rate_4">4</label><br>
                    <input type="radio" id="rate_5" name="jadjaan_sample_rating" value="5">
                    <label for="rate_5">5</label><br>
                </div>

                <div class="question">
                    <label for="jadjaan_sample_tried">Q5. Have you tried the JadJaan sample?</label><br>
                    <input type="radio" id="jadjaan_sample_yes" name="jadjaan_sample_tried" value="Yes">
                    <label for="jadjaan_sample_yes">Yes</label><br>
                    <input type="radio" id="jadjaan_sample_no" name="jadjaan_sample_tried" value="No">
                    <label for="jadjaan_sample_no">No</label><br>
                </div>
            </div>

            <div class="section_2" id="thaiFoodSection">
                <h3>Section 2: Thai Food - Eating Habits</h3>

                <div class="question">
                    <label for="frequency">6. How often do you eat Thai food?</label><br>
                    <input type="radio" id="once_a_week_or_more" name="thai_food_frequency" value="Once a week or more">
                    <label for="once_a_week_or_more">Once a week or more</label><br>
                    <input type="radio" id="once_a_month" name="thai_food_frequency" value="Once a month">
                    <label for="once_a_month">Once a month</label><br>
                    <input type="radio" id="less_than_once_a_month" name="thai_food_frequency" value="Less than once a month">
                    <label for="less_than_once_a_month">Less than once a month</label><br>
                </div>

                <div class="question">
                    <label for="where_eat">7. Where do you usually eat Thai food?</label><br>
                    <input type="radio" id="restaurants" name="where_eat" value="Restaurants">
                    <label for="restaurants">Restaurants</label><br>
                    <input type="radio" id="home" name="where_eat" value="Home (Cook myself)">
                    <label for="home">Home (Cook myself)</label><br>
                    <input type="radio" id="takeout" name="where_eat" value="Takeout/Delivery">
                    <label for="takeout">Takeout/Delivery</label><br>
                    <input type="radio" id="others_where" name="where_eat" value="Others">
                    <label for="others_where">Others</label>
                    <input type="text" id="other_where_eat" name="other_where_eat" placeholder="Please specify" style="margin-left: 10px;">
                </div>

                <div class="question">
                    <label for="challenges">8. What challenges do you face when cooking Thai Ready-to-cook Product? </label><br>
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
                    <label>9. Have you ever bought Thai Ready-to-cook products before?</label><br>
                    <input type="radio" id="yes_bought" name="bought_before" class = "skip01" value="Yes">
                    <label for="yes_bought">Yes</label><br>
                    <input type="radio" id="no_bought" name="bought_before" class = "skip01" value="No">
                    <label for="no_bought">No</label>
                </div>
            </div>

            {{-- Section 3 --}}
            <div class="section_3" style="display: block;">
            <h3>Section 3: Preferences for Thai Ready-to-Cook Products</h3>

<div class="section_3_1">
    <div class="question">
        <label for="reason_for_buying">3.1 Q. What is your purpose for buying Thai Ready-to-Cook products?</label><br>
        <input type="checkbox" id="personal_consumption" name="reason_for_buying" value="For personal consumption">
        <label for="personal_consumption">For personal consumption</label><br>
        
        <input type="checkbox" id="try_new_flavors" name="reason_for_buying" value="Try new and authentic flavors">
        <label for="try_new_flavors">Try new and authentic flavors</label><br>
        
        <input type="checkbox" id="convenience_time_saving" name="reason_for_buying" value="For convenience and time-saving">
        <label for="convenience_time_saving">For convenience and time-saving</label><br>
        
        <input type="checkbox" id="corporate_gifting" name="reason_for_buying" value="For corporate gifting or special events">
        <label for="corporate_gifting">For corporate gifting or special events</label><br>
        
        <input type="checkbox" id="others" name="reason_for_buying" value="Others">
        <label for="others">Others</label><br>
    </div>
</div>

<

<div class="section_3_2">
    <div class="question">
        <label for="reason_not_purchased">3.2 Q1. What are the reasons you have not purchased Thai Ready-to-Cook products?</label><br>
        <input type="checkbox" id="price_high" name="reason_not_purchased" value="Price too high">
        <label for="price_high">Price too high</label><br>
        <input type="checkbox" id="concern_quality" name="reason_not_purchased" value="Concern about quality">
        <label for="concern_quality">Concern about quality</label><br>

        <input type="checkbox" id="concern_taste" name="reason_not_purchased" value="Concern about taste">
        <label for="concern_taste">Concern about taste</label><br>

        <input type="checkbox" id="concern_ingredients" name="reason_not_purchased" value="Concern about unfamiliar ingredients">
        <label for="concern_ingredients">Concern about unfamiliar ingredients</label><br>

        <input type="checkbox" id="others" name="reason_not_purchased" value="Others">
        <label for="others">Others</label><br>

        <input type="checkbox" id="limited_availability" name="reason_not_purchased" value="Limited availability in local stores">
        <label for="limited_availability">Limited availability in local stores</label><br>
    </div>
</div>

<div class="section_3_2">
    <div class="question">
        <label for="appealing_factors">3.2 Q2. If you were to purchase a Thai Ready-to-Cook product, what appeals to you the most?</label><br>
        <input type="checkbox" id="convenience" name="appealing_factors" value="Convenience">
        <label for="convenience">Convenience</label><br>

        <input type="checkbox" id="authentic_taste" name="appealing_factors" value="Authentic taste">
        <label for="authentic_taste">Authentic taste</label><br>

        <input type="checkbox" id="healthy_ingredients" name="appealing_factors" value="Healthy ingredients">
        <label for="healthy_ingredients">Healthy ingredients</label><br>

        <input type="checkbox" id="affordability" name="appealing_factors" value="Affordability">
        <label for="affordability">Affordability</label><br>

        <input type="checkbox" id="easy_instructions" name="appealing_factors" value="Easy instructions">
        <label for="easy_instructions">Easy instructions</label><br>

        <input type="checkbox" id="brand_reputation" name="appealing_factors" value="Brand reputation">
        <label for="brand_reputation">Brand reputation</label><br>

        <input type="checkbox" id="sustainability" name="appealing_factors" value="Sustainability">
        <label for="sustainability">Sustainability</label><br>

        <input type="checkbox" id="others" name="appealing_factors" value="Others">
        <label for="others">Others</label><br>
    </div>
  <div class="section_3_2">
    <div class="question">
        <label for="willing_to_spend">3.2 How much are you willing to spend on a ready-to-cook Thai product? (Package for 2 Servings)</label><br>
        <input type="radio" id="under_500" name="willing_to_spend" value="Under ¥500">
        <label for="under_500">Under ¥500</label><br>
        
        <input type="radio" id="500_1000" name="willing_to_spend" value="¥500–¥1,000">
        <label for="500_1000">¥500–¥1,000</label><br>
        
        <input type="radio" id="1000_1500" name="willing_to_spend" value="¥1,000–¥1,500">
        <label for="1000_1500">¥1,000–¥1,500</label><br>
        
        <input type="radio" id="over_1500" name="willing_to_spend" value="Over ¥1,500">
        <label for="over_1500">Over ¥1,500</label><br>
    </div>
</div>
</div>


    
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
    <label for="tom_kha">1. Tom Kha </label><br>
    <input type="checkbox" id="tom_yam" name="thai_dishes[]" value="Tom Yam">
    <label for="tom_yam">2. Tom Yam </label><br>

    <!-- Curry (หมวดแกง) -->
    <input type="checkbox" id="panang_curry" name="thai_dishes[]" value="Panaeng Curry">
    <label for="panang_curry">3. Panaeng Curry </label><br>
    <input type="checkbox" id="massaman_curry" name="thai_dishes[]" value="Massaman Curry">
    <label for="massaman_curry">4. Massaman Curry </label><br>
    <input type="checkbox" id="green_curry" name="thai_dishes[]" value="Green Curry">
    <label for="green_curry">5. Green Curry </label><br>
    <input type="checkbox" id="red_curry" name="thai_dishes[]" value="Red Curry">
    <label for="red_curry">6. Red Curry </label><br>
    <input type="checkbox" id="khao_soi" name="thai_dishes[]" value="Khao Soi">
    <label for="khao_soi">7. Khao Soi </label><br>

    <!-- Stir-fry and Others (หมวดผัดและอื่นๆ) -->
    <input type="checkbox" id="pad_thai" name="thai_dishes[]" value="Phod Thai">
    <label for="pad_thai">8. Phod Thai </label><br>
    <input type="checkbox" id="shrimp_paste" name="thai_dishes[]" value="Shrimp Paste">
    <label for="shrimp_paste">9. Shrimp Paste </label><br>
    <input type="checkbox" id="stir_fry_basil" name="thai_dishes[]" value="Stir-fry Holy Basil">
    <label for="stir_fry_basil">10. Stir-fry Holy Basil "Krapao" </label><br>
    <input type="checkbox" id="other_dishes" name="thai_dishes[]" value="Others">
    <label for="other_dishes">11. Others:</label>
    <input type="text" name="other_thai_dishes" placeholder="Please specify" style="margin-left: 10px;"><br>
    <span id="error-message" style="color: red; display: none;">You can only select up to 5 options.</span>
</div>
<div class="question">
    <label for="buy_ready_to_cook">(ข้อหลัก)11. Would you consider buying a Thai Ready-to-cook Thai product if it were available in your area?</label><br>
    <input type="radio" id="yes_ready_to_cook" name="buy_ready_to_cook" value="Yes">
    <label for="yes_ready_to_cook">Yes</label><br>
    <input type="radio" id="no_ready_to_cook" name="buy_ready_to_cook" value="No">
    <label for="no_ready_to_cook">No</label><br>
    </div>
</div>


           

            {{-- Section 4 --}}
            <div class="section_4">
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

            {{-- Section 5 --}}
            <div class="section_5">
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
                <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.skip').click(function (e) {
                let selectedValue = $(this).val();
                if (selectedValue == 'Yes') {
                    $('.section_2_1').css('display', 'none')
                    $('.section_2').css('display', 'block')
                    $('.section_4').css('display', 'block')
                    $('.section_5').css('display', 'block')
                }else {
                    $('.section_2_1').css('display', 'block')
                    $('.section_2').css('display', 'none')
                    $('.section_4').css('display', 'none')
                    $('.section_5').css('display', 'block')

                }
            });

            $('.skip01').click(function (e) {
                let selectedValue = $(this).val();
                if (selectedValue == 'Yes') {
                    $('.section_3_1').css('display', 'block')
                    $('.section_3_2').css('display', 'none')
                //    console.log(selectedValue);
                   
                }else {
                    $('.section_3_1').css('display', 'none')
                    $('.section_3_2').css('display', 'block')

                }
                
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // เมื่อโหลดหน้าเว็บ ให้ตรวจสอบ event listener ต่างๆ
            const skipYes = document.getElementById('skip_yes');
            const no = document.getElementById('no');
            const reasonSection = document.getElementById('reasonSection');
            const thaiFoodSection = document.getElementById('thaiFoodSection');

            // ฟังก์ชันที่จะทำงานเมื่อกด Yes (เคยทานอาหารไทย)
            function handleYesSelected() {
                if (skipYes.checked) {
                    reasonSection.style.display = 'none';
                    thaiFoodSection.style.display = 'block';

                    // แสดง alert เมื่อผู้ใช้เลือก Yes
                    // alert("คุณเลือกว่าเคยทานอาหารไทย กำลังข้ามไปยังส่วนถัดไป");
                }
            }
        });

        function Display_Show() {
            const selectedValue = document.querySelector('input[name="taste_thai_food"]:checked').value;
            const codition = selectedValue;
            if (condition == 'Yes') {

            } else {

            }
        }

    </script>

    
</body>
</html>
