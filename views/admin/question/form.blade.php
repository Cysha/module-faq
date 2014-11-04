<div class="col-md-8">
{{ Former::open()->action(URL::Route('faq.question.add')) }}

    {{ Former::select('category_id')->fromQuery($categories, 'name')->label('Category')->required() }}
    {{ Former::text('question')->label('Question')->required() }}
    {{ Former::textarea('answer')->label('Answer')->required() }}
    {{ Former::inline_radios('active')->radios([
        'No' => ['value' => '0'],
        'Yes' => ['value' => '1']
    ])->label('Active')->required() }}

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" class="btn btn-success btn-labeled">
                <span class="btn-label"><i class="fa fa-plus"></i></span><span>Save Question</span>
            </button>
        </div>
    </div>

{{ Former::close() }}
</div>
