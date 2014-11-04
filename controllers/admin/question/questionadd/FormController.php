<?php namespace Cysha\Modules\Faq\Controllers\Admin\Question\QuestionAdd;

use Cysha\Modules\Faq\Controllers\Admin\Question\BaseQuestionController;
use Cysha\Modules\Faq as Faq;
use Former;
use URL;
use Redirect;

class FormController extends BaseQuestionController
{
    public function getAdd()
    {
        $this->objTheme->setTitle('Question Manager <small>> New Question</small>');

        return $this->setView('admin.question.form', [
            'categories' => Faq\Models\Category::all(),
        ], 'module');
    }

    public function postAdd()
    {
        $objQuestion = new Faq\Models\Question;
        $objQuestion->hydrateFromInput();

        if ($objQuestion->save() === false) {
            return Redirect::back()->withErrors($objQuestion->getErrors());
        }

        return Redirect::route('faq.question.edit', $objQuestion->id)->withInfo('Question Added');
    }

}
