<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Website Payment Standard</title>
        <script type="text/javascript" language="javascript">
            function paypal_submit()
            {
                //var actionName='https://www.paypal.com/cgi-bin/webscr';
                var actionName = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

                document.forms.frmOrderAutoSubmit.action = actionName;
                document.forms.frmOrderAutoSubmit.submit();
            }
            function reload() {
                setTimeout(function () {
                    window.location.href = "http://localhost/ecommerce/public/complete_order"
                }, 1000);
            }

        </script>
    </head>
    <!--onload="paypal_submit();"-->
    <body onload="paypal_submit();" >
        <h1>Redirecting To Paypal.......</h1>
        {!! Form::open(array('url' => 'complete_paypalas', 'method' => 'GET','name'=>'frmOrderAutoSubmit' )) !!} 
        <!--<form style=" padding:0px;margin:0px;" name="frmOrderAutoSubmit" method="post" >-->
        <input type="hidden" name="cancel_return" value="http://www.google.com">
            <input type="hidden" name="return" onclick="reload()"  value="{{URL::to('/complete_paypalas/')}}">
                <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="kamal_ka1@yahoo.com">

                            <?php
                            $contents = Cart::content();
                            foreach ($contents as $v_contents) {
                                ?>                                           
                                <input type="hidden" name="quantity" value="{{$v_contents->qty}}" />
                                <input type="hidden" name="item_name" value="{{$v_contents->name}}">
                                    <input type="hidden" name="amount" value="{{$v_contents->price}}">
                                    <?php } ?>    

                                    <input type="hidden" name="rm" value="2" />
                                    <input TYPE="hidden" name="address_override" value="0">
                                        <input type="hidden" name="first_name" value="{{$customer_info->billing_first_name}}">
                                            <input type="hidden" name="last_name" value="{{$customer_info->billing_last_name}}">
                                                <?php Cart::Destroy(); ?>
                                                <input type="hidden" name="address1" value="{{$customer_info->billing_address}}">
                                                    <input type="hidden" name="address2" value="">
                                                        <input type="hidden" name="city" value="{{$customer_info->billing_city}}">
                                                            <input type="hidden" name="state" value="{{$customer_info->billing_state}}">
                                                                <input type="hidden" name="zip" value="{{$customer_info->billing_postcode}}">


        <!--<input type="hidden" name="night_phone_a" value="">
                <input type="hidden" name="night_phone_b" value="">
                <input type="hidden" name="night_phone_c" value=""> -->

                                                                    {!! Form::close() !!}
                                                                    <!--                                                                    {!! Form::open(array('url' => 'complete_paypalas', 'method' => 'post' )) !!} 
                                                                                                                                        <input type="submit" name="return"  value="https://laravel.io/forum/01-30-2015-laravel5-tokenmismatchexception-in-verifycsrftoken">
                                                                                                                                            <button type="submit" name="return" >Return</button>
                                                                    
                                                                                                                                            {!! Form::close() !!}-->

                                                                    </body>
                                                                    </html>