<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; padding-top: 20px; }
        .card { box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 20px; }
        .stat-card { transition: all 0.3s; border-left: 4px solid #4e73df; }
        .stat-card:hover { transform: translateY(-5px); }
        .table-responsive { margin-bottom: 30px; }
        .section-title { margin: 30px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid #e3e6f0; }
        thead { background-color: #4e73df; color: white; }
        .bg-gradient-primary { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1 class="bg-gradient-primary p-3 rounded">Survey Dashboard</h1>
            </div>
        </div>

        <!-- Summary Stats -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body text-center">
                        <h3 class="display-4 fw-bold text-primary">{{ isset($totalResponses) ? $totalResponses : 0 }}</h3>
                        <p class="text-muted mb-0">Total Responses</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body text-center">
                        <h3 class="display-4 fw-bold text-success">{{ isset($totalCountries) ? $totalCountries : 0 }}</h3>
                        <p class="text-muted mb-0">Countries Represented</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body text-center">
                        <h3 class="display-4 fw-bold text-info">{{ isset($avgAge) ? $avgAge : 'N/A' }}</h3>
                        <p class="text-muted mb-0">Most Common Age Group</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Demographics Statistics -->
        <h2 class="section-title">Demographics</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Option</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Gender Distribution -->
                                    @if(isset($genderStats) && count($genderStats) > 0)
                                        <tr class="table-primary">
                                            <td colspan="4"><strong>Gender Distribution</strong></td>
                                        </tr>
                                        @foreach($genderStats as $gender => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $gender }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Age Group Distribution -->
                                    @if(isset($ageGroupStats) && count($ageGroupStats) > 0)
                                        <tr class="table-primary">
                                            <td colspan="4"><strong>Age Group Distribution</strong></td>
                                        </tr>
                                        @foreach($ageGroupStats as $ageGroup => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $ageGroup }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Nation Distribution (Top 5) -->
                                    @if(isset($nationStats) && count($nationStats) > 0)
                                        <tr class="table-primary">
                                            <td colspan="4"><strong>Top Countries</strong></td>
                                        </tr>
                                        @foreach($nationStats as $nation => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $nation }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Food Consumption Habits -->
        <h2 class="section-title">Thai Food Consumption Habits</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Option</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Thai Food Frequency -->
                                    @if(isset($foodFrequencyStats) && count($foodFrequencyStats) > 0)
                                        <tr class="table-info">
                                            <td colspan="4"><strong>Consumption Frequency</strong></td>
                                        </tr>
                                        @foreach($foodFrequencyStats as $frequency => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $frequency }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Where People Eat -->
                                    @if(isset($whereEatStats) && count($whereEatStats) > 0)
                                        <tr class="table-info">
                                            <td colspan="4"><strong>Where People Eat</strong></td>
                                        </tr>
                                        @foreach($whereEatStats as $location => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $location }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Cooked Thai Food -->
                                    @if(isset($cookedStats) && count($cookedStats) > 0)
                                        <tr class="table-info">
                                            <td colspan="4"><strong>Have Cooked Thai Food</strong></td>
                                        </tr>
                                        @foreach($cookedStats as $answer => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $answer }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Thai Dishes -->
        <h2 class="section-title">Popular Thai Dishes</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dish</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($thaiDishesStats) && count($thaiDishesStats) > 0)
                                        @foreach($thaiDishesStats as $dish => $stats)
                                        <tr>
                                            <td>{{ $dish }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appeal Factors -->
        <h2 class="section-title">What Appeals About Thai Food</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Appeal Factor</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($appealStats) && count($appealStats) > 0)
                                        @foreach($appealStats as $factor => $stats)
                                        <tr>
                                            <td>{{ $factor }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Purchase Behavior -->
        <h2 class="section-title">Purchase Behavior</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Option</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Purchase Location -->
                                    @if(isset($purchaseLocationStats) && count($purchaseLocationStats) > 0)
                                        <tr class="table-success">
                                            <td colspan="4"><strong>Purchase Location</strong></td>
                                        </tr>
                                        @foreach($purchaseLocationStats as $location => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $location }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Willing to Spend -->
                                    @if(isset($spendingStats) && count($spendingStats) > 0)
                                        <tr class="table-success">
                                            <td colspan="4"><strong>Willing to Spend</strong></td>
                                        </tr>
                                        @foreach($spendingStats as $priceRange => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $priceRange }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Ready to Cook -->
                                    @if(isset($readyToCookStats) && count($readyToCookStats) > 0)
                                        <tr class="table-success">
                                            <td colspan="4"><strong>Buy Ready-to-Cook</strong></td>
                                        </tr>
                                        @foreach($readyToCookStats as $answer => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $answer }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brand Preferences -->
        <h2 class="section-title">Brand Preferences</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand Factor</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($brandChoiceStats) && count($brandChoiceStats) > 0)
                                        @foreach($brandChoiceStats as $factor => $stats)
                                        <tr>
                                            <td>{{ $factor }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Challenges -->
        <h2 class="section-title">Challenges When Cooking Thai Food</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Challenge</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($challengesStats) && count($challengesStats) > 0)
                                        @foreach($challengesStats as $challenge => $stats)
                                        <tr>
                                            <td>{{ $challenge }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Preferences -->
        <h2 class="section-title">Product Preferences</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Option</th>
                                        <th>Count</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menu Items -->
                                    @if(isset($menuItemsStats) && count($menuItemsStats) > 0)
                                        <tr class="table-warning">
                                            <td colspan="4"><strong>Preferred Menu Items</strong></td>
                                        </tr>
                                        @foreach($menuItemsStats as $item => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $item }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Flavors -->
                                    @if(isset($flavorStats) && count($flavorStats) > 0)
                                        <tr class="table-warning">
                                            <td colspan="4"><strong>Preferred Flavors</strong></td>
                                        </tr>
                                        @foreach($flavorStats as $flavor => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $flavor }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                    <!-- Packaging Size -->
                                    @if(isset($packagingStats) && count($packagingStats) > 0)
                                        <tr class="table-warning">
                                            <td colspan="4"><strong>Preferred Packaging Size</strong></td>
                                        </tr>
                                        @foreach($packagingStats as $size => $stats)
                                        <tr>
                                            <td></td>
                                            <td>{{ $size }}</td>
                                            <td>{{ $stats['count'] }}</td>
                                            <td>{{ $stats['percentage'] }}%</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Responses -->
        <h2 class="section-title">Recent Responses</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($recentResponses) && count($recentResponses) > 0)
                                        @foreach($recentResponses as $response)
                                        <tr>
                                            <td>{{ $response->id }}</td>
                                            <td>{{ $response->name }}</td>
                                            <td>{{ $response->email }}</td>
                                            <td>{{ $response->nation }}</td>
                                            <td>{{ $response->created_at->format('Y-m-d H:i') }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No recent responses</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>