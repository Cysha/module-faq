<?php namespace Cysha\Modules\Faq\Controllers\Admin\Question;

use Cysha\Modules\Core\Controllers\BaseAdminController as BAC;
use Cysha\Modules\Faq as Faq;
use Former;
use URL;

class BaseQuestionController extends BAC
{
    public function __construct()
    {
        parent::__construct();

        $this->objTheme->setTitle('Questions Manager');
        $this->objTheme->breadcrumb()->add('Questions Manager', URL::route('faq.question.index'));
    }

    public function getQuestionDetails(Faq\Models\Question $question)
    {
        Former::populate($question);

        return compact('question');
    }

}
