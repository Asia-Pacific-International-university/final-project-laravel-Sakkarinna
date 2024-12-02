<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Articles</h1>
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Create News</a>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="search-input" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Search by author, title, or content...">
    </div>

    <div id="articles-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <div class="bg-white p-3 shadow-md rounded-md hover:shadow-lg transition-shadow duration-300">
                    @if ($article['pic_path'])
                        <img src="{{ asset('storage/' . $article['pic_path']) }}" class="w-full h-32 object-cover rounded-md" alt="Article Image">
                    @elseif ($article['pic_url'])
                        <img src="{{ $article['pic_url'] }}" class="w-full h-32 object-cover rounded-md" alt="Article Image">
                    @endif

                    <div class="mt-3">
                        <h5 class="text-md font-semibold">{{ $article['title'] }}</h5>
                        <p class="text-sm text-gray-600 line-clamp-2 mt-2">{{ Str::limit($article['content'], 70) }}</p>
                        <p class="text-xs text-gray-500 mt-1">By: {{ $article->user->name }}</p>
                        <a href="{{ route('articles.show', $article['id']) }}" class="bg-blue-500 text-white text-sm px-3 py-1 rounded mt-3 inline-block hover:bg-blue-600">Read More</a>
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
            <p class="text-center text-gray-600">No articles available at the moment.</p>
        @endif
    </div>
</div>

<script>
    let timeout;

    // Infinite Scroll
    document.addEventListener('scroll', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                console.log('Scrolled to bottom');
                @this.call('loadMore');
            }
        }, 150);
    });

    // Search Functionality
    document.getElementById('search-input').addEventListener('input', function() {
        let searchValue = this.value.toLowerCase();
        let articles = document.querySelectorAll('#articles-container > div');

        articles.forEach(function(article) {
            let author = article.querySelector('.mt-3 p:nth-of-type(2)').textContent.toLowerCase();
            let title = article.querySelector('h5').textContent.toLowerCase();
            let content = article.querySelector('.line-clamp-2').textContent.toLowerCase();

            if (author.includes(searchValue) || title.includes(searchValue) || content.includes(searchValue)) {
                article.style.display = "block";
            } else {
                article.style.display = "none";
            }
        });
    });
</script>
