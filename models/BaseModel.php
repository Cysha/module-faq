<?php namespace Cysha\Modules\Faq\Models;

use Cysha\Modules\Core\Models\BaseModel as CoreBaseModel;

class BaseModel extends CoreBaseModel
{


    public function getActiveAttribute($value)
    {
        return (bool) $value;
    }
}
