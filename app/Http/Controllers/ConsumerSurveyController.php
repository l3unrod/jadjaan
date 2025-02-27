<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // เพิ่มการ import DB

class ConsumerSurveyController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all()); // ใช้เพื่อดูข้อมูลที่ส่งมาจากฟอร์ม

        $validated = $request->validate([
            // ส่วนที่มีอยู่เดิม
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nation' => 'nullable|string|max:255',
            'age_group' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'household_type' => 'nullable|string|max:255',
            'other_household' => 'nullable|string|max:255',
            'thai_food_frequency' => 'nullable|string|max:255',
            'where_eat' => 'nullable|string|max:255',
            'other_where_eat' => 'nullable|string|max:255',
            'cooked_thai_food' => 'nullable|string|max:255',
            'appeal' => 'nullable|array',
            'other_appeal' => 'nullable|string|max:255',
            'thai_dishes' => 'nullable|array',
            'other_thai_dishes' => 'nullable|string|max:255',
            'purchase_location' => 'nullable|string|max:255',
            'other_purchase_location' => 'nullable|string|max:255',
            'willing_to_spend' => 'nullable|string|max:255',

            // Section 5
            'challenges' => 'nullable|array',
            'other_challenges' => 'nullable|string|max:255',
            'buy_ready_to_cook' => 'nullable|string|max:255',
            'brand_choice' => 'nullable|array',
            'other_brand_choice' => 'nullable|string|max:255',

            // Section 6
            'menu_items' => 'nullable|array',
            'flavors' => 'nullable|string|max:255',
            'other_flavors' => 'nullable|string|max:255',
            'packaging_size' => 'nullable|string|max:255',
            'other_packaging_size' => 'nullable|string|max:255',
            'suggestions' => 'nullable|string',
        ]);

        // แปลงข้อมูล array เป็น JSON ก่อนบันทึก
        $arrayFields = ['appeal', 'thai_dishes', 'challenges', 'brand_choice', 'menu_items'];
        foreach ($arrayFields as $field) {
            if (isset($validated[$field])) {
                $validated[$field] = json_encode($validated[$field]);
            }
        }

        try {
            // สร้างระเบียนข้อมูลใหม่
            SurveyResponse::create($validated);
            
            // ส่งกลับพร้อมข้อความสำเร็จ
            return redirect()->back()->with('success', 'Survey submitted successfully!');
        } catch (\Exception $e) {
            // กรณีเกิดข้อผิดพลาด
            return redirect()->back()
                ->with('error', 'Error submitting survey. Please try again.')
                ->withInput();
        }
    }
    /**
 * Display the dashboard with survey statistics
 *
 * @return \Illuminate\View\View
 */
public function dashboard()
{
    // Get total responses
    $totalResponses = SurveyResponse::count();
    
    // Get unique countries count
    $totalCountries = SurveyResponse::distinct('nation')->count('nation');
    
    // Get most common age group
    $avgAge = SurveyResponse::select('age_group', DB::raw('count(*) as count'))
                ->groupBy('age_group')
                ->orderByDesc('count')
                ->first();
    $avgAge = $avgAge ? $avgAge->age_group : 'N/A';
    
    // Get recent responses
    $recentResponses = SurveyResponse::latest()->take(10)->get();
    
    // Gender statistics
    $genderStats = $this->getStatistics('gender');
    
    // Age group statistics
    $ageGroupStats = $this->getStatistics('age_group');
    
    // Nation statistics (top 5)
    $nationStats = SurveyResponse::select('nation', DB::raw('count(*) as count'))
                ->whereNotNull('nation')
                ->groupBy('nation')
                ->orderByDesc('count')
                ->take(5)
                ->get()
                ->mapWithKeys(function ($item) use ($totalResponses) {
                    $percentage = $totalResponses > 0 ? round(($item->count / $totalResponses) * 100, 1) : 0;
                    return [$item->nation => ['count' => $item->count, 'percentage' => $percentage]];
                })
                ->toArray();
    
    // Thai food frequency statistics
    $foodFrequencyStats = $this->getStatistics('thai_food_frequency');
    
    // Where eat statistics
    $whereEatStats = $this->getStatistics('where_eat');
    
    // Cooked Thai food statistics
    $cookedStats = $this->getStatistics('cooked_thai_food');
    
    // Thai dishes statistics
    $thaiDishesStats = $this->getArrayFieldStatistics('thai_dishes');
    
    // Appeal factors statistics
    $appealStats = $this->getArrayFieldStatistics('appeal');
    
    // Purchase location statistics
    $purchaseLocationStats = $this->getStatistics('purchase_location');
    
    // Willing to spend statistics
    $spendingStats = $this->getStatistics('willing_to_spend');
    
    // Ready to cook statistics
    $readyToCookStats = $this->getStatistics('buy_ready_to_cook');
    
    // Brand choice statistics
    $brandChoiceStats = $this->getArrayFieldStatistics('brand_choice');
    
    // Challenges statistics
    $challengesStats = $this->getArrayFieldStatistics('challenges');
    
    // Menu items statistics
    $menuItemsStats = $this->getArrayFieldStatistics('menu_items');
    
    // Flavor statistics
    $flavorStats = $this->getStatistics('flavors');
    
    // Packaging size statistics
    $packagingStats = $this->getStatistics('packaging_size');
    
    return view('dashboard', compact(
        'totalResponses', 
        'totalCountries', 
        'avgAge',
        'recentResponses',
        'genderStats',
        'ageGroupStats',
        'nationStats',
        'foodFrequencyStats',
        'whereEatStats',
        'cookedStats',
        'thaiDishesStats',
        'appealStats',
        'purchaseLocationStats',
        'spendingStats',
        'readyToCookStats',
        'brandChoiceStats',
        'challengesStats',
        'menuItemsStats',
        'flavorStats',
        'packagingStats'
    ));
}

/**
 * Get statistics for a simple field
 *
 * @param string $field
 * @return array
 */
private function getStatistics($field)
{
    $totalResponses = SurveyResponse::count();
    
    return SurveyResponse::select($field, DB::raw('count(*) as count'))
            ->whereNotNull($field)
            ->groupBy($field)
            ->get()
            ->mapWithKeys(function ($item) use ($field, $totalResponses) {
                $fieldValue = $item->{$field} ?: 'Not specified';
                $percentage = $totalResponses > 0 ? round(($item->count / $totalResponses) * 100, 1) : 0;
                return [$fieldValue => ['count' => $item->count, 'percentage' => $percentage]];
            })
            ->toArray();
}

/**
 * Get statistics for JSON array fields
 *
 * @param string $field
 * @return array
 */
private function getArrayFieldStatistics($field)
{
    $totalResponses = SurveyResponse::count();
    $results = [];
    
    // Get all responses where field is not null
    $responses = SurveyResponse::whereNotNull($field)->get();
    
    // Count occurrences of each option
    $counts = [];
    foreach ($responses as $response) {
        $options = json_decode($response->{$field}, true);
        if (is_array($options)) {
            foreach ($options as $option) {
                if (!isset($counts[$option])) {
                    $counts[$option] = 0;
                }
                $counts[$option]++;
            }
        }
    }
    
    // Calculate percentages
    foreach ($counts as $option => $count) {
        $percentage = $totalResponses > 0 ? round(($count / $totalResponses) * 100, 1) : 0;
        $results[$option] = ['count' => $count, 'percentage' => $percentage];
    }
    
    // Sort by count descending
    uasort($results, function ($a, $b) {
        return $b['count'] <=> $a['count'];
    });
    
    return $results;
}
}
