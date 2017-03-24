@extends('master')
@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Login</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('login-error'))
<h3 class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('login-error') }}</h3>
@endif
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">          
            <div class="col-md-offset-2 col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <div class="woocommerce-info">Returning customer? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                        </div>

                        {{ Form::open( array('url'=>'/customer-signin', 'method'=>'post','id'=>'login-form-wrap','class'=>'login collapse'))}}
                        <p class="form-row form-row-first">
                            <label for="username"> Email <span class="required">*</span>
                            </label>
                            <input type="text" id="username" name="username" class="input-text">
                        </p>
                        <p class="form-row form-row-last">
                            <label for="password">Password <span class="required">*</span>
                            </label>
                            <input type="password" id="password" name="password" class="input-text">
                        </p>
                        <div class="clear"></div>


                        <p class="form-row">
                            <input type="submit" value="Login" name="login" class="button">
                            <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                        </p>
                        {!! Form::close() !!}
                        <p class="lost_password">
                            <a href="#">Lost your password?</a>
                        </p>

                        <div class="clear"></div>
                        </form>
                    </div>



                </div>                       
            </div>                    
        </div>
    </div>
</div>
</div>
@endsection