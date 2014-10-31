<?php


Route::group(['prefix' => 'admin'], function () use ($namespace) {
    $namespace .= '\Admin';

    Route::group(['prefix' => 'faq'], function () use ($namespace) {


        Route::group(['prefix' => 'question'], function () use ($namespace) {
            $namespace .= '\Question';

            Route::get('{question_id}/edit', ['as' => 'faq.question.edit', 'uses' => $namespace.'\QuestionEditController@getEdit']);
            Route::post('{question_id}/edit', ['uses' => $namespace.'\QuestionEditController@postEdit']);

            Route::get('search.json', ['as' => 'faq.question.ajax', 'uses' => $namespace.'\QuestionManagerController@getDataTableJson']);
            Route::get('/', ['as' => 'faq.question.index', 'uses' => $namespace.'\QuestionManagerController@getDataTableIndex']);
        });


    });

});
