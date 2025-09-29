<div>
    <h3 class="mt-0">{{ $title }}</h3>
    @foreach ($articles as $item)
    <div class="mb-3">
        @include('includes.article.imgLinked', ['item' => $item, 'height' => 40])
        <h4 class="text-base">
            <a href="/article/{{ $item->slug }}">{{$item->title}}</a>
        </h4>
        <div class="text-sm">{{substr(strip_tags($item->content), 0, 100) . '...'}}</div>
    </div>

    @endforeach
</div>