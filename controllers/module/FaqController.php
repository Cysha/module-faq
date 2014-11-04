<?php namespace Cysha\Modules\Faq\Controllers\Module;

use Cysha\Modules\Faq as Faq;
use Cysha\Modules\Faq\Repositories\Category\RepositoryInterface as CategoryRepository;

class FaqController extends BaseController
{
    private $category;

    public function __construct(CategoryRepository $category)
    {
        parent::__construct();

        $this->category = $category;
    }

    public function getIndex()
    {
        return $this->getCategory(1);
    }

    public function getCategory($identifier)
    {
        $categories = $this->category->getAll();
        $category = $this->category->get($identifier);
        if ($category === null) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        }

        $questions = $this->category->getQuestions($category);

        return $this->setView('module.index', [
            'categories' => $categories,
            'category'   => $category,
            'questions'  => $questions,
        ]);
    }
}
