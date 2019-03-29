<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="/home/cjwokzj0tfdr/wkhtmltox/bin/bootstrap.css" rel="stylesheet" >
    

</head>
<style type="text/css">
    body {
    background: white;
    margin-top: 120px;
    margin-bottom: 120px;
}
.dark-text{
    
    font-size: 80%;
}
.sales-order{
    font-size: 180%;
}
.wid1{
    max-width: 25%;
}
.wid2{
    max-width: 41.666667%;
    margin-left: 25px;
}
.wid3{
    max-width: 33.333333%;
    margin-left: 187px;
}
.wid4{
    max-width: 33.333333%;
    margin-left: 585px;
}
.wid5{
    max-width: 33.333333%;
    margin-left: 50px;
}

img{
    
    width: 250px;
    height: 120px;
}
</style>
<body>
<div class="container">
                    <?php
                        $date = new DateTime();
            
                            $getDate=$objects[0]['created_at'];
                            $datePiece = explode(" ", $getDate);
                            $date=$datePiece[0];
                            $orderId=$objects[0]['id'];
                            $name=$objects[0]['name'];
                            $userName=$objects[0]['userName'];
                            $phoneNo=$objects[0]['phoneNo'];
                            $orderId=$objects[0]['id'];
                            $totalOfAllOrders=$objects[0]['total_of_all_orders'];
                             $subTotal=0;
                            foreach ($objects as $obj) {
                              $subTotal=$subTotal+$obj['total_paid_amount'];
                            }
                      ?>                
                    <div class="row">
                        <div class="wid1">
                            <img src="/home/cjwokzj0tfdr/wkhtmltox/bin/logo.png">
                        </div>
                        <div class="wid2">
                            <b class="dark-text">SMART BROTHERS MOBILE ACCESERIES</b><br>
                            <b class="dark-text">NANKANA SAHB PUNJAB PAKISTAN</b><br>
                            <b class="dark-text">CALL,SMS,WHATSAPP-0340-4300020-0346-6318063</b><br>
                            <b class="dark-text">Email:   SAFYANRASHEED1@GMAIL.COM</b><br>
                            <b class="dark-text">[ESTABLISHED IN DECEMBER 2014]</b>
                        </div>
                        <div class="wid3">
                            <p class="sales-order"><b>Sales Order::<b></p>
                            <p class="dark-text">Order#  SMART- <?php echo $orderId;  ?></p>
                            <p class="dark-text">Date  <?php echo $date;  ?></p>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-md-3">
                            <p class="MB-1">BILLING ADDRESS</p>
                            <p class="mb-1"><?php echo $userName;  ?></p>
                            <p>CONTACT INFORMATION</p>
                            <p class="mb-1"><?php echo $phoneNo;  ?></p>
    
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objects as $obj)
                                    <tr>
                                        
                                        <td>{{$obj['product_name']}}</td>
                                        <td>{{$obj['quantity']}}</td>
                                        <td>Rs{{$obj['product_price']}}</td>
                                        <td>Rs{{$obj['total_paid_amount']}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row bg-dark text-white">
                        <div class="wid4">
                             <b class="dark-text">Sub Total:    Rs<?php echo $totalOfAllOrders;  ?></b>
                        </div>

                        <div class="wid5">
                             <b class="dark-text">Total: Rs<?php echo $totalOfAllOrders;  ?></b>
                        </div>
                    </div>
                
            
        
    
    

</div>



</body>
</html>






<!------ Include the above in your HEAD tag ---------->

