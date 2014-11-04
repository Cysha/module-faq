<?php namespace Cysha\Modules\Faq\Controllers\Admin\Question;

use Cysha\Modules\Faq as Faq;

class QuestionController extends BaseQuestionController
{

    public function getView(Faq\Models\Question $objQuestion)
    {

        return $this->setView('admin.question.view', [
            'question' => $objQuestion,
        ], 'module');
    }

    public function toggleActive()
    {
    }

}
