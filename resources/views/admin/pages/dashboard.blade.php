@extends('admin.admin_master')
@section('admin_maincontent')
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN THEME CUSTOMIZER-->
            <div id="theme-change" class="hidden-phone">
                <i class="icon-cogs"></i>
                <span class="settings">
                    <span class="text">Theme Color:</span>
                    <span class="colors">
                        <span class="color-default" data-style="default"></span>
                        <span class="color-green" data-style="green"></span>
                        <span class="color-gray" data-style="gray"></span>
                        <span class="color-purple" data-style="purple"></span>
                        <span class="color-red" data-style="red"></span>
                    </span>
                </span>
            </div>
            <!-- END THEME CUSTOMIZER-->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                Dashboard
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <span class="divider">/</span>
                </li>

                <li class="active">
                    Dashboard
                </li>
            </ul>
            <h3 style="color:blue;">E-Commerce Admin Panel</h3>
            <h3 style="color:black;">Author Name : </h3><h2><span style="color:green"><?php echo Session::get('admin_name') ?></span></h2>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
</div>
</div>

<!-- END PAGE CONTENT-->         
</div>

@endsection