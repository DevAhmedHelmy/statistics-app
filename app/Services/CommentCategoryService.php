<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Traits\HandleFilterRequest;

class CommentCategoryService
{
    use HandleFilterRequest;
    public function getCommentCategory()
    {
        $dataFilter =
            DB::table('comments_categories')
            ->join('comment_category', 'comment_category.category_id', '=', 'comments_categories.c_id')
            ->join('comments_api', 'comments_api.sn_id', '=', 'comment_category.comment_id')
            ->when($this->checkFilterParams('client_id'), function ($q) {
                $q->where('comments_api.sn_client', request()->filter['client_id']);
            })
            ->when($this->checkFilterParams('service_id'), function ($q) {
                $q->where('comments_api.sn_service', request()->filter['service_id']);
            });
        return $dataFilter;
    }

    public function getCategories()
    {
        return DB::table('comments_categories')->select('c_id as category_id', 'c_name')->get();
    }

    public function getCategoriesData()
    {
        $categories =$this->getCommentCategory()
            ->select('comment_category.category_id', 'comments_categories.c_name as c_name', 'comments_api.sn_id', 'comments_api.sn_client')
            ->selectRaw("count(CASE WHEN comments_api.sn_id = comment_category.comment_id and comments_api.r_rate = 'positive' THEN 1 END) AS positive_count")
            ->selectRaw("count(CASE WHEN comments_api.sn_id = comment_category.comment_id and comments_api.r_rate = 'negative' THEN 1 END) AS negative_count")
            ->selectRaw("count(CASE WHEN comments_api.sn_id = comment_category.comment_id and comments_api.r_rate = 'neutral' THEN 1 END) AS neutral_count")
            ->groupBy('comments_categories.c_id', 'comments_categories.c_name')
            ->get();

        return $categories;
    }
    public function getHeatMapData()
    {
        $categories = $this->getCommentCategory()
            ->join('comment_topic', 'comment_topic.comment_id', '=', 'comment_category.comment_id')
            ->join('comments_topics', 'comments_topics.t_id', '=', 'comment_topic.topic_id')
            ->select('comments_categories.c_name as category_name', 'comment_category.comment_id', 'comments_topics.t_name as topic_name', 'comment_topic.topic_id', DB::raw('count(comment_topic.topic_id) as count'))
            ->orderBy('comments_categories.c_name', 'ASC')
            ->groupBy('comments_categories.c_name', 'comments_topics.t_name', 'comment_topic.topic_id')
            ->get();


        return $categories;
    }

    public function getHeatMapComments()
    {
        $categories = $this->getCommentCategory()
            ->join('comment_topic', 'comment_topic.comment_id', '=', 'comment_category.comment_id')
            ->join('comments_topics', 'comments_topics.t_id', '=', 'comment_topic.topic_id')
            ->select('comments_categories.c_name as category_name', 'comment_category.comment_id', 'comments_topics.t_name as topic_name', 'comment_topic.topic_id', DB::raw('count(comment_topic.topic_id) as count'),'comments_api.*')
            ->where('comments_topics.t_name',request()->topic)
            ->where('comments_categories.c_name', request()->category)
            ->groupBy('comment_topic.topic_id', 'comment_topic.comment_id', 'comment_category.category_id')
            ->get();

        return ['data'=> $categories];
    }



}
