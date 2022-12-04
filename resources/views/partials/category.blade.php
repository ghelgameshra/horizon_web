<div>

    <div class="row">
    
        <div class="col-md-2 d-inline-flex">
            <div class="dropdown mb-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter by category
                </button>
                <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/produk">All Products</a></li>
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="/produk?category={{ $category->slug }}">{{ $category->name }} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <form action="/produk">
                @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                    <div class="input-group mb-3">
                        <button class="input-group-text btn btn-secondary" id="basic-addon1" type="submit"><i class="bi bi-search"></i></button>
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Type for search" autocomplete="off">
                    </div>
            </form>
        </div>

    </div>
</div>