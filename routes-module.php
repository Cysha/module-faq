<?php

$namespace .= '\Module';

Route::group(['prefix' => 'frequently-asked-questions'], function () use ($namespace) {

    Route::get('{faq_slug}', ['as' => 'pxcms.faq.category', 'uses' => $namespace.'\FaqController@getCategory']);

    Route::get('/', ['as' => 'pxcms.faq.index', 'uses' => $namespace.'\FaqController@getIndex']);
});
