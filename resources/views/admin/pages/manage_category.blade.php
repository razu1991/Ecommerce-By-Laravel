@extends('admin.admin_master')
@section('admin_maincontent')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Book Info</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-bullhorn"></i> Category Name</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Category Description</th>
                            <th><i class="icon-bookmark"></i> Publication Status</th>
                            <th> Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_category as $v_category) {
                            ?>

                            <tr>
                                <td><a href="#"><?php echo $v_category->category_name; ?> </a></td>
                                <td class="hidden-phone"><?php echo $v_category->category_description; ?></td>
                                <td class="hidden-phone"><?php
                                    if ($v_category->publication_status == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($v_category->publication_status == 0) {
                                        ?>
                                        <a href="{{URL::to('/publish-category/'.$v_category->id)}}">
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                        </a> 
                                    <?php } else { ?>

                                        <a href="{{URL::to('/unpublish-category/'.$v_category->id)}}"> 
                                            <button class="btn btn-danger"><i class="icon-remove"></i></button>
                                        </a>
                                    <?php } ?>
                                    <a href="{{URL::to('edit-category/'.$v_category->id)}}" >
                                        <button class="btn btn-primary"><i class="icon-pencil "></i></button>
                                    </a>
                                    <a href="{{URL::to('delete-category/'.$v_category->id)}}" onclick='return check_delete();'>
                                        <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC PORTLET-->
    </div>
</div>
@endsection