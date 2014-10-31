<?php namespace Cysha\Modules\Faq\Controllers\Admin\Category;

use Cysha\Modules\Faq as Faq;
use Auth;
use URL;

class CategoryManagerController extends BaseAdminController
{
    use \Cysha\Modules\Admin\Traits\DataTableTrait;

    public function __construct()
    {
        parent::__construct();

        $this->objTheme->setTitle('FAQ Category Manager');
        $this->assets();

        $this->setTableOptions([
            'filtering'     => true,
            'pagination'    => true,
            'sorting'       => true,
            'sort_column'   => 'id',
            'source'        => URL::route('faq.category.ajax'),
            'collection'    => function () {
                return Contact\Models\Contact::all();
            }
        ]);

        $this->setTableColumns([
            'id' => [
                'th'        => '&nbsp;',
                'tr'        => function ($model) {
                    return $model->id;
                },
                'sorting'   => true,
                'width'     => '5%',
            ],
            'name' => [
                'th'        => 'Name',
                'tr'        => function ($model) {
                    return $model->name;
                },
                'sorting'   => true,
                'filtering' => true,
                'width'     => '15%',
            ],
            'slug' => [
                'th'        => 'Slug <i class="fa fa-external-link"></i>',
                'tr'        => function ($model) {
                    return sprintf('<a href="%s" target="category.preview">%s</a>', Route::to($model['slug']), $model['slug']);
                },
                'sorting'   => true,
                'filtering' => true,
                'width'     => '15%',
            ],
            'created_at' => [
                'alias'     => 'created',
                'th'        => 'Date Created',
                'tr'        => function ($model) {
                    return date_fuzzy($model->created_at);
                },
                'th-class'  => 'hidden-xs hidden-sm',
                'tr-class'  => 'hidden-xs hidden-sm',
                'width'     => '15%',
            ],
            'actions' => [
                'th' => 'Actions',
                'tr' => function ($model) {
                    return [[
                        'btn-text'  => 'View',
                        'btn-link'  => ( \URL::route('faq.category.view', ['category_id' => $model->id]) ),
                        'btn-class' => ( 'btn btn-warning btn-sm btn-labeled' ),
                        'btn-icon'  => 'fa fa-pencil'
                    ]];
                },
                'width' => '7%',
            ]
        ]);

    }
}
