<div>
    <!-- Display Articles -->
    @foreach($articles as $article)
        <div class="card mb-4">
            <img src="{{ $article['image_url'] }}" class="card-img-top" alt="Article Image">
            <div class="card-body">
                <h5 class="card-title">{{ $article['title'] }}</h5>
                <p class="card-text">{{ Str::limit($article['content'], 100) }}</p>
                <a href="{{ route('articles.show', $article['id']) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    @endforeach

    <!-- Loading Spinner -->
    <div wire:loading class="text-center my-4">
        <p>Loading more articles...</p>
    </div>

    <!-- No More Articles Message -->
    @if(!$hasMore)
        <p class="text-center text-gray-500 mt-4">No more news to load.</p>
    @endif
</div>

<!-- Infinite Scroll Script -->
<script>
    let timeout;
    document.addEventListener('scroll', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            const documentHeight = document.body.scrollHeight;

            if (scrollTop + viewportHeight >= documentHeight - 100) { // Add buffer
                console.log('Scrolled to bottom');
                @this.call('loadMore');
            }
        }, 150); // Debounce for performance
    });
</script>

