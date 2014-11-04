<?php namespace Cysha\Modules\Faq\Controllers\Admin\Question;

use Cysha\Modules\Faq as Faq;
use Auth;
use URL;

class QuestionManagerController extends BaseQuestionController
{
    use \Cysha\Modules\Admin\Traits\DataTableTrait;

    public function __construct()
    {
        parent::__construct();

        $this->objTheme->setTitle('FAQ Question Manager');
        $this->assets();

        $this->setTableOptions([
            'filtering'     => true,
            'pagination'    => true,
            'sorting'       => true,
            'sort_column'   => 'id',
            'source'        => URL::route('faq.question.ajax'),
            'collection'    => function () {
                return Faq\Models\Question::with('category')->get();
            }
        ]);

        $this->setActions([
            'header' => [
                [
                    'btn-text'  => 'Create Question',
                    'btn-link'  => URL::Route('faq.question.add'),
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
            'category_id' => [
                'th'        => 'Category',
                'tr'        => function ($model) {
                    return $model->category->name;
                },
                'sorting'   => true,
                'filtering' => true,
                'width'     => '15%',
            ],
            'question' => [
                'th'        => 'Question',
                'tr'        => function ($model) {
                    return $model->question;
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
                        'btn-text'  => 'Edit',
                        'btn-link'  => ( \URL::route('faq.question.edit', ['question_id' => $model->id]) ),
                        'btn-class' => ( 'btn btn-warning btn-sm btn-labeled' ),
                        'btn-icon'  => 'fa fa-pencil'
                    ], [
                        'btn-text'  => ($model->active == true ? 'Disable' : 'Enable'),
                        'btn-link'  => (\URL::route('faq.question.toggle', ['question_id' => $model->id])),
                        'btn-class' => ($model->active == true ? 'btn-primary' : 'btn-success').' btn btn-sm btn-labeled',
                        'btn-icon'  => ($model->active == true ? 'fa fa-lock' : 'fa fa-unlock')
                    ]];
                },
                'width' => '10%',
            ]
        ]);

    }
}
