<?php namespace Cysha\Modules\Faq\Controllers\Admin\Category;

use Cysha\Modules\Core\Controllers\BaseAdminController as BAC;
use Cysha\Modules\Faq as Faq;
use Former;
use URL;

class BaseCategoryController extends BAC
{
    public function __construct()
    {
        parent::__construct();

        $this->objTheme->setTitle('Category Manager');
        $this->objTheme->breadcrumb()->add('Category Manager', URL::route('faq.category.index'));
    }

    public function getCategoryDetails(Faq\Models\Category $question)
    {
        Former::populate($question);

        return compact('question');
    }

}
