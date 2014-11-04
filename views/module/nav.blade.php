<div data-spy="affix" data-offset-top="220">
    <div class="panel panel-default">
        <div class="panel-heading">FAQ Categories</div>
        <div class="list-group">
            @foreach ($categories as $category)
            <a href="{{ array_get($category, 'href') }}" class="list-group-item{{ Request::is('*/'.array_get($category, 'slug')) ? ' active' : '' }}">
                <span class="badge">{{ array_get($category, 'question_count') }}</span>
                {{{ array_get($category, 'name') }}}
            </a>
            @endforeach
        </div>
    </div>
</div>
