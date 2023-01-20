<ul class="navbar-nav mr-auto mt-md-0">
    <!-- This is  -->
    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
    <!-- ============================================================== -->
    <!-- Comment --> 
    <!-- ============================================================== -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell-ring"></i>
            <div class="notify"> <?php if($notif){?><span class="heartbit"></span> <span class="point"></span><?php }?> </div>
        </a><?php if($notif){?>
        <div class="dropdown-menu mailbox animated slideInUp">
            <ul>
                <li>
                    <div class="drop-title">Notifications</div>
                </li>
                <li>
                    <div class="message-center">
                        <!-- Message -->
                        <?php foreach($notif as $n){ 
                            if($n->tujuan_notif==$this->session->userdata('level')){?>
                            <a href="<?php echo base_url();?>index.php/c_notif/read_notif/<?php echo $n->id_notif?>">
                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                <div class="mail-contnet">
                                    <h5><?php echo $n->isi_notif;?></h5><span class="time"><?php echo indo_mysql($n->tgl_notif);?></span> </div>
                            </a>
                        <?php } }?>
                    </div>
                </li>
            </ul>
        </div><?php }?>
    </li>
</ul>