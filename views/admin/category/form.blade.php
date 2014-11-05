<div class="col-md-8">
{{ Former::open() }}

    {{ Former::text('name')->label('Name')->required() }}
    {{ Former::text('slug')->prepend(str_replace(Request::path(), '', Request::url()).'frequently-asked-questions/') }}
    {{ Former::inline_radios('active')->radios([
        'No' => ['value' => '0'],
        'Yes' => ['value' => '1']
    ])->label('Active')->required() }}

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" class="btn btn-success btn-labeled">
                <span class="btn-label"><i class="fa fa-plus"></i></span><span>Save Category</span>
            </button>
        </div>
    </div>

{{ Former::close() }}
</div>
