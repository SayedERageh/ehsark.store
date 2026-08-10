<div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">

    <a href="{{ route('shop.show',$product->id) }}" class="text-decoration-none">

        <div class="position-relative">

            @if($product->images && count($product->images))

                <img
                    src="{{ asset('uploads/'.$product->images[0]) }}"
                    class="card-img-top"
                    style="height:250px;object-fit:cover;"
                    alt="{{ $product->name }}">

            @else

                <div
                    style="height:250px;background:#f5f8fa;"
                    class="d-flex align-items-center justify-content-center">

                    <i class="bi bi-droplet-half text-primary fs-1"></i>

                </div>

            @endif

            @if($product->is_new)

                <span
                    class="badge bg-success position-absolute top-0 start-0 m-3">
                    جديد
                </span>

            @endif

            @if($product->is_featured)

                <span
                    class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">
                    مميز
                </span>

            @endif

        </div>

    </a>

    <div class="card-body">

        @if($product->category)

            <small class="text-muted">
                {{ $product->category->name }}
            </small>

        @endif

        <h6 class="fw-bold mt-2">

            {{ $product->name }}

        </h6>

        @if($product->sale_price)

            <h5 class="text-danger fw-bold">

                {{ number_format($product->sale_price,2) }} ج.م

            </h5>

            <small class="text-muted">

                <del>

                    {{ number_format($product->price,2) }} ج.م

                </del>

            </small>

        @else

            <h5 class="fw-bold">

                {{ number_format($product->price,2) }} ج.م

            </h5>

        @endif

    </div>

    <div class="card-footer bg-white border-0 pb-3">

        <div class="d-flex gap-2">

            <form
                action="{{ route('cart.add',$product->id) }}"
                method="POST"
                class="flex-grow-1">

                @csrf

                <button
                    type="submit"
                    class="btn btn-primary w-100">

                    <i class="fas fa-shopping-cart"></i>

                    أضف إلى السلة

                </button>

            </form>

            <a
                href="{{ route('shop.show',$product->id) }}"
                class="btn btn-outline-primary">

                <i class="bi bi-eye"></i>

            </a>

        </div>

    </div>

</div>