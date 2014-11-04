<?php namespace Cysha\Modules\Faq\Controllers\Admin\Category\CategoryEdit;

use Cysha\Modules\Faq\Controllers\Admin\Category\BaseCategoryController;
use Cysha\Modules\Faq as Faq;
use Redirect;

class FormController extends BaseCategoryController
{
    public function getEdit(Faq\Models\Category $objCategory)
    {
        $data = $this->getCategoryDetails($objCategory);
        $this->objTheme->setTitle('Category Manager <small>> Editing Category</small>');

        return $this->setView('admin.category.form', [], 'module');
    }

    public function postEdit(Faq\Models\Category $objCategory)
    {
        $objCategory->hydrateFromInput();

        if ($objCategory->save() === false) {
            return Redirect::back()->withErrors($objCategory->getErrors());
        }

        return Redirect::route('admin.category.form', $objCategory->id)->withInfo('Category Updated');
    }

}
