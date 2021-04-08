<?php 
   date_default_timezone_set('America/Los_Angeles');   
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ Config::get('constants.PROJECT_TITLE') }}</title>
      <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
   </head>
   <style type="text/css">
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even){background-color: #f2f2f2}
      tr:nth-child(even){background-color: #f2f2f2}
      body{
      font-family: 'Quicksand', sans-serif;
      }
   </style>
   <body>
      <div style="background:#ededed;padding-left:40px; padding-right:60px;height:635px; clear: both;overflow: auto;">
         <div style="background:#fff;margin-left:auto;margin-right:auto; height:735px;max-width: 700px;margin-top:55px;margin-bottom:55px;">
           
            <div style="padding: 0px 25px 0px 25px;">
                           
                <div style="overflow:auto; padding:20px;font-size: 16px;line-height: 22px;">
                    
                    <h4 style="font-weight:normal;">Hello {{ (!empty($name)) ? ($name) : ('') }},
                      <br> Thank you for order from <b>Sevbazzar</b>.<br>
                      <p>We hope you enjoy your recent <b>Sevbazaar </b> purchase</p>
                      <p><b>Order Details :</b></p>

                      <div style="overflow-x:auto;">
                        <table>
                          <tr>
                            <th>Product Name</th>
                            <th>Product Weight</th>
                            <th>Total Amount</th>
                          </tr>
                          @if(!empty($carts))
                            @foreach($carts->product as $cart)
                              <tr>
                                <td>{{ $cart->product->product_title }}</td>
                                <td>{{ $cart->product_weight }}</td>
                                <td>{{ $cart->total_amt }}</td>
                              </tr>
                            @endforeach
                          @endif
                        </table>
                      </div>

                   <p>Regards<br>
                      Support Team
                   </p>

                   <a href="#" style="text-decoration: none;color: #d30102;">Sevbazzar</a>
                </div>

         </div>
      </div>
   </body>
</html>