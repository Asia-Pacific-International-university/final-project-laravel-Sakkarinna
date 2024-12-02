<div>
    <div class="text-end mb-4">
        <a href="{{ route('articles.create') }}" class="btn btn-success">Create News</a>
    </div>

    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="card mb-4">
                @if ($article['pic_path'])
                    <img src="{{ asset('storage/' . $article['pic_path']) }}" class="card-img-top" alt="Article Image">
                @elseif ($article['pic_url'])
                    <img src="{{ $article['pic_url'] }}" class="card-img-top" alt="Article Image">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $article['title'] }}</h5>
                    <p class="card-text">{{ Str::limit($article['content'], 100) }}</p>
                    <a href="{{ route('articles.show', $article['id']) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach

        <div wire:loading>
            <p class="text-center text-info">Loading more articles...</p>
        </div>
        <p class="text-center text-muted mt-4" wire:loading.remove>
            @if(!$hasMore)
                No more news to load.
            @endif
        </p>

    @else
        <p class="text-center">No articles available at the moment.</p>
    @endif
</div>

<script>
    let timeout;
    document.addEventListener('scroll', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                console.log('Scrolled to bottom');
                @this.call('loadMore');
            }
        }, 150);
    });
</script>
