
@foreach ($feed_items as $micropost)
    <div class="card microposts mb-2">
        @include("microposts.micropost")
    </div>
@endforeach

{{ $feed_items->links() }}

