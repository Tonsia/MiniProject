<?php include './master.head.php';?>
    <div id="table-url" data-url="{{ route('admin.orders', $status_prefix) }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Shipped Orders</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <table id="AdvertiseTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Products</th>
                            <th>Types</th>
                            <th>Total Amount</th>
                            <th>Coupon Code</th>
                            <th>Payment Method</th>
                            <th>Digital Goods</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr role="row" class="odd">
  <td class="sorting_1">M2Vwbw</td>
  <td>John Doe</td>
  <td>
    <img src="https://zairito.zainikthemes.com/uploaded_files/product_image/product-image-7.png" border="0" height="50" class="img-rounded mr-1" align="center">
  </td>
  <td>Physical</td>
  <td>$450.00</td>
  <td>N/A</td>
  <td>COD</td>
  <td>N/A</td>
  <td>
    <span class="status bg-primary-light-varient">Pending</span>
  </td>
  <td>
    <div class="action__buttons">
      <a href="javascript:void(0)" class="btn-action" onclick="orderDetails(10)" title="Invoice">
        <i class="fas fa-file-invoice"></i>
      </a>
      <a href="javascript:void(0)" class="btn-action" onclick="orderStatusEdit(10)" title="Change Status">
        <i class="fas fa-bars"></i>
      </a>
      <a href="https://zairito.zainikthemes.com/admin/order-delete/eyJpdiI6IlpJUml1R0ZpNXNNTWVyRU41a2dCOUE9PSIsInZhbHVlIjoiNU01RVNKd016VEYzVGtvRTF0Zml2QT09IiwibWFjIjoiMmMwMDAxNTVkZTRmYmE4ZDNjMDgzNmJlYmEyOWM1NDJjODU3ZjRmYzY1NmJiYzcyMWNkYWFhODIwMmRhZGJjNSIsInRhZyI6IiJ9" class="btn-action delete">
        <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </td>
</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Row-->
    <!-- @foreach ($orders as $order) -->
        <div class="modal fade bd-example-modal-lg" id="invoiceModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="invoiceModalTitle{{$order->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="viewModalLongTitle">Invoice</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="printDiv">
                        <p><img src="{{asset(IMG_LOGO_PATH.allsetting()['main_logo'])}}" alt="Logo" /></p>
                        @php
                            $bill = json_decode($order->billing_address,true);
                        @endphp
                        <p>
                            <b>Order Number:</b> <a href="javascript:void(0)">{{$order->Order_Number}}</a><br>
                            <b>Name:</b> {{$bill['name']}}<br>
                            <b>Email:</b> {{$bill['email']}}<br>
                            <b>Payment Method: </b> {{$order->Payment_Method}}<br>
                            <b>TXN: </b> {{$order->txn}}
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <b>Billing Address:</b><br>
                                    <small>
                                        {{$bill['name']}} <br>
                                        {{$bill['email']}} <br>
                                        {{$bill['street']}} <br>
                                        {{$bill['state']}} <br>
                                        {{$bill['country']. __(', {{$bill['zipcode']}}
                                    </small>
                                </p>

                            </div>
                            @php
                                $ship = json_decode($order->shipping_address,true);
                            @endphp
                            <div class="col-md-6">
                                <p>
                                    <b>Shipping Address:</b><br>
                                    <small>
                                        {{$ship['name']}} <br>
                                        {{$ship['email']}} <br>
                                        {{$ship['street']}} <br>
                                        {{$ship['state']}} <br>
                                        {{$ship['country']. __(', {{$ship['zipcode']}}
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <!-- Simple Tables -->
                                <div class="card">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Quantity</th>
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($order->order_details as $od)
                                                <tr>
                                                    <td>{{$od->product->en_Product_Name}}</td>
                                                    <td><img src="{{asset(IMG_PRODUCT_PATH. $od->product->Primary_Image)}}" height="50" class="img-rounded mr-1" /></td>
                                                    <td>{{$od->Quantity}}</td>
                                                    <td>{{is_null($od->Size) ? __('N/A') : $od->Size }}</td>
                                                    <td>{{is_null($od->Color) ? __('N/A') : $od->Color }}</td>
                                                    <td>{{ $od->Price }}</td>
                                                    <td>{{ $od->Total_Price }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Subtotal</td>
                                                <td>{{$order->Sub_Total}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Shipping Charge</td>
                                                <td>{{$order->Delivery_Charge}}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Tax</td>
                                                <td>{{$order->Tax}}</td>
                                            </tr>
                                            @if (!is_null($order->Coupon_Id))
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Discount (-)</td>
                                                    <td>{{$order->Coupon_Amount}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Grand Total</td>
                                                <td>{{$order->Grand_Total}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-danger">*All the amount is in USD currency.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="print-now">Print</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-sm" id="changeModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="changeeModalTitle{{$order->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="viewModalLongTitle">Change Status</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.order_status_change', encrypt($order->id))}}">
                    <div class="modal-body">
                        @csrf
                        <div class="input__group">
                            <label for="question">Status</label>
                            <select name="Order_Status" id="order-status" class="form-select">
                                <option value="">---SELECT A STATUS---</option>
                                <option value="{{ORDER_PENDING}}" {{$order->Order_Status == ORDER_PENDING ? 'selected disabled' : ''}}>Pending</option>
                                <option value="{{ORDER_PROCESSING}}" {{$order->Order_Status == ORDER_PROCESSING ? 'selected disabled' : ''}}>Processing</option>
                                <option value="{{ORDER_SHIPPED}}" {{$order->Order_Status == ORDER_SHIPPED ? 'selected disabled' : ''}}>Shipped</option>
                                <option value="{{ORDER_DELIVERED}}" {{$order->Order_Status == ORDER_DELIVERED ? 'selected disabled' : ''}}>Delivered</option>
                                <option value="{{ORDER_RETURN}}" {{$order->Order_Status == ORDER_RETURN ? 'selected disabled' : ''}}>Returned</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger small me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary small">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="./assets/backend/js/admin/datatables/orders.js"></script>
        <!-- Page level custom scripts -->

<?php include './master.foot.php';?>