<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelperController;
use App\Http\Filters\CommentApi\CommentApiFilter;
use App\Http\Filters\CommentTopics\CommentTopicsFilter;
use App\Http\Filters\CommentCategory\CommentCategoryFilter;

class HomeController extends Controller
{

    public function index()
    {
        // overall statistics
        $overAllComments = $this->getOverAllComments();

        // chuncks  statistics
        $queryChunk = $this->getChunksData();
        $negativeChunks = $queryChunk->negative;
        $positiveChunks = $queryChunk->positive;
        $neutralChunks = $queryChunk->neutral;
        $chunksCount = $negativeChunks + $positiveChunks + $neutralChunks;

        // column-chart
        $catsData = $this->getCategoriesData();

        $categoryChartData = $catsData['categoryChartData'];
        $categories = $catsData['categories'];

        // trend Chart Data
        $trendChartData = $this->getDataMonthly();

        // Topics Data
        $topicsData = $this->getTopicsData();
        $topics = $topicsData['topics'];
        $topicPositive = $topicsData['topicPositive'];
        $topicNegative = $topicsData['topicNegative'];

        // data for filters
        $colors = HelperController::getColors();
        $clients = DB::table('clients')->select('c_id', 'c_acronym')->get();
        $services = DB::table('services')->select('s_id', 's_name')->get();


        return view('home', compact('overAllComments', 'chunksCount', 'negativeChunks', 'positiveChunks', 'neutralChunks', 'colors', 'clients', 'services', 'categoryChartData', 'trendChartData', 'topics', 'topicPositive', 'topicNegative', 'categories'));
    }



    public function getDataYearly()
    {

        $start_year = Carbon::now()->subYears(3);
        $end_year = Carbon::now();
        $period = collect(CarbonPeriod::create($start_year, '1 year', $end_year))->map(function ($date) {
            return $date->format('Y');
        })->toArray();

        $commentsYearly = $this->filterData()->whereBetween('sn_amenddate', [$start_year, $end_year])
            ->select(DB::raw('sn_year as year'), 'r_rate', DB::raw('count(*) as count'))
            ->where('r_rate', '!=', 'mixed')
            ->groupBy('year', 'r_rate')
            ->get();
        $trendChartData = HelperController::trendHandelArr('yearly', $period, $commentsYearly);

        return response()->json($trendChartData);
    }

    public function getDataMonthly()
    {
        $start_date = Carbon::now()->subMonth(11);
        $end_date = Carbon::now();
        $period = collect(CarbonPeriod::create($start_date, '1 month', $end_date))->map(function ($date) {
            return $date->format('Y-m-d');
        })->toArray();
        $commentsMonthly = $this->filterData()->whereBetween('sn_amenddate', [$start_date, $end_date])
            ->select(DB::raw('sn_year as year'), DB::raw('sn_month as month'), 'r_rate', DB::raw('count(*) as count'))
            ->where('r_rate', '!=', 'mixed')
            ->orderBy('month', 'asc')
            ->groupBy('year', 'month', 'r_rate')
            ->get();
        $trendChartData = HelperController::trendHandelArr('monthly', $period, $commentsMonthly);
        return $trendChartData;
    }

    public function getDataQuarterly()
    {
        $start_quarter = Carbon::now()->subQuarter(5);
        $end_quarter = Carbon::now();
        $period = collect(CarbonPeriod::create($start_quarter, '1 quarter', $end_quarter))->map(function ($date) {
            return $date->format('Y-m-d');
        })->toArray();

        $commentsQuarterly = $this->filterData()->whereBetween('sn_amenddate', [$start_quarter, $end_quarter])
            ->select(DB::raw('sn_year as year'), DB::raw('sn_quarter as quarter'), 'r_rate', DB::raw('count(*) as count'))
            ->where('r_rate', '!=', 'mixed')
            ->orderBy('quarter', 'asc')
            ->groupBy('year', 'quarter', 'r_rate')
            ->get();
        $trendChartData = HelperController::trendHandelArr('quarterly', $period, $commentsQuarterly);
        return response()->json($trendChartData);
    }

    public function getTopicsData()
    {
        $topics = (new CommentTopicsFilter())->whereHas('comments')->withCount('negative', 'positive')->get();
        $topicPositive = $topics->pluck('positive_count')->toArray();
        $topicNegative = $topics->pluck('negative_count')->toArray();

        return [
            'topics' => $topics,
            'topicPositive' => $topicPositive,
            'topicNegative' => $topicNegative
        ];
    }
    private function filterData()
    {
        return (new CommentApiFilter());
    }


    private function getOverAllComments()
    {
        return $this->filterData()
            ->selectRaw("count(CASE when r_rate = 'positive' THEN 1 END) AS positive")
            ->selectRaw("count(CASE when r_rate = 'negative' THEN 1 END) AS negative")
            ->selectRaw("count(CASE when r_rate = 'neutral' THEN 1 END) AS neutral")
            ->selectRaw("count(CASE when r_rate = 'mixed' THEN 1 END) AS mixed")
            ->first();
    }

    private function getChunksData()
    {
        return $this->filterData()->join('chunks', 'chunks.sn_id', '=', 'comments_api.sn_id')
            ->selectRaw("COUNT(CASE WHEN comments_api.sn_id = chunks.sn_id and chunks.ch_rate = 'positive' THEN 1 END) AS positive")
            ->selectRaw("count(CASE WHEN comments_api.sn_id = chunks.sn_id and chunks.ch_rate = 'negative' THEN 1 END) AS negative")
            ->selectRaw("COUNT(CASE WHEN comments_api.sn_id = chunks.sn_id and chunks.ch_rate = 'neutral' THEN 1 END) AS neutral")
            ->first();
    }

    private function getCategoriesData()
    {
        $categories = (new CommentCategoryFilter())->whereHas('comments')->select()->withCount(['negative', 'positive', 'neutral'])->get();
        $categoryChartData = [
            'positive' => [
                'data' => $categories->pluck('positive_count')->toArray(),
                'name' =>   $categories->pluck('c_name')->toArray()
            ],
            'negative' => [
                'data' => $categories->pluck('negative_count')->toArray(),
                'name' =>   $categories->pluck('c_name')->toArray()
            ],
            'neutral' => [
                'data' => $categories->pluck('neutral_count')->toArray(),
                'name' =>   $categories->pluck('c_name')->toArray()
            ]
        ];

        return ['categoryChartData' => $categoryChartData, 'categories' => $categories];
    }



}
