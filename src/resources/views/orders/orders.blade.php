<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product size</th>
                    <th scope="col">SKU</th>
                  </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach ($dummyOrders as $order)  
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$order['productName']}}</td>
                    <td>{{$order['productSize']}}</td>
                    <td>{{$order['SKU']}}</td>
                  </tr>
                @php ($i++)
                @endforeach
                </tbody>
            </table>
        </div>
</div>

