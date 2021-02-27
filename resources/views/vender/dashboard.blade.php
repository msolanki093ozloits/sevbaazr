@extends('vender.master')                  
@section('maincontent')

<div class="content">

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <!--<div class="card-header card-header-success card-header-icon">-->
                                    <!--    <div class="card-icon">-->
                                    <!--        <i class="material-icons"></i>-->
                                    <!--    </div>-->
                                    <!--    <h4 class="card-title">Global Sales by Top Locations</h4>-->
                                    <!--</div>-->
                                    <div class="card-body ">
                                        
                                            
                                                <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card card-chart">
                                                            <div class="card-header card-header-rose" data-header-animation="true">
                                                                <div class="ct-chart" id="websiteViewsChart"></div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-actions">
                                                                    
                                                                    
                                                                </div>
                                                                <h4 class="card-title">Orders</h4>
                                                               
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card card-chart">
                                                            <div class="card-header card-header-success" data-header-animation="true">
                                                                <div class="ct-chart" id="dailySalesChart"></div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-actions">
                                                                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                                                        <i class="material-icons">build</i> Fix Header!
                                                                    </button>
                                                                    
                                                                </div>
                                                                <h4 class="card-title">Daily Orders</h4>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="card card-stats">
                                                            <div class="card-header card-header-warning card-header-icon">
                                                                <div class="card-icon">
                                                                    <i class="material-icons">weekend</i>
                                                                </div>
                                                                <p class="card-category">Total Orders</p>
                                                                <h3 class="card-title">{{ $productDetails['category']}}</h3>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="card card-stats">
                                                            <div class="card-header card-header-rose card-header-icon">
                                                                <div class="card-icon">
                                                                    <i class="material-icons">equalizer</i>
                                                                </div>
                                                                <p class="card-category">Completed Orders</p>
                                                                <h3 class="card-title">{{ $productDetails['category1']}}</h3>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="card card-stats">
                                                            <div class="card-header card-header-success card-header-icon">
                                                                <div class="card-icon">
                                                                    <i class="material-icons">store</i>
                                                                </div>
                                                                <p class="card-category">Revenue</p>
                                                                <h3 class="card-title">₹ </h3>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="card card-stats">
                                                            <div class="card-header card-header-info card-header-icon">
                                                                <div class="card-icon">
                                                                    <i class="fa fa-twitter"></i>
                                                                </div>
                                                                <p class="card-category">Balance</p>
                                                                <h3 class="card-title">+245</h3>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            
                                        </div>

                                    </div>
                                    @stop