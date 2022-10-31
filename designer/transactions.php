<?php include './master.head.php';?>
    <div id="table-url" data-url="{{ route('admin.transactions') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Transactions</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
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
                            <th>Customer Email</th>
                            <th>Transactions ID</th>
                            <th>Order Status</th>
                            <th>Payment Method</th>
                            <th>Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
 
        <script src="{{asset('backend/js/admin/datatables/transactions.js"></script>
        <!-- Page level custom scripts -->
        <?php include './master.foot.php';?>
