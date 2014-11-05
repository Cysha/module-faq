<?php namespace Cysha\Modules\Faq\Controllers\Admin\Category\CategoryAdd;

use Cysha\Modules\Faq\Controllers\Admin\Category\BaseCategoryController;
use Cysha\Modules\Faq as Faq;
use Former;
use URL;
use Redirect;

class FormController extends BaseCategoryController
{
    public function getAdd()
    {
        $this->objTheme->setTitle('Category Manager <small>> New Category</small>');

        return $this->setView('admin.category.form', [], 'module');
    }

    public function postAdd()
    {
        $objCategory = new Faq\Models\Category;
        $objCategory->hydrateFromInput();

        if ($objCategory->save() === false) {
            return Redirect::back()->withErrors($objCategory->getErrors());
        }

        return Redirect::route('faq.category.add')->withInfo('Category Added');
    }

}
