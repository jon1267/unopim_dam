<?php

namespace Webkul\ElasticSearch\Observers;

use Elastic\Elasticsearch\Exception\ElasticsearchException;
use Illuminate\Support\Facades\Log;
use Webkul\Category\Models\Category as Categories;
use Webkul\Core\Facades\ElasticSearch;

class Category
{
    /**
     * Elastic search Index.
     *
     * @var string
     */
    private $indexPrefix;

    public function __construct()
    {
        $this->indexPrefix = config('elasticsearch.prefix');
    }

    public function created(Categories $category)
    {
        if (config('elasticsearch.enabled')) {
            try {
                ElasticSearch::index([
                    'index' => strtolower($this->indexPrefix.'_categories'),
                    'id'    => $category->id,
                    'body'  => $category->toArray(),
                ]);
            } catch (ElasticsearchException $e) {
                Log::channel('elasticsearch')->error('Exception while creating id: '.$category->id.' in '.$this->indexPrefix.'_categories index: ', [
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }

    public function updated(Categories $category)
    {
        if (config('elasticsearch.enabled')) {
            try {
                ElasticSearch::index([
                    'index' => strtolower($this->indexPrefix.'_categories'),
                    'id'    => $category->id,
                    'body'  => $category->toArray(),
                ]);
            } catch (ElasticsearchException $e) {
                Log::channel('elasticsearch')->error('Exception while updating id: '.$category->id.' in '.$this->indexPrefix.'_categories index: ', [
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }

    public function deleted(Categories $category)
    {
        if (config('elasticsearch.enabled')) {
            try {
                ElasticSearch::delete([
                    'index' => strtolower($this->indexPrefix.'_categories'),
                    'id'    => $category->id,
                ]);
            } catch (ElasticsearchException $e) {
                Log::channel('elasticsearch')->error('Exception while deleting id: '.$category->id.' from '.$this->indexPrefix.'_categories index: ', [
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
