<?php namespace Cysha\Modules\Faq\Controllers\Admin\Question\QuestionEdit;

use Cysha\Modules\Faq\Controllers\Admin\Question\BaseQuestionController;
use Cysha\Modules\Faq as Faq;
use Redirect;

class FormController extends BaseQuestionController
{
    public function getEdit(Faq\Models\Question $objQuestion)
    {
        $data = $this->getQuestionDetails($objQuestion);
        $this->objTheme->setTitle('Question Manager <small>> Editing Question</small>');

        return $this->setView('admin.question.form', [
            'categories' => Faq\Models\Category::all(),
        ], 'module');
    }

    public function postEdit(Faq\Models\Question $objQuestion)
    {
        $objQuestion->hydrateFromInput();

        if ($objQuestion->save() === false) {
            return Redirect::back()->withErrors($objQuestion->getErrors());
        }

        return Redirect::route('admin.question.form', $objQuestion->id)->withInfo('Question Updated');
    }

}
