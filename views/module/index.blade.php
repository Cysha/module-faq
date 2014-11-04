<div class="page-header">
    <h1>Frequently Asked Questions</h1>
</div>

<div class="col-md-12 row">
    <aside class="col-md-3">
        @include('faq::module.nav', compact('categories'))
    </aside>
    <main class="col-md-9">
        @include('faq::module.questions', compact('category', 'questions'))
    </main>
</div>
