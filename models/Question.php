<?php namespace Cysha\Modules\Faq\Models;

class Question extends BaseModel
{
    public $table = 'faq_questions';
    public $fillable = ['category_id', 'question', 'answer', 'active'];

}
