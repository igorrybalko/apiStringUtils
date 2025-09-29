<div class="overflow-hidden h-{{$height}}">
    <a href="/article/{{ $item->slug }}">
        <img class="object-cover object-center hover:scale-105 duration-500 h-full w-full" 
        src="{{$item->img ? '/img/articles/' . $item->img : '/img/noimg.jpg'}}" 
        alt="{{$item->img_alt}}" />
    </a>
</div>