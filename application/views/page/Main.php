<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/dist/s_img/1fix.png">
    <title>SIPDES</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/assets/dist/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url();?>/assets/dist/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/assets/dist/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/dist/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/dist/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>/assets/dist/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/assets/dist/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets/dist/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets/dist/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets/dist/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <!--alerts CSS -->
    <link href="<?php echo base_url();?>/assets/dist/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>/assets/dist/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/plugins/dropify/dist/css/dropify.min.css">
    <link href="<?php echo base_url();?>/assets/dist/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/dist/plugins/year_picker/yearpicker.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url();?>/assets/dist/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <style type="text/css">
        @media print {
          //Add to elements that you do not want to show when printing
          .no-print {
            display: none !important;
          }
        }
    </style>
    <style type="text/css">
      .print_warna{
        color: black;
        font-family: sans-serif;
      }
      .page-break{
        page-break-before: always;
      }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    <?php function rupiah_php($angka){
        $hasil_rupiah = number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    $this->load->view('page/get_tgl');
    $this->load->view('page/get_text_rupiah');?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/page/">
                        <!-- Logo icon --><b>
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url();?>assets/dist/s_img/1fix.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- Light Logo text -->    
                         <img src="<?php echo base_url();?>assets/dist/s_img/12.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                    <?php 
                        // $level = $this->session->userdata('level');
                        // $data['notif'] = $this->M_notif->get_notif($level);
                        // $this->load->view('notif',$data);
                    ?>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if($this->session->userdata('pic')==""){?>
                                    <img src="<?php echo base_url();?>assets/dist/profile_img/default.png" alt="user" class="profile-pic">
                                <?php }else{ ?>
                                    <img src="<?php echo base_url();?>assets/dist/profile_img/<?php echo $this->session->userdata('pic');?>" alt="user" class="profile-pic">
                                <?php }?></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <?php if($this->session->userdata('pic')==""){?>
                                                    <img src="<?php echo base_url();?>assets/dist/profile_img/default.png" alt="user">
                                                <?php }else{ ?>
                                                    <img src="<?php echo base_url();?>assets/dist/profile_img/<?php echo $this->session->userdata('pic');?>" alt="user">
                                                <?php }?>
                                            </div>
                                            <div class="u-text">
                                                <h4><?php echo $this->session->userdata('nama');?></h4>
                                                <p class="text-muted"><?php echo $this->session->userdata('level');?></p><a href="<?php echo base_url();?>index.php/c_user/myprofile" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url();?>index.php/c_user/myprofile"><i class="ti-user"></i> My Profile</a></li>
                                    <li data-toggle="modal" data-target="#logout_modal"><a href="#"><i class="fa fa-power-off" data-toggle="modal" data-target=".bs-example-modal-sm"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php $this->load->view('page/menu/v_menu');?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
              <?php $this->load->view('page/content/V_breadcrumb');?>
            <!-- ============================================================== -->
           <!--  <div class="" >
                <button class="right-side-toggle waves-effect waves-light btn-info btn btn-circle btn-sm pull-right m-l-10" data-toggle="modal" data-target="#logout_modal"><i class="ti-settings text-white" data-toggle="tooltip" data-placement="left" data-original-title="Logout"></i></button>
            </div> -->

            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <?php if($content!=""){$this->load->view($content);}else{$this->load->view('page/content/V_content');}?>
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Press Admin by themedesigner.in </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>assets/dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/plugins/moment/moment.js"></script>

    <script src="<?php echo base_url();?>assets/dist/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>assets/dist/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--sparkline JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/jasny-bootstrap.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/morrisjs/morris.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>assets/dist/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/dropify/dist/js/ac_dropify.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>

    <script src="<?php echo base_url();?>assets/dist/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url();?>assets/dist/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo base_url();?>/assets/dist/plugins/year_picker/yearpicker.js"></script>
    <script src="<?php echo base_url();?>/assets/dist/repeater/jquery.repeater.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify();
        });
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
    </script>
    <script>        
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            startDate: "dateToday"
        });        
        jQuery('.date-min-today').datepicker({
            autoclose: true,
            todayHighlight: true,
            startDate: "dateToday"
        });
    </script>
    <script>        
        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
    <script>        
        jQuery('#d_e_user').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.datatable').DataTable();
      });
    </script>
    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><style>@media print{body{color: black;font-family:sans-serif;}}</style><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
    </script>
    <style type="text/css">
      #print_warna{
        color: black;
        font-family: sans-serif;
      }
    </style>
    <script language="javascript" type="text/javascript">
        function printDiv_landscape(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><style>@media print{@page {size: landscape;}body{color: black;font-family:sans-serif;}}</style><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
    </script>
    <script>
    $(document).ready(function() {
        $('.te1').wysihtml5();
        $('.te2').wysihtml5();
    });
    </script>

    <!--Modals -->
    <?php $this->load->view('page/content/modals/V_modals');?>
    <script>
    $(document).ready(function () {
       // 'use strict';

        $('.repeater').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Hapus baris terpilih?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {

            }
        });
    });
    </script>
    <script>
    $(document).ready(function () {
       // 'use strict';

        $('.edit_rab').repeater({
            defaultValues: {
                't_id_bahan': '0',
            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Hapus baris terpilih?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {

            }
        });
    });
    </script>
    <script>
        jQuery('.mydatepicker, #datepicker, .datepicker').datepicker();
        jQuery('.date-range').datepicker({
            toggleActive: true
        });
    </script>
  </body>
</html>