<div class="container mx-auto p-4">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">News from NewsCatcher API</h1>
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Create News</a>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="search-input" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Search by title, summary, or source...">
    </div>

    <!-- Articles Grid -->
    <div id="articles-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @if(count($newsArticles) > 0)
            @foreach($newsArticles as $article)
                <div class="bg-white p-4 shadow-md rounded-md hover:shadow-lg transition-shadow duration-300">
                    <!-- Article Image -->
                    <img src="{{ $article['media'] ?? asset('path/to/default-image.jpg') }}" class="w-full h-40 object-cover rounded-md" alt="Article Image">

                    <!-- Article Content -->
                    <div class="mt-3">
                        <h5 class="text-md font-semibold">{{ $article['title'] }}</h5>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ \Illuminate\Support\Str::limit($article['summary'] ?? 'No summary available', 100) }}</p>
                        <p class="text-xs text-gray-500 mt-1">Source: {{ $article['clean_url'] ?? 'Unknown' }}</p>
                        <p class="text-xs text-gray-500">Published: {{ $article['published_date'] ?? 'Unknown' }}</p>
                        <a href="{{ $article['link'] }}" target="_blank" class="bg-blue-500 text-white text-sm px-3 py-1 rounded mt-3 inline-block hover:bg-blue-600">Read More</a>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-600">No articles available at the moment.</p>
        @endif
    </div>

    <!-- Load More Button -->
    @if($hasMore)
        <div class="text-center mt-4">
            <button wire:click="loadMore" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700" wire:loading.attr="disabled">
                Load More
            </button>
        </div>
    @else
        <p class="text-center mt-4 text-gray-600">No more articles to load.</p>
    @endif

    <!-- Loading Indicator -->
    <div wire:loading>
        <p class="text-center mt-4 text-blue-500">Loading...</p>
    </div>
</div>

<script>
    let timeout;

    // Infinite Scroll
    document.addEventListener('scroll', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                @this.call('loadMore');
            }
        }, 150);
    });

    // Search Functionality
    document.getElementById('search-input').addEventListener('
