<div class="row">
    <div class="col-md-6">
        <ul class="list-inline shop-top-menu pb-3 pt-1" id="productCategory">
            <li class="list-inline-item categoryItem">
                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
            </li>
            <li class="list-inline-item categoryItem">
                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
            </li>
            <li class="list-inline-item categoryItem">
                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
            </li>
        </ul>
    </div>
    <div class="col-md-6 pb-4">
        <div class="d-flex">
            <select class="form-control" id ="productFilter">
                @foreach($ordering as $key => $value)
                <option value="{{ $key }}" {{ $key == request('order_by') ? ' selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>