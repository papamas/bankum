<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>BanKum - Aplikasi Bantuan Hukum</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>vendors/images/favicon-16x16.png">

	<!-- CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link href="<?php echo base_url()?>vendors/styles/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>vendors/styles/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>vendors/styles/stylekb.css" rel="stylesheet">
</head>
<body>
	
	<div class="container-fluid featured-area-white-border">
        <div class="container">
            
        </div>
    </div>
    <!-- LOGO -->
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="logo">
                   <img src="<?php echo base_url()?>vendors/images/bankumApp.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGO-->
    <!-- TOP NAVIGATION -->
    <div class="container-fluid">
        <div class="navigation">
            <div class="row">
                <ul class="topnav">
                    <li></li>
                    <li>
                        <a href="<?php echo site_url()?>/home">
                            <i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/kb">
                            <i class="fa fa-book"></i> Knowledge Base</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/kb/artikel">
                            <i class="fa fa-file-text-o"></i> Articles</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/faq">
                            <i class="fa fa-lightbulb-o"></i> FAQ</a>
                    </li>
                    <li class="icon">
                        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION -->
    <!-- SEARCH FIELD AREA -->
    <div class="searchfield bg-hed-six">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="row text-center margin-bottom-20">
                <h1 class="white"> Knowledge Base</h1>
                <span class="nested"> Pusat Konsultasi dan Bantuan Hukum </span>
            </div>
            <br>
            <div class="row search-row">
                <input type="text" class="search" placeholder="Apa yang ingin anda ketahui?">
                <a class="buttonsearch btn btn-info btn-lg" href="search-results.html">Search</a>
            </div>
        </div>
    </div>
    <!-- END SEARCH FIELD AREA -->
    <!-- MAIN SECTION -->
    <div class="container featured-area-default padding-30">
        <div class="row">
            <div class="col-md-8 padding-20">

                <!-- LATEST VIDEO TUTORIAL AREA -->
                <div class="row margin-bottom-30">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="featured-box">
                                <div class="fb-heading">
                                    Video Tutorial Terbaru
                                    <div class="fb-sub-heading">
                                        Silahkan tonton video dibawah ini
                                        
                                    </div>
                                </div>
                                <hr class="style-three">
                                <div class="fb-content">
                                    <iframe src="" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END LATEST VIDEO TUTORIAL AREA -->

                <!-- ARTICLE CATEGORIES SECTION -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="fb-heading">
                            Article Categories
                        </div>
                        <hr class="style-three">
                        <div class="row">
                            <div class="col-md-6 margin-bottom-20">
                                <div class="fat-heading-abb">
                                    <a href="<?php echo site_url()?>/kb/singleKategori">
                                        <i class="fa fa-folder"></i> General
                                        <span class="cat-count">(10)</span>
                                    </a>
                                </div>
                                <div class="fat-content-small padding-left-30">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Add new user</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Change customer details</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 margin-bottom-20">
                                <div class="fat-heading-abb">
                                    <a href="<?php echo site_url()?>/kb/singleKategori">
                                        <i class="fa fa-folder"></i> Account Settings
                                        <span class="cat-count">(6)</span>
                                    </a>
                                </div>
                                <div class="fat-content-small padding-left-30">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Add new user</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Change customer details</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 margin-bottom-20">
                                <div class="fat-heading-abb">
                                    <a href="<?php echo site_url()?>/kb/singleKategori">
                                        <i class="fa fa-folder"></i> Security &amp; Billing
                                        <span class="cat-count">(5)</span>
                                    </a>
                                </div>
                                <div class="fat-content-small padding-left-30">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Add new user</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Change customer details</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 margin-bottom-20">
                                <div class="fat-heading-abb">
                                    <a href="<?php echo site_url()?>/kb/singleKategori">
                                        <i class="fa fa-folder"></i> Using gomac
                                        <span class="cat-count">(45)</span>
                                    </a>
                                </div>
                                <div class="fat-content-small padding-left-30">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Add new user</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Change customer details</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 margin-bottom-20">
                                <div class="fat-heading-abb">
                                    <a href="<?php echo site_url()?>/kb/singleKategori">
                                        <i class="fa fa-folder"></i> Email Campaign
                                        <span class="cat-count">(12)</span>
                                    </a>
                                </div>
                                <div class="fat-content-small padding-left-30">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Add new user</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Change customer details</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 margin-bottom-20">
                                <div class="fat-heading-abb">
                                    <a href="<?php echo site_url()?>/kb/singleKategori">
                                        <i class="fa fa-folder"></i> Configurations
                                        <span class="cat-count">(60)</span>
                                    </a>
                                </div>
                                <div class="fat-content-small padding-left-30">
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Add new user</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Change customer details</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url()?>/kb/singleArtikel">
                                                <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="<?php echo site_url()?>/kb" class="btn btn-primary pull-right">
                                <i class="fa fa-align-justify"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ARTICLES CATEOGIRES SECTION -->
            <!-- SIDEBAR STUFF -->
            <div class="col-md-4 padding-20">
                <div class="row margin-bottom-30">
                    <div class="col-md-12 ">
                        <div class="support-container">
                            <h2 class="support-heading">Need more Support?</h2>
                            If you cannot find an answer in the knowledgebase, you can
                            <a href="#">contact us</a> for further help.
                        </div>
                    </div>
                </div>

                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="fb-heading-small">
                            Popular Articles
                        </div>
                        <hr class="style-three">
                        <div class="fat-content-small padding-left-10">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to change account password?</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> Add new user</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> Change customer details</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> Lookup existing customer in order form</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="fb-heading-small">
                            Latest Articles
                        </div>
                        <hr class="style-three">
                        <div class="fat-content-small padding-left-10">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to change username?</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to change currency in gomac?</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to edit order details?</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to print stock barcode?</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-file-text-o"></i> How to generate barcode?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- POPULAR TAGS (SHOW MAX 20 TAGS) -->
                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="fb-heading-small">
                            Popular Tags
                        </div>
                        <hr class="style-three">
                        <div class="fat-content-tags padding-left-10">
                            <a href="#" class="btn btn-default btn-o btn-sm">password</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">settings</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">sign up</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">currency</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">payment</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">user</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">database</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">storage</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">export</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">email</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">import</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">campaign</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">edit</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">orders</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">help</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">billing</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">user</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">configure</a>
                            <a href="#" class="btn btn-default btn-o btn-sm">customer</a>
                        </div>
                    </div>
                </div>
                <!-- END POPULAR TAGS (SHOW MAX 20 TAGS) -->
            </div>
            <!-- END SIDEBAR STUFF -->
        </div>
    </div>
    <!-- END MAIN SECTION -->

    <!-- ABOUT CONTAINER BOTTOM -->
    <div class="container-fluid featured-area-grey padding-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fb-heading">
                        About Us
                    </div>
                    <div class="fb-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum ultricies magna sed tincidunt. Nullam aliquet est
                            eu magna suscipit ornare. Sed venenatis eget turpis imperdiet vulputate. Pellentesque in lectus
                            arcu. Vestibulum scelerisque, massa vitae suscipit accumsan, ex tellus eleifend ante, ut accumsan
                            quam risus eu leo. Phasellus vel diam id elit ultrices feugiat. Quisque sed massa in quam pulvinar
                            volutpat ut sed risus.
                        </p>
                        <p>
                            Sed eget ultricies lectus. Nulla in porttitor libero. Suspendisse potenti. Etiam iaculis in augue eu volutpat. Pellentesque
                            fringilla orci enim, ut vehicula mauris aliquet quis. Etiam sed rutrum justo. Etiam faucibus
                            consequat ipsum, a pharetra quam bibendum eget. Fusce a consequat mauris, vel vestibulum dolor.
                            Nam ornare enim eget ante pharetra condimentum. Donec feugiat arcu eu arcu faucibus, id ornare
                            enim venenatis. Suspendisse nisi felis, mattis in hendrerit a, pretium posuere mauris. Suspendisse
                            in ante in odio maximus ultrices.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ABOUT CONTAINER BOTTOM -->

    <!-- FOOTER -->
    <div class="container-fluid footer marg30">
        <div class="container">
            <!-- FOOTER COLUMN ONE -->
            <div class="col-xs-12 col-sm-4 col-md-4 margin-top-20">
                <div class="panel-transparent">
                    <div class="footer-heading">How it works</div>
                    <div class="footer-body">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut laoreet dolore magna aliquam erat volutpat.</p>
                        <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                            ex ea commodo consequat. </p>
                    </div>
                </div>
            </div>
            <!-- END FOOTER COLUMN ONE -->
            <!-- FOOTER COLUMN TWO -->
            <div class="col-xs-12 col-sm-4 col-md-4 margin-top-20">
                <div class="panel-transparent">
                    <div class="footer-heading">Categories</div>
                    <div class="footer-body">
                        <ul>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleKategori">General</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleKategori">Getting Started</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleKategori">Account Support</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleKategori">Guides</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleKategori">Payment &amp; Billing</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleKategori">Misc</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END FOOTER COLUMN TWO -->
            <!-- FOOTER COLUMN THREE -->
            <div class="col-xs-12 col-sm-4 col-md-4 margin-top-20">
                <div class="panel-transparent">
                    <div class="footer-heading">Popular Articles</div>
                    <div class="footer-body">
                        <ul>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleArtikel">How to change account password</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleArtikel">How to edit order details</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleArtikel">Add new user</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleArtikel">Change customer details</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleArtikel">Lookup existing customer in order form</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb/singleArtikel">How do I reset my password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END FOOTER COLUMN THREE -->
        </div>
    </div>
    <!-- END FOOTER -->

    <!-- COPYRIGHT INFO -->
    <div class="container-fluid footer-copyright marg30">
        <div class="container">
            <div class="pull-left">
                BanKumApp Knowledge Base &copy 2020 Badan Kepegawaian Negara - Template By Sunny Gohil</a>
            </div>
            <div class="pull-right">
                <i class="fa fa-facebook"></i> &nbsp;
                <i class="fa fa-twitter"></i> &nbsp;
                <i class="fa fa-linkedin"></i>
            </div>
        </div>
    </div>
    <!-- END COPYRIGHT INFO -->

    <!-- LOADING MAIN JAVASCRIPT -->
     <script src="<?php echo base_url()?>vendors/scripts/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url()?>vendors/scripts/mainkb.js"></script>
    <script src="<?php echo base_url()?>vendors/scripts/bootstrap.min.js"></script>
    <script src='https://cdn.rawgit.com/VPenkov/okayNav/master/app/js/jquery.okayNav.js'></script>
</body>
</html>