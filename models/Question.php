<?php namespace Cysha\Modules\Faq\Models;

class Question extends BaseModel
{
    public $table = 'faq_questions';
    public $fillable = ['category_id', 'question', 'answer', 'active'];

    public function category()
    {
        return $this->belongsTo(__NAMESPACE__.'\Category');
    }

    public function transform()
    {
        return [
            'id'       => (int) $this->id,
            'question' => (string) $this->question,
            'answer'   => (string) $this->answer,
            'created'  => $this->created_at,
        ];
    }
}
