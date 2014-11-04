<?php namespace Cysha\Modules\Faq\Controllers\Admin\Category;

use Cysha\Modules\Faq as Faq;
use Auth;
use URL;

class CategoryManagerController extends BaseCategoryController
{
    use \Cysha\Modules\Admin\Traits\DataTableTrait;

    public function __construct()
    {
        parent::__construct();

        $this->assets();

        $this->setTableOptions([
            'filtering'     => true,
            'pagination'    => true,
            'sorting'       => true,
            'sort_column'   => 'id',
            'source'        => URL::route('faq.category.ajax'),
            'collection'    => function () {
                return Faq\Models\Category::all();
            }
        ]);

        $this->setActions([
            'header' => [
                [
                    'btn-text'  => 'Create Category',
                    'btn-link'  => URL::Route('faq.category.add'),
                    'btn-class' => 'btn btn-info btn-labeled',
                    'btn-icon'  => 'fa fa-plus'
                ],
            ],
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
                'width'     => '25%',
            ],
            'slug' => [
                'th'        => 'Slug <i class="fa fa-external-link"></i>',
                'tr'        => function ($model) {
                    $model = $model->transform();
                    return sprintf('<a href="%s" target="pages.preview">%s</a>', $model['href'], $model['slug']);
                },
                'sorting'   => true,
                'filtering' => true,
                'width'     => '25%',
            ],
            'question' => [
                'th'        => 'Question Counter',
                'tr'        => function ($model) {
                    return $model->question->count();
                },
                'sorting'   => true,
                'filtering' => true,
                'width'     => '5%',
            ],
            'actions' => [
                'th' => 'Actions',
                'tr' => function ($model) {
                    return [[
                        'btn-text'  => 'Edit',
                        'btn-link'  => ( \URL::route('faq.category.edit', ['category_id' => $model->id]) ),
                        'btn-class' => ( 'btn btn-warning btn-sm btn-labeled' ),
                        'btn-icon'  => 'fa fa-pencil'
                    ], [
                        'btn-text'  => ($model->active == true ? 'Disable' : 'Enable'),
                        'btn-link'  => (\URL::route('faq.category.toggle', ['category_id' => $model->id])),
                        'btn-class' => ($model->active == true ? 'btn-primary' : 'btn-success').' btn btn-sm btn-labeled',
                        'btn-icon'  => ($model->active == true ? 'fa fa-lock' : 'fa fa-unlock')
                    ]];
                },
                'width' => '12%',
            ]
        ]);

    }
}
