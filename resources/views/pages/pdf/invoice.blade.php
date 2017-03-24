<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<div class="col-md-12 col-sm-12">
    <div class="col-md-3 col-sm-3"></div>
    <div class="col-md-5 col-sm-5">
        <div class="panel-body">                                           
            <div class="table-responsive" style="height:210px;" >
                <h2><b>Cash Memo</b></h2>
                <hr>
                <table class="table  table-bordered table-hover"style="height:50px;">

                    <tbody>
                        <?php $contents = Cart::content(); ?>                                           
                        <tr>
                            <td>Created At :</td>
                            <td>
                                <?php
                                $mytime = Carbon\Carbon::now();
                                echo $mytime->toDateTimeString();
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Name:</td>
                            <td>
                                <?php
                                $customer_name = Session::get('customer_name');
                                echo "$customer_name";
                                ?>
                            </td>                                                                                                                                                          
                        </tr>
                        <tr>
                            <td>C.Contact:</td>
                            <td>
                                <?php
                                $contact = Session::get('customer_phone');
                                echo "$contact";
                                ?>

                            </td>                                                                      
                        </tr>                                         
                    </tbody>
                </table><br>
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    @foreach ($contents as $v_contents) 
                    <tr>
                        <td>{{$v_contents->name}}</td>
                        <td>{{$v_contents->qty}}</td>
                        <td>{{$v_contents->price}}</td>
                    </tr>
                    @endforeach  
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{Cart::total()}}</td>
                    </tr>
                </table>
                <h3>Your Company Name(X)<h4>Address: 6/27,F,Mirpur<br>0189XXXX</h4></h3>           
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4"></div>
</div>