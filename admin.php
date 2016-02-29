<?php
    session_start($_GET['session_id']);
    
    if (!isset($_SESSION['user_login_status'])||$_SESSION['user_login_status']!== 1) {
            header("Location: index.html");
            exit;
        }
    
       
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Admin</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
</head>

<body id="page-top" class="index" ng-app="getSamples" ng-controller="sampleCtrl">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Admin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a ng-click="logout()">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <header>
         <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">PORTFOLIO CMS</span>
                    </div>
                </div>
             </div>
        </div>
    </header>
    
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                 <div class="col-sm-4 portfolio-item" ng-repeat="x in samples">
                    <a href="#portfolio{{x.id}}" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-edit fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{ x.Image }}" class="img-responsive" alt="">
                    </a>
                </div>
                  <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModalAdd" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                            </div>
                        </div>
                        <img src="img/portfolio/add.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" ng-app="update_about" ng-controller="update_aboutCtrl" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row" ng-app="about" ng-controller="aboutCtrl">
                <div class="col-lg-12 col-lg-offset-2">
                    <div ng-repeat="x in names">
                        <div class="col-lg-4">
                            <textarea rows="10" cols="50" id="about{{x.id}}" class="form-control">{{ x.paragraph }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a class="btn btn-lg btn-outline" ng-click="update_about()">
                        <i class="fa fa-save"></i> Save
                    </a>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-upload"></i> Change Resume
                    </a>
                </div>
            </div>
        </div>
    </section>

     <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div ng-repeat="x in samples">
        <div  class="portfolio-modal modal fade" ng-app="update_sample" ng-controller="update_sampleCtrl"  id="portfolio{{x.id}}" tabindex="-1" style="padding-right:0;" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Enter/Edit Title</h2>
                                <br />
                                <input type="text" class="h2 form-control" id="title{{x.id}}" value="{{ x.Title }}" />
                                <hr class="star-primary">
                                <img src="{{ x.Image }}" id="img{{x.id}}" class="img-responsive img-centered" alt="">
                                <span class="btn btn-default btn-file fa fa-upload"> Upload Image
                                    <input type="file" id="file{{x.id}}" name="file" onchange="angular.element(this).scope().updateadd(this)" value="Upload New Image" />
                                </span>
                                <br /><br /><br />              
                                <textarea rows="8" id="desc{{x.id}}" cols="100" class="form-control">{{ x.Desc }}</textarea>
                                <ul class="list-inline item-details">
                                    <li>GitHub:
                                        <input type="text" class="a form-control" id="gitHub{{x.id}}" ng-attr-value="{{ x.GitHub}}"/>
                                    </li>
                                    <li>Live Preview:
                                        <input type="text" class="a form-control" id="live{{x.id}}" ng-attr-value="{{x.Live}}"/>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" id="{{x.id}}" ng-click="update_sample(this)"><i class="fa fa-save"></i> Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="button" class="btn btn-default" name="{{x.id}}" ng-click="delete(this)"><i class="fa fa-trash"></i> Delete This</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modals -->
    
    <div class="portfolio-modal modal fade" ng-app="create_sample" ng-controller="createCtrl" id="portfolioModalAdd" tabindex="-1" style="padding-right:0;" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Enter Title</h2>
                            <br />
                            <input type="text" id="txtCreateTitle" class="h2 form-control" />
                            <hr class="star-primary">
                            <img src="" id="imgTest" class="img-responsive img-centered" alt="">
                            <span class="btn btn-default btn-file fa fa-upload"> Upload Image
                                <input type="file" id="file" name="file" onchange="angular.element(this).scope().add()" value="Upload New Image" />
                            </span>
                            <br /><br /><br />              
                            <textarea rows="8" cols="100" id="txtCreateDesc" class="form-control"></textarea>
                            <ul class="list-inline item-details">
                                <li>GitHub:
                                    <input id="txtCreateGit" type="text" class="a form-control"/>
                                </li>
                                <li>Live Preview:
                                    <input type="text" id="txtCreateLive"  class="a form-control"/>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" ng-click="submit_sample()"><i class="fa fa-upload"></i> Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    
    <!-- ANGULAR JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script type="text/javascript">
        function htmlEscape(str) {
            return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');
            }
    </script>
    <script>
        
        var app = angular.module('getSamples', []);
        app.controller('sampleCtrl', function($scope, $http) {
            $http.get("php-scripts/get-samples.php")
            .then(function (response) {$scope.samples = response.data.records;});
            
            $scope.logout = function(){
                var request = $http({
                    method: "post",
                    url: "/simonchawla/php-scripts/logout.php",
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
                /* Check whether the HTTP Request is Successfull or not. */
                request.success(function (data) {
                    window.location.reload();
                });      
            }
        });
        
        var app2 = angular.module('about', []);
        app.controller('aboutCtrl', function($scope, $http) {
            $http.get("php-scripts/get-about.php")
            .then(function (response) {$scope.names = response.data.records;});
        });
        
        var app3 = angular.module('update_about', []);
        app.controller('update_aboutCtrl', function($scope, $http){
            $scope.update_about = function(){
                var request = $http({
                    method: "post",
                    url: "/simonchawla/php-scripts/update-about.php",
                    data: {
                        paragraph1: document.getElementById("about1").value,
                        paragraph2: document.getElementById("about2").value
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
                /* Check whether the HTTP Request is Successfull or not. */
                request.success(function (data) {
                    window.alert("About section updated!");
                });      
            }
        });
        
        var app4 = angular.module('create_sample', []);
        app.controller('createCtrl', function($scope, $http){
            var data;
            $scope.add = function(){
                var f = document.getElementById('file').files[0],
                  r = new FileReader();
              r.onloadend = function(e){
                data = e.target.result;
                document.getElementById("imgTest").src = data;
                
                //send you binary data via $http or $resource or do anything else with it
              }
              if(f !== undefined){
                r.readAsDataURL(f);    
              }
              
            }
            
            
            $scope.submit_sample = function(){
                console.log(data);
                if(data !== undefined){
                    var request = $http({
                        method: "post",
                        url: "/simonchawla/php-scripts/create-sample.php",
                        data: {
                            title: htmlEscape(document.getElementById("txtCreateTitle").value),
                            desc: htmlEscape(document.getElementById("txtCreateDesc").value),
                            gitHub: htmlEscape(document.getElementById("txtCreateGit").value),
                            live: htmlEscape(document.getElementById("txtCreateLive").value),
                            imgUrl: htmlEscape(data)
                        },
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    });
                    /* Check whether the HTTP Request is Successfull or not. */
                    request.success(function (data) {
                        if(data == ""){
                            window.alert("Sample submitted");
                            window.location.reload();
                        }else{
                            window.alert("ERROR!");
                        }
                    });
                }else{window.alert("Please upload an image.");}
            }
        });
        
        var app5 = angular.module('update_sample',[]);
        app.controller('update_sampleCtrl',function($scope,$http){
            var data;
            $scope.updateadd = function(file){
                var f = file.files[0],
                  r = new FileReader();
              r.onloadend = function(e){
                data = e.target.result;
                var imgName = "img" + file.id.replace("file","");
                document.getElementById(imgName).src = data;
                
                //send you binary data via $http or $resource or do anything else with it
              }
              if(f !== undefined){
                r.readAsDataURL(f);    
              }
              
            }
           $scope.update_sample = function(button){
                var x = button.$parent.x.id;
                var request = $http({
                    method: "post",
                    url: "/simonchawla/php-scripts/update-sample.php",
                    data: {
                        id: x,
                        title: document.getElementById("title"+x).value,
                        desc: document.getElementById("desc"+x).value,
                        gitHub: document.getElementById("gitHub"+x).value,
                        live: document.getElementById("live"+x).value,
                        imgURL: document.getElementById("img"+x).src
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
                /* Check whether the HTTP Request is Successfull or not. */
                request.success(function (data) {
                    window.alert("Sample Updated!")
                    console.log(data);
                });
           }
           $scope.delete = function(button){
               var x = button.$parent.x.id;
               var request = $http({
                    method: "post",
                    url: "/simonchawla/php-scripts/delete-sample.php",
                    data: {
                        id: x
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
                /* Check whether the HTTP Request is Successfull or not. */
                request.success(function (data) {
                    window.alert("Sample deleted");
                    window.location.reload();
                });      
            }
        });
        
        var app6 = angular.module('upload_image',[]);
        app.controller('image_uploader',function($scope,$http){
           $scope.upload_image = function($scope,$http){
               var request = $http({
                    method: "post",
                    url: "/simonchawla/php-scripts/update-sample.php",
                    data: {
                        
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
                /* Check whether the HTTP Request is Successfull or not. */
                request.success(function (data) {
                    window.alert("Sample Updated!");
                    console.log(data);
                });
           } 
        });
    </script>
    <script type="text/javascript">
        function test(){
            window.alert("it worked");
        }                             
    </script>
    
    </body
    </html>