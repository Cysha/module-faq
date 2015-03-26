<?php


Route::group(['prefix' => 'admin'], function () use ($namespace) {
    $namespace .= '\Admin';

    Route::group(['prefix' => 'faq'], function () use ($namespace) {

        Route::group(['prefix' => 'category'], function () use ($namespace) {
            $namespace .= '\Category';

            Route::model('faq_category_id', 'Cysha\Modules\Faq\Models\Category');
            Route::group(['prefix' => '{faq_category_id}'], function () use ($namespace) {
                Route::get('toggle', ['as' => 'faq.category.toggle', 'uses' => $namespace.'\CategoryController@toggleActive']);

                Route::group(['prefix' => 'edit'], function () use ($namespace) {
                    $namespace .= '\CategoryEdit';

                    Route::post('/', ['uses' => $namespace.'\FormController@postEdit']);
                    Route::get('/', ['as' => 'faq.category.edit', 'uses' => $namespace.'\FormController@getEdit']);
                });
            });

            Route::group(['prefix' => 'add'], function () use ($namespace) {
                $namespace .= '\CategoryAdd';

                Route::post('/', ['uses' => $namespace.'\FormController@postAdd']);
                Route::get('/', ['as' => 'faq.category.add', 'uses' => $namespace.'\FormController@getAdd']);
            });

            Route::get('search.json', ['as' => 'faq.category.ajax', 'uses' => $namespace.'\CategoryManagerController@getDataTableJson']);
            Route::get('/', ['as' => 'faq.category.index', 'uses' => $namespace.'\CategoryManagerController@getDataTableIndex']);
        });

        Route::group(['prefix' => 'question'], function () use ($namespace) {
            $namespace .= '\Question';

            Route::model('faq_question_id', 'Cysha\Modules\Faq\Models\Question');
            Route::group(['prefix' => '{faq_question_id}'], function () use ($namespace) {
                Route::get('view', ['as' => 'faq.question.view', 'uses' => $namespace.'\QuestionController@getView']);
                Route::get('toggle', ['as' => 'faq.question.toggle', 'uses' => $namespace.'\QuestionController@toggleActive']);

                Route::group(['prefix' => 'edit'], function () use ($namespace) {
                    $namespace .= '\QuestionEdit';

                    Route::post('/', ['uses' => $namespace.'\FormController@postEdit']);
                    Route::get('/', ['as' => 'faq.question.edit', 'uses' => $namespace.'\FormController@getEdit']);
                });
            });

            Route::group(['prefix' => 'add'], function () use ($namespace) {
                $namespace .= '\QuestionAdd';

                Route::post('/', ['uses' => $namespace.'\FormController@postAdd']);
                Route::get('/', ['as' => 'faq.question.add', 'uses' => $namespace.'\FormController@getAdd']);
            });

            Route::get('search.json', ['as' => 'faq.question.ajax', 'uses' => $namespace.'\QuestionManagerController@getDataTableJson']);
            Route::get('/', ['as' => 'faq.question.index', 'uses' => $namespace.'\QuestionManagerController@getDataTableIndex']);
        });


    });

});
