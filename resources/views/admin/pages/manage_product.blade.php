@extends('admin.admin_master')
@section('admin_maincontent')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Advanced Table</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <br>
            {!! Form::open(array('url' => 'search-product', 'method' => 'post' )) !!}

            <table width="400px" align="center">
                <tr>
                    <td><input type="text" name="search_text" placeholder="Search Text" size="50"></td>
                    <td><input type="submit" name="btn" value="search"> </td>
                </tr>
            </table>
            {!! Form::close() !!}
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-bullhorn"></i> Product Name</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Product Summery</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Manufacturer Name</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Images</th>     
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Publication Status</th>

                            <th> Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_manage_product as $v_product) {
                            ?>

                            <tr>
                                <td style="width:15%"><a href="#">{{ $v_product->product_title }} </a></td>
                                <td class="hidden-phone" style="width:25%">{{ $v_product->product_short_description }}</td>
                                <td class="hidden-phone">{{ $v_product->manufacturer_name }}</td>
                                <td class="hidden-phone">
                                    <img  style="height:70px;widht:100px;" src="{{$v_product->image}}" alt="image" />
                                </td>
                                <td class="hidden-phone"><?php
                                    if ($v_product->publication_status == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($v_product->publication_status == 0) {
                                        ?>
                                        <a href="{{URL::to('/publish-product/'.$v_product->id)}}"><button class="btn btn-success"><i class="icon-ok"></i></button></a> 
                                        <?php
                                    } else {
                                        ?>
                                        <a href="{{URL::to('/unpublish-product/'.$v_product->id)}}"> <button class="btn btn-danger"><i class="icon-remove"></i></button></a>
                                    <?php } ?>
                                    <a href="{{URL::to('edit-product/'.$v_product->id)}}" ><button class="btn btn-primary"><i class="icon-pencil "></i></button></a>
                                    <a href="{{URL::to('delete-product/'.$v_product->id)}}" onclick='return check_delete();'><button class="btn btn-danger"><i class="icon-trash "></i></button></a>
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