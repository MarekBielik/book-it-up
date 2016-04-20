<!DOCTYPE html>
<html lang="en">

<head>
    <title>DIT Library System- The DIT Library for Everyone.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #FFC300;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px;
            width:100%;
        }

        .right {
            position: absolute;
            top: 0cm;
            right: 0px;
            width: 300px;
            padding-right: 2%;
        }

        .logo {
            padding-top:2%;
            padding-bottom:4px;
        }

        .ditlogo4{
            position:absolute;
            right:0px;
            width: 30%;
            top: 80%;
        }

        .dit2 {
            position:absolute;
            right:0px;
            width: 40%;
            top: 30%;

        }

        .union {
            position:absolute;
            right:0px;
            width: 20%;
            top: 3%;

        }

        .net {
            position:absolute;
            right:0px;
            width: 20%;
            top: 40%;

        }


        .welcome{
            text-align:center;
            padding-top:1px;
            padding-bottom: 5px;
            background-color:#0061b1;
        }

        .group{
            position:absolute;
            right:270px;
            width: 50%;
            top: 0cm;

        }

        .goldLine{
            height:4px;
            width:100%;
            background-color:#d3b245;
        }

        .searchpart{
            position:absolute;
            margin: auto;
            right:12cm;
            width: 60%;
            top:13.5cm;
        }

        .midSection{
            background-color:#f0f2f1;
            height:1050px;
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #006AA6;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            position:absolute;
            width:100%;
            background-color:#3d4143;
            top: 38cm;

        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}

            body {
                font-family: 'Lato';
                color:white;
            }

            .fa-btn {
                margin-right: 6px;
            }
        }
    </style>
</head>
<body id="app-layout">
    <!-- Top Section -->
    <div style="background-color:#0095da">
        <div>
            <div class="group">
                <div class="container-fluid">
                        <ul class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav">
                                @if (!Auth::guest())
                                    <li><a href="{{ url('/customer/books') }}"><font color="white">My books</font></a></li>
                                    @permission('librarianPermission')
                                    <li><a href="{{ url('/librarian/search_user') }}"><font color="white">Users</font></a></li>
                                    @endpermission
                                    @permission('adminPermission')
                                    <li><a href="{{ url('/admin/generate_report') }}"><font color="white">Generate Report</font></a></li>
                                    @endpermission
                                @endif
                            </ul>
                        </ul>
                </div>
            </div>
            <div class="container-fluid text-center">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                </div>
                    <!-- Right Side Of Navbar -->


            <div class="right">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><font color="white">Login</font></a></li>
                        <li><a href="{{ url('/register') }}"><font color="white">Register</font></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
            <font color=White>Home</font>
        </a></li>
        <div style="padding-bottom:15px;">
            <div align="center">
                <div class="logo">
                    <img src="{{URL::asset('/image/DITlogo2.png')}}" alt="profile Pic" height="300" width="300">
                </div>
            </div>
        </div>

        <div class="goldLine"></div>

        <div id="DIT Text" class="welcome">
            <h3><font color="#FFFFFF">DIT Library System</font></h3>
        </div>

        <div class="goldLine"></div>
    </div>

    <div class="midSection">




        <div class="container">
            @include('flash::message')
        </div>
        
        <div class="searchpart">
            @yield('content')
        </div>
    </div>

    <div class="goldLine"></div>

    <footer>
        <div class="ditlogo4">
            <a href="http://www.dit.ie/study/"><img src="{{URL::asset('/image/logo4.png')}}" alt="profile Pic" height="76" width="240"></a>
        </div>
        <div class="dit2">
            <a href="http://www.dit.ie/computing/"><img src="{{URL::asset('/image/dit2.png')}}" alt="profile Pic" height="250" width="250"></a>
        </div>

        <div class="union">
            <a href="http://www.ditsu.ie/"><img src="{{URL::asset('/image/union.png')}}" alt="profile Pic" height="150" width="150"></a>
        </div>
        <div class="net">
            <a href="https://www.facebook.com/NetSocDIT/"><img src="{{URL::asset('/image/net.png')}}" alt="profile Pic" height="150" width="250"></a>
        </div>
    <div class="container">
            <div class="row" style="background-color:#3d4143">

            </div>

                <div class="col-md-10 col-md-offset-0" style="padding-top:5px;padding-bottom:10px">
                    <!-- New Info Links section added within #footer -->
                    <div align="centre" style="float:left">
                        <h3><font color="#FFFFFF">INFORMATION FOR</font></h3>
                        <ul>
                            <li><a href="http://www.dit.ie/study/"><font color="white">Prospective Students</a></li>
                            <li><a href="http://www.dit.ie/study/internationaloffice/"><font color="white">International Students</font></a></li>
                            <li><a href="http://www.dit.ie/fyi/"><font color="white">Incoming Students</font></a></li>
                            <li><a href="http://www.dit.ie/currentstudents/"><font color="white">Current Students</font></a></li>
                            <li><a href="http://www.dit.ie/forstaff/"><font color="white">Staff</font></a></li>
                            <li><a href="http://www.dit.ie/graduatenetwork/"><font color="white">Alumni</font></a></li>
                            <li><a href="http://www.dit.ie/hothouse/"><font color="white">Business &amp; Entrepreneurs</font></a></li>
                            <li><a href="http://www.dit.ie/ditfoundation/"><font color="white">Donors</font></a></li>
                            <li><a href="http://www.dit.ie/about/organisation/instituteoffices/publicaffairsoffice/media/"><font color="white">Media</font></a></li>
                        </ul>
                    </div>

                    <div align="centre" style="float:left;padding-left:30px">
                        <h3><font color="#FFFFFF">INFORMATION ABOUT</font></h3>
                        <ul>
                            <li><a href="http://www.dit.ie/about/"><font color="white">The Institute</font></a></li>
                            <li><a href="http://www.dit.ie/study/"><font color="white">Programmes &amp; Courses</font></a></li>
                            <li><a href="http://www.dit.ie/researchandenterprise/graduateresearchschool/phdopportunities/"><font color="white">PhD Opportunities</font></a></li>
                            <li><a href="http://dit.ie/about/campusfacilities/"><font color="white">Campus &amp; Facilities</font></a></li>
                            <li><a href="http://www.dit.ie/researchandenterprise/"><font color="white">Research at DIT</font></a></li>
                            <li><a href="http://www.dit.ie/ditfoundation/"><font color="white">DIT Foundation</font></a></li>
                            <li><a href="http://dit.ie/hr/resourcing/resourcingandrecruitment/vacancies/"><font color="white">Job Opportunities</font></a></li>
                            <li><a href="http://dit.ie/oifignagaeilge/"><font color="white">Oifig na Gaeilge</font></a></li>
                            <li><a href="http://www.dit.ie/ace/"><font color="white">Access &amp; Civic Engagement</font></a></li>
                        </ul>
                    </div>

                    <div align="centre" style="float:left;padding-left:30px">
                        <ul>
                                <li><a href="https://www.facebook.com/dublininstituteoftechnology" target="_blank"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/facebook.gif" alt="facebook.jpg" style="width : 32px; height : 32px;     " /></a></li>
                                <li><a href="https://twitter.com/ditofficial/" target="_blank"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/twitter.gif" alt="twitter.jpg" style="width : 32px; height : 32px;     " /></a></li>
                                <li><a href="http://www.linkedin.com/company/dublin-institute-of-technology" target="_blank"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/linkedin.gif" alt="linkedin.jpg" style="width : 32px; height : 32px;     " /></a></li>
                                <li><a href="https://www.youtube.com/user/DITPublicAffairs/"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/youtube.gif" alt="youtube.jpg" style="width : 32px; height : 32px;     " /></a></li>


                                <p class="membership">Member of the European University Association</p>
                                <p><!-- navigation object : Last Updated -->Last date modified: April 2015 | <!-- navigation object : Copyright and date --><!--Plain code template-->
                                    Copyright &copy; 1998 - 2015 Dublin Institute of Technology
                                    <!--Plain code template-->
                                </p>
                                <br />
                                <!--Compulsory logos -->
                                <p align="center">
                                    <a href="http://www.dit.ie/campuslife/studentsupport/studentfinancialsupport/"  title="Student Assistance Fund Financial Support"><img src="http://www.dit.ie/media/images/Irelandeufundslogoenglishcolour.jpg" border="0px" alt="National Development Plan logo"  height="60px" /></a>&nbsp;
                                    <a href="http://www.dit.ie/campuslife/studentsupport/studentfinancialsupport/"  title="Student Assistance Fund Financial Support"><img src="http://www.dit.ie/media/images/eusocialfund.jpg" alt="eu social fund logo"  height="60px"  /></a>
                                </p>
                                <p align="center"><em>Investing in your future - Ag infheistiú I do dhán<br />Member of the European University Association</em></p>

                        </ul>
                    </div>
              </div>
          </div>
    </div>
    </footer>
</body>
</html>