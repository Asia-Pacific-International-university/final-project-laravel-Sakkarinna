<div>
    @foreach($articles as $article)
        <div class="card mb-4">
            <img src="{{ $article->image_url }}" class="card-img-top" alt="Article Image">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    @endforeach

    <!-- Loading Spinner -->
    <div wire:loading>
        <p>Loading more articles...</p>
    </div>
</div>

<!-- Trigger Infinite Scrolling -->
<script>
    document.addEventListener('scroll', function () {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            @this.call('loadMore');
        }
    });
</script>
