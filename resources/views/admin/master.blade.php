
  
  <!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Oct 2018 07:28:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/backend_img/sev.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/backend_img/sev.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>

        Sev Bazar

    </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />

    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">

    <meta itemprop="image" content="s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">

    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">

    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="dashboard.html" />
    <meta property="og:image" content="s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->

    <link href="{{ asset('css/backend_css/material-dashboard.min40a0.css?v=2.0.2')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body class="">

    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    <div class="wrapper ">

        <div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('images/backend_img/sidebar-1.jpg')}}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

            <div class="logo"><a href="{{ url('Dashboard')}}" class="simple-text logo-mini">
             &nbsp &nbsp  SEV &nbsp BAZAAR
        </a>
</div>

            <div class="sidebar-wrapper">

                <div class="user">
                    <div class="photo">
                        <img src="{{asset('images/backend_img/faces/avatar.jpg')}}" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
                            <span>
                       Admin 
                      <b class="caret"></b>
                    </span>
                        </a>
                        <!--<div class="collapse" id="collapseExample">-->
                        <!--    <ul class="nav">-->
                        <!--        <li class="nav-item">-->
                        <!--            <a class="nav-link" href="{{url('user')}}">-->
                        <!--                <span class="sidebar-mini"> MP </span>-->
                        <!--                <span class="sidebar-normal"> My Profile </span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                                
                        <!--        <li class="nav-item">-->
                        <!--            <a class="nav-link" href="#">-->
                        <!--                <span class="sidebar-mini"> S </span>-->
                        <!--                <span class="sidebar-normal"> Logout </span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
                <ul class="nav">

                    <li class="nav-item {{ request()->is('Dashboard') ? 'active' : ''}} ">
                        <a class="nav-link" href="{{ url('Dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <p> Dashboard </p>
                        </a>
                    </li>



                    <li class="nav-item {{ (request()->is('ManageCategory') || request()->is('Category')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesCategory">
                            <i class="material-icons">image</i>
                            <p> CATEGORY'S
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('ManageCategory') || request()->is('Category')) ? 'show' : ''}}" id="pagesCategory">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('Category') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Category')}}">
                                        <span class="sidebar-mini"> AD </span>
                                        <span class="sidebar-normal"> Add Category </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageCategory') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageCategory')}}">
                                        <span class="sidebar-mini"> PM </span>
                                        <span class="sidebar-normal"> Manage Category </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('testType') || request()->is('Managetesttype')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagestst">
                            <i class="material-icons">image</i>
                            <p> Test Type
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('testType') || request()->is('Managetesttype')) ? 'show' : ''}}" id="pagestst">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('testType') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('testType')}}">
                                        <span class="sidebar-mini"> AD </span>
                                        <span class="sidebar-normal"> Add Type </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('Managetesttype') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Managetesttype')}}">
                                        <span class="sidebar-mini"> PM </span>
                                        <span class="sidebar-normal"> Manage Type </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('Region') || request()->is('ManageRegion')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesRegion">
                            <i class="material-icons">image</i>
                            <p> City
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('Region') || request()->is('ManageRegion')) ? 'show' : ''}}" id="pagesRegion">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('Region') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Region')}}">
                                        <span class="sidebar-mini"> AD </span>
                                        <span class="sidebar-normal"> Add City </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageRegion') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageRegion')}}">
                                        <span class="sidebar-mini"> PM </span>
                                        <span class="sidebar-normal">Manage City </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item {{ (request()->is('Unit') || request()->is('ManageUnit')) ? 'active' : ''}} ">
                        <a class="nav-link" data-toggle="collapse" href="#pagesunit">
                            <i class="material-icons">image</i>
                            <p> Unit
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('Unit') || request()->is('ManageUnit')) ? 'show' : ''}}" id="pagesunit">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('Unit') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Unit')}}">
                                        <span class="sidebar-mini"> AD </span>
                                        <span class="sidebar-normal"> Add Unit </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageUnit') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageUnit')}}">
                                        <span class="sidebar-mini"> PM </span>
                                        <span class="sidebar-normal">Manage Unit </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('Brand') || request()->is('ManageBrand')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesBrand">
                            <i class="material-icons">image</i>
                            <p> BRANDS
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('Brand') || request()->is('ManageBrand')) ? 'show' : ''}}" id="pagesBrand">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('Brand') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Brand')}}">
                                        <span class="sidebar-mini"> AD </span>
                                        <span class="sidebar-normal"> Add Brand </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageBrand') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageBrand')}}">
                                        <span class="sidebar-mini"> PM </span>
                                        <span class="sidebar-normal">Manage Brands</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
					
					<li class="nav-item {{ (request()->is('Banner') || request()->is('ManageBanner')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesbanner">
                            <i class="material-icons">image</i>
                            <p> Banner
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('Banner') || request()->is('ManageBanner')) ? 'show' : ''}}" id="pagesbanner">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('Banner') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Banner')}}">
                                        <span class="sidebar-mini"> AS </span>
                                        <span class="sidebar-normal"> Add Banner </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageBanner') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageBanner')}}">
                                        <span class="sidebar-mini"> MS </span>
                                        <span class="sidebar-normal">Manage Banner </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
					
					<li class="nav-item {{ (request()->is('OffersBanner') || request()->is('ManageOffersBanner')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesOffersBanner">
                            <i class="material-icons">image</i>
                            <p> Offers Banner
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('OffersBanner') || request()->is('ManageOffersBanner')) ? 'show' : ''}}" id="pagesOffersBanner">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('OffersBanner') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('OffersBanner')}}">
                                        <span class="sidebar-mini"> AS </span>
                                        <span class="sidebar-normal"> Add Banner </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageOffersBanner') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageOffersBanner')}}">
                                        <span class="sidebar-mini"> MS </span>
                                        <span class="sidebar-normal">Manage Banner </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item {{ (request()->is('Slider') || request()->is('ManageSlider')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesSlider">
                            <i class="material-icons">image</i>
                            <p> SLIDER
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('Slider') || request()->is('ManageSlider')) ? 'show' : ''}}" id="pagesSlider">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('Slider') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('Slider')}}">
                                        <span class="sidebar-mini"> AS </span>
                                        <span class="sidebar-normal"> Add Slider </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageSlider') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageSlider')}}">
                                        <span class="sidebar-mini"> MS </span>
                                        <span class="sidebar-normal">Manage Slider </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <!-- <li class="nav-item {{ request()->is('ManageProduct') ? 'active' : ''}}">
                        <a class="nav-link"  href="{{url('ManageProduct')}}">
                            <i class="material-icons">image</i>
                            <p>  Manage Product
                            </p>
                        </a>
                    </li> -->
                    
                     <li class="nav-item {{ request()->is('ManageUser') ? 'active' : ''}}">
                        <a class="nav-link"  href="{{url('ManageUser')}}">
                            <i class="material-icons">image</i>
                            <p> User's
                                <!--<b class="caret"></b>-->
                            </p>
                        </a>

                        
                    </li>

                    <li class="nav-item {{ (request()->is('CreateVendor') || request()->is('ManageVendor')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesVendor">
                            <i class="material-icons">image</i>
                            <p> Vendor's
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('CreateVendor') || request()->is('ManageVendor')) ? 'show' : ''}}" id="pagesVendor">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('CreateVendor') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('CreateVendor')}}">
                                        <span class="sidebar-mini"> AD </span>
                                        <span class="sidebar-normal"> Add Vendor </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageVendor') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageVendor')}}">
                                        <span class="sidebar-mini"> PM </span>
                                        <span class="sidebar-normal"> Manage Vendor's </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (request()->is('ManageOrder/*')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">apps</i>
                            <p> Order
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('ManageOrder/*')) ? 'show' : ''}}" id="componentsExamples">
                            <ul class="nav">
                                <li class="nav-item {{ request()->is('ManageOrder/1') ? 'active' : ''}}">
                                    <a class="nav-link"  href="{{url('ManageOrder/1')}}">
                                        <span class="sidebar-mini"> OM </span>
                                        <span class="sidebar-normal"> All Order  
                              <b class="caret"></b>
                            </span>

                                    </a>

                                   
                                </li>
                                <li class="nav-item {{ request()->is('ManageOrder/2') ? 'active' : ''}}">
                                    <a class="nav-link"  href="{{url('ManageOrder/2')}}">
                                        <span class="sidebar-mini"> OM </span>
                                        <span class="sidebar-normal"> Complete Order  
                              <b class="caret"></b>
                            </span>

                                    </a>

                                   
                                </li>
                                <li class="nav-item {{ request()->is('ManageOrder/3') ? 'active' : ''}}">
                                    <a class="nav-link"  href="{{url('ManageOrder/3')}}">
                                        <span class="sidebar-mini"> OM </span>
                                        <span class="sidebar-normal"> Cancel Order  
                              <b class="caret"></b>
                            </span>

                                    </a>

                                   
                                </li>
                                <li class="nav-item {{ request()->is('ManageOrder/4') ? 'active' : ''}}">
                                    <a class="nav-link"  href="{{url('ManageOrder/4')}}">
                                        <span class="sidebar-mini"> OM </span>
                                        <span class="sidebar-normal"> Ongoing Order  
                              <b class="caret"></b>
                            </span>

                                    </a>

                                   
                                </li>
                                <li class="nav-item {{ request()->is('ManageOrder/5') ? 'active' : ''}}">
                                    <a class="nav-link"  href="{{url('ManageOrder/5')}}">
                                        <span class="sidebar-mini"> OM </span>
                                        <span class="sidebar-normal"> Return Order  
                              <b class="caret"></b>
                            </span>

                                    </a>

                                   
                                </li>
                                
                               
                            </ul>
                        </div>
                    </li>


                    
                    <!--<li class="nav-item ">-->
                    <!--    <a class="nav-link" data-toggle="collapse" href="#pagesExamples1">-->
                    <!--        <i class="material-icons">image</i>-->
                    <!--        <p> Sale-->
                    <!--            <b class="caret"></b>-->
                    <!--        </p>-->
                    <!--    </a>-->

                    <!--    <div class="collapse" id="pagesExamples1">-->
                    <!--        <ul class="nav">-->
                               
                    <!--            <li class="nav-item ">-->
                    <!--                <a class="nav-link" href="{{url('ManageSale')}}">-->
                    <!--                    <span class="sidebar-mini"> SM </span>-->
                    <!--                    <span class="sidebar-normal"> Sale Mangement </span>-->
                    <!--                </a>-->
                    <!--            </li>-->
                                
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <li class="nav-item {{ (request()->is('CreateCoupon') || request()->is('ManageCoupon')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamplesCoupon">
                            <i class="material-icons">image</i>
                            <p> Coupon Code
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('CreateCoupon') || request()->is('ManageCoupon')) ? 'show' : ''}}" id="pagesExamplesCoupon">
                            <ul class="nav">
                                
                                <li class="nav-item {{ request()->is('CreateCoupon') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('CreateCoupon')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Create Coupon </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageCoupon') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageCoupon')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Manage Coupon </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('CreateFilter') || request()->is('ManageFilter')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamplesfilter">
                            <i class="material-icons">image</i>
                            <p> Filter
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('CreateFilter') || request()->is('ManageFilter')) ? 'show' : ''}}" id="pagesExamplesfilter">
                            <ul class="nav">
                                
                                <li class="nav-item {{ request()->is('CreateFilter') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('CreateFilter')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Create Filter </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageFilter') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageFilter')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Manage Filter </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    
                     <li class="nav-item {{ (request()->is('CreateReturnReason') || request()->is('ManageReturnReason')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamplesReturnReason">
                            <i class="material-icons">image</i>
                            <p> Return Reason
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('CreateReturnReason') || request()->is('ManageReturnReason')) ? 'show' : ''}}" id="pagesExamplesReturnReason">
                            <ul class="nav">
                                
                                <li class="nav-item {{ request()->is('CreateReturnReason') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('CreateReturnReason')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Create ReturnReason </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageReturnReason') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageReturnReason')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Manage ReturnReason </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ (request()->is('CreateCancelReason') || request()->is('ManageCancelReason')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamplesCancelReason">
                            <i class="material-icons">image</i>
                            <p> Cancel Reason
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('CreateCancelReason') || request()->is('ManageCancelReason')) ? 'active' : ''}}" id="pagesExamplesCancelReason">
                            <ul class="nav">
                                
                                <li class="nav-item {{ request()->is('CreateCancelReason') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('CreateCancelReason')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Create CancelReason </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageCancelReason') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageCancelReason')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Manage CancelReason </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item {{ (request()->is('CreateNotification') || request()->is('ManageNotification')) ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamples2">
                            <i class="material-icons">image</i>
                            <p> Notification
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ (request()->is('CreateNotification') || request()->is('ManageNotification')) ? 'active' : ''}}" id="pagesExamples2">
                            <ul class="nav">
                                
                                <li class="nav-item {{ request()->is('CreateNotification') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('CreateNotification')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Create Notification </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('ManageNotification') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManageNotification')}}">
                                        <span class="sidebar-mini"> RM </span>
                                        <span class="sidebar-normal"> Manage Notification </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    
                     <li class="nav-item {{ request()->is('ManageGst') ? 'active' : ''}}">
                        <a href="{{url('ManageGst')}}" class="nav-link" >
                            <i class="material-icons">image</i>
                            <p> Gst
                                <b class="caret"></b>
                            </p>
                        </a>

                       
                    </li>
                    
                    <li class="nav-item {{ request()->is('ManageSupport') ? 'active' : ''}}">
                        <a href="{{url('ManageSupport')}}" class="nav-link" >
                            <i class="material-icons">image</i>
                            <p> Support
                                <b class="caret"></b>
                            </p>
                        </a>

                       
                    </li>
                  
                    <li class="nav-item {{ request()->is('ManagePayment') ? 'active' : ''}}">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamplespayment">
                            <i class="material-icons">image</i>
                            <p> payment
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse {{ request()->is('ManagePayment') ? 'show' : ''}}" id="pagesExamplespayment">
                            <ul class="nav">
                                
                                <li class="nav-item {{ request()->is('ManagePayment') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{url('ManagePayment')}}">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal">Mangement payment </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('ManageOffers') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('ManageOffers')}}">
                            <i class="material-icons">image</i>
                            <p> offers
                                <b class="caret"></b>
                            </p>
                        </a>

                        
                    </li>
                    <li class="nav-item {{ request()->is('TopSeller') ? 'active' : ''}}">
                        <a class="nav-link"  href="{{url('TopSeller')}}">
                            <i class="material-icons">image</i>
                            <p> Top Seller
                                <b class="caret"></b>
                            </p>
                        </a>

                       
                    </li>

                    

                    

                </ul>

            </div>
        </div>
		

        <div class="main-panel">
             @include('admin.include.header_afterlogin')
			<!-- Navbar -->
            
            <!-- End Navbar -->

            @yield('maincontent')
            
@include('admin.include.footer_afterlogin')
                                    
									

                                </div>

                            </div>

                            @include('admin.include.setting')
							

                            
							





<!--   Core JS Files   -->
  <script src="{{ asset('js/backend_js/core/jquery.min.js') }}" type="text/javascript"></script>
                            <script src="{{ asset('js/backend_js/core/popper.min.js') }}" type="text/javascript"></script>
                            <script src="{{ asset('js/backend_js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>

                            <script src="{{ asset('js/backend_js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

                            <!-- Plugin for the momentJs  -->
                            <script src="{{ asset('js/backend_js/plugins/moment.min.js') }}"></script>

                            <!--  Plugin for Sweet Alert -->
                            <script src="{{ asset('js/backend_js/plugins/sweetalert2.js') }}"></script>

                            <!-- Forms Validations Plugin -->
                            <script src="{{ asset('js/backend_js/plugins/jquery.validate.min.js') }}"></script>

                            <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
                            <script src="{{ asset('js/backend_js/plugins/jquery.bootstrap-wizard.js') }}"></script>

                            <!--    Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
                            <script src="{{ asset('js/backend_js/plugins/bootstrap-selectpicker.js') }}"></script>

                            <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
                            <script src="{{ asset('js/backend_js/plugins/bootstrap-datetimepicker.min.js') }}"></script>

                            <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
                            <script src="{{ asset('js/backend_js/plugins/jquery.dataTables.min.js') }}"></script>

                            <!--    Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
                            <script src="{{ asset('js/backend_js/plugins/bootstrap-tagsinput.js') }}"></script>

                            <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
                            <script src="{{ asset('js/backend_js/plugins/jasny-bootstrap.min.js') }}"></script>

                            <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
                            <script src="{{ asset('js/backend_js/plugins/fullcalendar.min.js') }}"></script>

                            <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
                            <script src="{{ asset('js/backend_js/plugins/jquery-jvectormap.js') }}"></script>

                            <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
                            <script src="{{ asset('js/backend_js/plugins/nouislider.min.js') }}"></script>

                            <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js') }}"></script>

                            <!-- Library for adding dinamically elements -->
                            <script src="{{ asset('js/backend_js/plugins/arrive.min.js') }}"></script>

                            <!--  Google Maps Plugin    -->

                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

                            <!-- Place this tag in your head or just before your close body tag. -->
                            <script async defer src="http://buttons.github.io/buttons.js"></script>

                            <!-- Chartist JS -->
                            <script src="{{ asset('js/backend_js/plugins/chartist.min.js') }}"></script>

                            <!--  Notifications Plugin    -->
                            <script src="{{ asset('js/backend_js/plugins/bootstrap-notify.js') }}"></script>

                            <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                            <!--<script src="{{ asset('js/backend_js/material-dashboard.min40a0.js?v=2.0.2') }}" type="text/javascript"></script>-->
                            <!-- Material Dashboard DEMO methods, don't include it in your project! -->
                            <script src="{{ asset('demo/demo.js') }}"></script>
                            <script>
                                $(document).ready(function() {
                                    $().ready(function() {
                                        $sidebar = $('.sidebar');

                                        $sidebar_img_container = $sidebar.find('.sidebar-background');

                                        $full_page = $('.full-page');

                                        $sidebar_responsive = $('body > .navbar-collapse');

                                        window_width = $(window).width();

                                        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                                        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                                            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                                                $('.fixed-plugin .dropdown').addClass('open');
                                            }

                                        }

                                        $('.fixed-plugin a').click(function(event) {
                                            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                                            if ($(this).hasClass('switch-trigger')) {
                                                if (event.stopPropagation) {
                                                    event.stopPropagation();
                                                } else if (window.event) {
                                                    window.event.cancelBubble = true;
                                                }
                                            }
                                        });

                                        $('.fixed-plugin .active-color span').click(function() {
                                            $full_page_background = $('.full-page-background');

                                            $(this).siblings().removeClass('active');
                                            $(this).addClass('active');

                                            var new_color = $(this).data('color');

                                            if ($sidebar.length != 0) {
                                                $sidebar.attr('data-color', new_color);
                                            }

                                            if ($full_page.length != 0) {
                                                $full_page.attr('filter-color', new_color);
                                            }

                                            if ($sidebar_responsive.length != 0) {
                                                $sidebar_responsive.attr('data-color', new_color);
                                            }
                                        });

                                        $('.fixed-plugin .background-color .badge').click(function() {
                                            $(this).siblings().removeClass('active');
                                            $(this).addClass('active');

                                            var new_color = $(this).data('background-color');

                                            if ($sidebar.length != 0) {
                                                $sidebar.attr('data-background-color', new_color);
                                            }
                                        });

                                        $('.fixed-plugin .img-holder').click(function() {
                                            $full_page_background = $('.full-page-background');

                                            $(this).parent('li').siblings().removeClass('active');
                                            $(this).parent('li').addClass('active');

                                            var new_image = $(this).find("img").attr('src');

                                            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                                                $sidebar_img_container.fadeOut('fast', function() {
                                                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                                    $sidebar_img_container.fadeIn('fast');
                                                });
                                            }

                                            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                                                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                                                $full_page_background.fadeOut('fast', function() {
                                                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                                    $full_page_background.fadeIn('fast');
                                                });
                                            }

                                            if ($('.switch-sidebar-image input:checked').length == 0) {
                                                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                                                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                            }

                                            if ($sidebar_responsive.length != 0) {
                                                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                                            }
                                        });

                                        $('.switch-sidebar-image input').change(function() {
                                            $full_page_background = $('.full-page-background');

                                            $input = $(this);

                                            if ($input.is(':checked')) {
                                                if ($sidebar_img_container.length != 0) {
                                                    $sidebar_img_container.fadeIn('fast');
                                                    $sidebar.attr('data-image', '#');
                                                }

                                                if ($full_page_background.length != 0) {
                                                    $full_page_background.fadeIn('fast');
                                                    $full_page.attr('data-image', '#');
                                                }

                                                background_image = true;
                                            } else {
                                                if ($sidebar_img_container.length != 0) {
                                                    $sidebar.removeAttr('data-image');
                                                    $sidebar_img_container.fadeOut('fast');
                                                }

                                                if ($full_page_background.length != 0) {
                                                    $full_page.removeAttr('data-image', '#');
                                                    $full_page_background.fadeOut('fast');
                                                }

                                                background_image = false;
                                            }
                                        });

                                        $('.switch-sidebar-mini input').change(function() {
                                            $body = $('body');

                                            $input = $(this);

                                            if (md.misc.sidebar_mini_active == true) {
                                                $('body').removeClass('sidebar-mini');
                                                md.misc.sidebar_mini_active = false;

                                                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                                            } else {

                                                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                                                setTimeout(function() {
                                                    $('body').addClass('sidebar-mini');

                                                    md.misc.sidebar_mini_active = true;
                                                }, 300);
                                            }

                                            // we simulate the window Resize so the charts will get updated in realtime.
                                            var simulateWindowResize = setInterval(function() {
                                                window.dispatchEvent(new Event('resize'));
                                            }, 180);

                                            // we stop the simulation of Window Resize after the animations are completed
                                            setTimeout(function() {
                                                clearInterval(simulateWindowResize);
                                            }, 1000);

                                        });
                                    });
                                });
                            </script>

                            <!-- Sharrre libray -->
                            <script src="{{ asset('demo/jquery.sharrre.js') }}"></script>

                            <script>
                                $(document).ready(function() {

                                    $('#facebook').sharrre({
                                        share: {
                                            facebook: true
                                        },
                                        enableHover: false,
                                        enableTracking: false,
                                        enableCounter: false,
                                        click: function(api, options) {
                                            api.simulateClick();
                                            api.openPopup('facebook');
                                        },
                                        template: '<i class="fab fa-facebook-f"></i> Facebook',
                                        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                                    });

                                    $('#google').sharrre({
                                        share: {
                                            googlePlus: true
                                        },
                                        enableCounter: false,
                                        enableHover: false,
                                        enableTracking: true,
                                        click: function(api, options) {
                                            api.simulateClick();
                                            api.openPopup('googlePlus');
                                        },
                                        template: '<i class="fab fa-google-plus"></i> Google',
                                        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                                    });

                                    $('#twitter').sharrre({
                                        share: {
                                            twitter: true
                                        },
                                        enableHover: false,
                                        enableTracking: false,
                                        enableCounter: false,
                                        buttons: {
                                            twitter: {
                                                via: 'CreativeTim'
                                            }
                                        },
                                        click: function(api, options) {
                                            api.simulateClick();
                                            api.openPopup('twitter');
                                        },
                                        template: '<i class="fab fa-twitter"></i> Twitter',
                                        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                                    });

                                    var _gaq = _gaq || [];
                                    _gaq.push(['_setAccount', 'UA-46172202-1']);
                                    _gaq.push(['_trackPageview']);

                                    (function() {
                                        var ga = document.createElement('script');
                                        ga.type = 'text/javascript';
                                        ga.async = true;
                                        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                        var s = document.getElementsByTagName('script')[0];
                                        s.parentNode.insertBefore(ga, s);
                                    })();

                                    // Facebook Pixel Code Don't Delete
                                    ! function(f, b, e, v, n, t, s) {
                                        if (f.fbq) return;
                                        n = f.fbq = function() {
                                            n.callMethod ?
                                                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                                        };
                                        if (!f._fbq) f._fbq = n;
                                        n.push = n;
                                        n.loaded = !0;
                                        n.version = '2.0';
                                        n.queue = [];
                                        t = b.createElement(e);
                                        t.async = !0;
                                        t.src = v;
                                        s = b.getElementsByTagName(e)[0];
                                        s.parentNode.insertBefore(t, s)
                                    }(window,
                                        document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

                                    try {
                                        fbq('init', '111649226022273');
                                        fbq('track', "PageView");

                                    } catch (err) {
                                        console.log('Facebook Track Error:', err);
                                    }

                                });
                            </script>
                            <noscript>
                                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />

                            </noscript>

                            <script>
                                $(document).ready(function() {
                                    // Javascript method's body can be found in {{ asset('js/backend_js/demos.js
                                    md.initDashboardPageCharts();

                                    md.initVectorMap();

                                });
                            </script>
                            @yield('pagespecjs')

                            
                          
</body>

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Oct 2018 07:29:07 GMT -->

</html>