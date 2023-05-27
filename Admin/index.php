<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
     <?php include('header.php'); ?>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <?php include('topnav.php');?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php 
            include('leftmenu.php')
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!--@include('admin.alert')-->
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card card-primary mt-1">
                                    <?php
                                    require_once("../class/connectDB.php");
                                    require('loadcontent.php'); 
                                    ?>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">
                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
    <!-- /.content-wrapper -->
        </div>
        <?php include('footer.php');?>     
    </body>
</html>