@extends('admin.admin_master')
@section('admin_maincontent')          

<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit Product </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <h2 style="color:green;">
                <?php
                echo Session::get('message');
                echo Session::put('message', '');
                ?>
            </h2>
            <?php
            foreach ($product_info as $v_product) {
                ?>
                <div class="widget-body">
                    <!-- BEGIN FORM-->

                    {!!Form::open(array('url'=>'/update-product','method'=>'post','files'=>'true'))!!}
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                            <input type="text" name="product_title" class="span6 " value="{{$v_product->product_title}}"/>
                            <input type="hidden" name="id" class="span6 " value="{{$v_product->id}}"/>
                        </div>
                    </div>
                    <?php
                    $all_published_category = DB::table('category')
                            ->select("*")
                            ->where('publication_status', 1)
                            ->get();
                    ?>

                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <select name="category_id">
                                <?php
                                foreach ($all_published_category as $v_category) {
                                    ?>
                                    <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>

                                <?php } ?>
                            </select>   
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Manufacturer Name</label>
                        <div class="controls">
                            <input type="text" name="manufacturer_name" class="span6 " value="{{$v_product->manufacturer_name}}"/>
                            <input type="hidden" name="id" class="span6 " value="{{$v_product->id}}"/>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Product Price</label>
                            <div class="controls">
                                <input type="number" name="product_price" class="span6 " value="{{$v_product->product_price}}"/>
                                <input type="hidden" name="id" class="span6 " value="{{$v_product->id}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Product Short Description</label>
                            <div class="controls">
                                <textarea name='product_short_description' rows='5' cols="40">{{$v_product->product_short_description}}</textarea>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Product Long Description</label>
                            <div class="controls">
                                <textarea name='product_long_description' rows='5' cols="40">{{$v_product->product_long_description}}</textarea>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Product Image</label>
                            <div class="controls">
                                <img  style="height:70px;widht:100px;" src="{{asset($v_product->image)}}" alt="image" />					
                                <input type="file" name="image" class="span6 "/>

                            </div>
                        </div>
                        <!--                <div>
                                           //<?php
                        $image_info = $v_product->image;
//                        unlink($image_info);
                        ?>  
                                             
                                        </div>-->
                        <div class="control-group">
                            <label class="control-label">Publication Status</label>
                            <div class="controls">
                                <select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">

                                    @if($v_product->publication_status==1)
                                    <option selected value="1">Published</option>
                                    @else
                                    <option  value="1">Published</option>
                                    @endif

                                    @if($v_product->publication_status==0)
                                    <option selected value="0">Unpublished</option>
                                    @else
                                    <option  value="0">Unpublished</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Featured Product</label>
                            <div class="controls">
                                <select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">

                                    @if($v_product->featured_product==1)
                                    <option selected value="1">Yes</option>
                                    @else
                                    <option  value="1">Yes</option>
                                    @endif

                                    @if($v_product->featured_product==0)
                                    <option selected value="0">No</option>
                                    @else
                                    <option  value="0">No</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn">Cancel</button>
                        </div>
                        {!! Form::close() !!}

                        <!-- END FORM-->
                    </div> 
                <?php } ?>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>

    @endsection