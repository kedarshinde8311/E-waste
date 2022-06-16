<?php
if (isset($_COOKIE['usertype'])) {
    if ($_COOKIE['usertype'] != "admin") {
        header('Location: ' . base_url());
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <title>E_Waste Administrator</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/select2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/admin/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/respond.min.js"></script>
	<![endif]-->
    <style>
        .form-control{
            border:solid 1px gray;
        }
        form #website{ display:none; }
    </style>
</head>

<body>
<?php
    $this->load->view('snackbar'); ?>
    <div class="main-wrapper" >
        <div class="header">
            <div class="header-left">
                <a href="<?php echo base_url('admin'); ?>" class="logo">
                    <span>E-waste</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">

              
            </ul>
        </div>
