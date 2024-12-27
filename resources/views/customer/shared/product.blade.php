@push('css')
  <style>
      .limit-ln {
          display: -webkit-box;
          -webkit-line-clamp: var(--line, 1);
          -webkit-box-orient: vertical;
          overflow: hidden;
      }

      a {
          color: black;
      }

      a:hover {
          color: black;
      }

      .product {
          transition: .3s all;
      }

      .product:hover {
          border-color: #ffe5d9 !important;
          transform: scale(1.03);
      }

  </style>
@endpush
<div class="border p-1 position-relative" style="border-radius: 6px; cursor: pointer">
  <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
    <x-shared.favorite-btn :product="$product"/>
    <div class="border">
      <img src="{{ $product->getfirstImgUrlAttribute() }}" alt="{{ $product->name }}" class="product img-fluid p-2" style="border-radius: 6px;">
    </div>
    <div class="h5 fw-normal pt-2 limit-ln" style="--line: 2; height: 47px;">
      {!! $product->getName() !!}
    </div>

    @if($product->has_discount)
      <div class="h5 d-flex justify-content-between align-items-center pt-2">
        <div>
          <span class="text-decoration-line-through text-danger">{{ number_format($product->selling_price, 2, '.', ' ') }}</span>
        </div>
        <div>
          <span>{{ number_format($product->discounted_price, 2, '.', ' ') }}</span> <span class="small">TMT</span>
        </div>
      </div>
    @else
      <div class="h5 pt-2">
        {{ number_format($product->selling_price, 2, '.', ' ') }} <span class="small">TMT</span>
      </div>
    @endif
  </a>
</div>
