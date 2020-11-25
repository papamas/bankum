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
                <button class="buttonsearch btn btn-info btn-lg">Search</button>
            </div>
        </div>
    </div>
    <!-- END SEARCH FIELD AREA -->
    <!-- MAIN SECTION -->
    <div class="container featured-area-default padding-30">
        <div class="row">
            <!-- ARTICLE OVERVIEW SECTION -->
            <div class="col-md-8 padding-20">
                <div class="row">
                    <!-- BREADCRUMBS -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo site_url()?>/home">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/kb">Knowledge Base</a>
                            </li>
                            <li class="active">General</li>
                        </ol>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- ARTICLES -->
                    <div class="fb-heading">
                        <i class="fa fa-folder"></i> Category: General
                        <span class="cat-count">(10)</span>
                    </div>
                    <hr class="style-three">
                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to change account password?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Account Settings </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 4 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to change currency in gomac?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Admin Panel </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 10 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to edit order details?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Orders </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 0 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to print stock barcode?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Stocks </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 12 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="article-heading-abb">
                            <a href="single-article.html">
                                <i class="fa fa-pencil-square-o"></i> How to generate barcode?</a>
                        </div>
                        <div class="article-info">
                            <div class="art-date">
                                <a href="#">
                                    <i class="fa fa-calendar-o"></i> 20 May, 2016 </a>
                            </div>
                            <div class="art-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i> Stocks </a>
                            </div>
                            <div class="art-comments">
                                <a href="#">
                                    <i class="fa fa-comments-o"></i> 7 Comments </a>
                            </div>
                        </div>
                        <div class="article-content">
                            <p class="block-with-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet finibus dui. Fusce ac nulla nec ex ornare vehicula
                                non nec mi. Cras eget nisi sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec viverra faucibus magna sed interdum. Phasellus ultrices sagittis
                                molestie. Sed sit amet nisl id risus egestas semper. In porta, arcu eu dignissim vestibulum,
                                sapien justo imperdiet enim, sed facilisis quam justo in neque. Aliquam fermentum arcu eget
                                hendrerit efficitur.
                            </p>
                        </div>
                        <div class="article-read-more">
                            <a href="single-article.html" class="btn btn-default btn-wide">Read more...</a>
                        </div>
                    </div>
                    <!-- END ARTICLES -->

                    <!-- PAGINATION -->
                    <nav class="text-center">
                        <ul class="pagination">
                            <li class="disabled">
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <i class="fa fa-arrow-circle-left"></i> Previous</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">1
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="enabled">
                                <a href="#">2
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="enabled">
                                <a href="#">3
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="enabled">
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">Next
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END PAGINATION -->
                </div>
            </div>
            <!-- END ARTICLES OVERVIEW SECTION-->
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
                                <a href="single-category.html">General</a>
                            </li>
                            <li>
                                <a href="single-category.html">Getting Started</a>
                            </li>
                            <li>
                                <a href="single-category.html">Account Support</a>
                            </li>
                            <li>
                                <a href="single-category.html">Guides</a>
                            </li>
                            <li>
                                <a href="single-category.html">Payment &amp; Billing</a>
                            </li>
                            <li>
                                <a href="single-category.html">Misc</a>
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
                                <a href="single-article.html">How to change account password</a>
                            </li>
                            <li>
                                <a href="single-article.html">How to edit order details</a>
                            </li>
                            <li>
                                <a href="single-article.html">Add new user</a>
                            </li>
                            <li>
                                <a href="single-article.html">Change customer details</a>
                            </li>
                            <li>
                                <a href="single-article.html">Lookup existing customer in order form</a>
                            </li>
                            <li>
                                <a href="single-article.html">How do I reset my password</a>
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