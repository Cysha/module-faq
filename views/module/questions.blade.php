<div class="page-header">
    <h3>{{{ array_get($category, 'name') }}}</h3>
</div>

@if (!count($questions))
    <div class="alert alert-info">Information: There doesnt appear to be any questions in here.</div>
@else
    <ul class="list-unstyled">
    @foreach($questions as $question)
        <li><a href="#{{ Str::slug(array_get($question, 'question')) }}"><i class="glyphicon glyphicon-chevron-right"></i> {{ array_get($question, 'question') }}</a></li>
    @endforeach
    </ul>

    <div class="panel-group">
    @foreach($questions as $question)
        <div id="{{ Str::slug(array_get($question, 'question')) }}" class="faq panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">{{ array_get($question, 'question') }}</h5>
                <span class="pull-right clickable"><a data-title="Back to Top" data-toggle="tooltip" class="question" href="#top" data-original-title="" title=""><i class="glyphicon glyphicon-arrow-up"></i></a></span>
                <span class="pull-right clickable"><a data-title="Quick link to this question" data-toggle="tooltip" class="question" href="#{{ Str::slug(array_get($question, 'question')) }}" data-original-title="" title=""><i class="glyphicon glyphicon-link"></i></a></span>
            </div>
            <div class="panel-body">
                {{ Str::slug(array_get($question, 'answer')) }}
            </div>
        </div>
    @endforeach
    </div>
@endif
