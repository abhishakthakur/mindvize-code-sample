<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

// Excerpt covering pagination and card preparation for the career library.
class CareerLibraryController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->data();
        $allCareers = $this->allCareers($data);
        $perPage = 20;
        $lastPage = max(1, (int) ceil(count($allCareers) / $perPage));
        $currentPage = min(max(1, $request->integer('page', 1)), $lastPage);
        $careers = new LengthAwarePaginator(
            array_slice($allCareers, ($currentPage - 1) * $perPage, $perPage),
            count($allCareers),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
                'pageName' => 'page',
            ]
        );

        return view('career-library', [
            'icons' => $data['icons'],
            'countries' => $data['countries'],
            'languages' => array_keys($data['languageCodes']),
            'badges' => $data['badges'],
            'careers' => $careers,
            'careerAutocomplete' => $data['careerAutocomplete'],
            'uiText' => $data['uiText'],
            'defaults' => $data['routeConfiguration'],
            'error' => $request->session()->get('career_library_error'),
        ]);
    }

    /**
     * The 20 curated careers come with their own icon/colour from the data
     * file. Everything else in the full career list doesn't have that
     * per-item styling, so it's given one by cycling through the icons and
     * colours the curated set already uses — same visual language, no new
     * palette to maintain.
     */
    protected function allCareers(array $data): array
    {
        $trending = $data['trendingCareers'];
        $trendingTitles = array_column($trending, 'title');
        $remainingTitles = array_values(array_diff($data['careerAutocomplete'], $trendingTitles));

        $iconCycle = array_values(array_unique(array_column($trending, 'iconType')));
        $colorCycle = array_map(fn ($item) => ['bg' => $item['bg'], 'text' => $item['text']], $trending);

        $remaining = array_map(function ($title, $i) use ($iconCycle, $colorCycle) {
            $color = $colorCycle[$i % count($colorCycle)];

            return [
                'title' => $title,
                'iconType' => $iconCycle[$i % count($iconCycle)],
                'bg' => $color['bg'],
                'text' => $color['text'],
            ];
        }, $remainingTitles, array_keys($remainingTitles));

        return array_merge($trending, $remaining);
    }
}
