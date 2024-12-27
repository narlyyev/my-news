<div class="row pt-5">
    @foreach($news as $item)
        <div class="col-3">
            <a href="{{ route('news.show', $item) }}" class="text-dark">
                <div>
                    <img src="{{ $item->image ? $item->getImage() : asset('img/not_found.jpg') }}"
                         alt="{{ $item->name }}" class="w-100 pb-3">
                </div>
                <div class="text-center">
                    {{ $item->name }}
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="pt-3">
    {{ $news->links() }}
</div>
