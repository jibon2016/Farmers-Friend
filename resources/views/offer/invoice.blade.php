<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" > --}}

    <!-- Optional theme -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"> --}}

    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script> --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style  type="text/css">
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');        */
        body{
            font-family: 'nikosh', sans-serif;
            margin: 0px;
            padding: 0px;
            color: #484b51;
        }
       
        p{
            margin: 0px;
            padding: 0px;
        }
        .logo h1 {
            margin-top: 0px;
            padding-top: 0px;
            color: #73ab5c;
            font-weight: bold;
            text-align: center;
        }
        .title {
            text-align: center;
        }
        .col-md-6{
            width: 50%;
        }
        .float-left{
            float: left;
        }
        .float-right{
            float: right;
        }
        .invoice-details{
            margin-top: 50px;
        }
        th{
            padding: 12px 0px;
            background-color: #73ab5c;
            color: white;
        }
        .text-right{
            text-align: right !important;
        }
        .text-left{
            text-align: left !important;
        }
        .t-24{
            font-size: 16px;
            
        }
        thead{
            background: rgb(62, 142, 65);
        }
    </style>
</head>
<body>
    <div class="page-content">
        <div class="invoice-header">
            <div class="logo">
                <h1 class="text-center ">Farmer's Friend</h1>
            </div>
            <hr>
            <div class="title">
                <h3>Offer</h3>
            </div>
        </div>
        <div class="row user-details">
            <div class="col-md-6 float-left">
                <p>To: <strong>{{$offer->user->name }}</strong></p>
                <p>User Type:{{$offer->user->user_type }}</p>
                <p>User Address:{{$offer->user->district }}</p>
                <p>User Phone:{{$offer->user->phone }}</p>
            </div>
            <div class="col-md-6 float-right">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6 float-right">
                    <p>Details:</p>
                    <p>ID:#{{$offer->offer_no}}</p>
                    <p>Isue Data:{{ $offer->created_at->format('m/d/Y') }}</p>
                    <p>Status: {{$offer->status}}</p>
                </div>
            </div>
        </div>
        <div class="invoice-details">
            <table style="width: 100%;border-spacing: 0px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="200">Product Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center; padding:15px 0px;">1</td>
                        <td style="text-align: center; font-size:20px; padding:15px 0px;" width="200">{{$offer->product->title }}</td>
                        <td style="text-align: center; padding:15px 0px;">{{$offer->quantity }}</td>
                        <td style="text-align: center; padding:15px 0px;">{{$offer->product_type }}</td>
                        <td style="text-align: center; padding:15px 0px;">{{$offer->product->cost_price }} tk</td>
                        <td style="text-align: center; padding:15px 0px;">{{$offer->sub_total }} tk</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-calculation" style="margin-top:30px;">
            <div class="col-md-6 float-left"></div>
            <div class="col-md-6 float-right">
                <table style="width: 90%;">
                    <tr>
                        <td class="text-right t-24">Sub Total :</td>
                        <td class="text-right t-24">{{$offer->sub_total}} tk</td>
                    </tr>
                    <tr>
                        <td class="text-right t-24">Delivery Charge :</td>
                        <td class="text-right t-24">{{$offer->delivery_charge}} tk</td>
                    </tr>
                    <tr>
                        <td class="text-right t-24">Total :</td>
                        <td class="text-right t-24">{{$offer->amount}} tk</td>
                    </tr>
                    <tr>
                        <td class="text-right t-24">Balance :</td>
                        <td class="text-right t-24">0 tk</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>