<?php

namespace App\Http\Controllers;

use App\Models\MenuRecommendation;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class MenuRecommendationController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only([
            'taste_profile',
            'sweetness_level',
            'menu_type',
        ]);

        return view('menu-recommendations.index', [
            'hero' => SiteContent::section('menus', 'hero'),
            'menus' => MenuRecommendation::filter($filters)
                ->latest()
                ->paginate(9)
                ->withQueryString(),
            'tasteProfiles' => MenuRecommendation::TASTE_PROFILES,
            'sweetnessLevels' => MenuRecommendation::SWEETNESS_LEVELS,
            'menuTypes' => MenuRecommendation::MENU_TYPES,
            'filters' => $filters,
        ]);
    }

    public function show(MenuRecommendation $menuRecommendation)
    {
        return view('menu-recommendations.show', [
            'menu' => $menuRecommendation,
        ]);
    }
}
