@extends('admin.admin_master')
@section('admin_maincontent')          

<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Update Book Info </h4>
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
            <div class="widget-body">
                <!-- BEGIN FORM-->

                {!!Form::open(array('url'=>'/update-category','method'=>'post'))!!}
                <div class="control-group">
                    <label class="control-label">Category Name</label>
                    <div class="controls">
                        <input type="text" name="category_name" class="span6 " value="{{$category_info->category_name}}"/>
                        <input type="hidden" name="id" class="span6 " value="{{$category_info->id}}"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Description</label>
                    <div class="controls">
                        <textarea name='category_description' rows='5' cols="40">{{$category_info->category_description}}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Publication Status</label>
                    <div class="controls">
                        <select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">

                            @if($category_info->publication_status==1)
                            <option selected value="1">Published</option>
                            @else
                            <option  value="1">Published</option>
                            @endif

                            @if($category_info->publication_status==0)
                            <option selected value="0">Unpublished</option>
                            @else
                            <option  value="0">Unpublished</option>
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
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection