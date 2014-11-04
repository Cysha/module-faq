<?php namespace Cysha\Modules\Faq\Models;

class Category extends BaseModel
{
    public $timestamps = false;
    public $table = 'faq_categories';
    public $fillable = ['name', 'slug', 'active'];

    protected $identifiableName = 'name';
    protected $link = [
        'route'      => 'pxcms.faq.category',
        'attributes' => ['faq_slug' => 'slug'],
    ];

    public function question()
    {
        return $this->hasMany(__NAMESPACE__.'\Question');
    }

    public function makeSlug()
    {
        return $this->getOriginal('slug');
    }

    /**
     * Transformer method
     *
     * @param  Pages\Models\Content $model
     * @return array
     */
    public function transform()
    {
        $data = [
            'id'             => (int) $this->id,
            'name'           => (string) $this->name,
            'slug'           => (string) $this->slug,
            'link'           => (string) $this->makeLink(false),
            'href'           => (string) $this->makeLink(true),
            'question_count' => (int) $this->question->count(),
        ];

        return $data;
    }

}
