<?php namespace Cysha\Modules\Faq\Repositories\Category;

use Illuminate\Database\Eloquent\Collection;
use Cysha\Modules\Core\Repositories\BaseDbRepository;
use Cysha\Modules\Faq as Faq;
use Cache;
use DB;
use Str;

class DbRepository extends BaseDbRepository implements RepositoryInterface
{
    public $model;

    public function __construct(Faq\Models\Category $model)
    {
        $this->model = $model;
    }

    public function all(array $with = [])
    {
        if (($cache = \Cache::get('faq::categories-all')) === null) {
            $cache = $this->make(['question']+$with)->whereActive(1)->get();
            \Cache::put('faq::categories-all', $cache, 30); // cache it for half hour
        }

        return $cache;
    }

    public function getById($primary_key, array $with = [])
    {
        $collection = [];
        foreach ($this->all($with) as $model) {
            if ($model->primary_key == $primary_key) {
                $collection[] = $model;
            }
        }
        return new Collection($collection);
    }

    public function getAll(array $with = [])
    {
        return $this->transformModel($this->all($with));
    }

    public function get($identifer)
    {
        return $this->getFirstBy((is_number($identifer) ? 'id' : 'slug'), $identifer, [], true);
    }

    public function getQuestions(Faq\Models\Category $category)
    {
        if (!$category->active) {
            return [];
        }

        $questions = $category->question->all();
        return count($questions) ? $this->transformModel(new Collection($questions)) : [];
    }
}
