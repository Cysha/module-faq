<?php namespace Cysha\Modules\Faq\Models;

class Category extends BaseModel
{
    public $table = 'faq_category';
    public $fillable = ['name', 'slug', 'active'];


}
