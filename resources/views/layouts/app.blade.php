<!DOCTYPE html>
<html lang="en">

<head>
    <title>DIT Library System- The DIT Library for Everyone.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
        .row.content {height: 450px}

        .right {
            position: absolute;
            top: 0cm;
            right: 0px;
            width: 300px;
            padding: 10px;
        }

        .logo {
            position:absolute;
            margin: auto;
            right:5cm;
            width: 60%;
            top:2cm;

        }

        .logo2 {
            postion:absolute;
            top: 0cm;
            right: 0px;
            width: 300px;
            top: 0cm;

        }
        .logopart2 {
            position:absolute;
            right:-70px;
            width: 20%;
            top: 0cm;

        }

        .group{
            position:absolute;
            right:600px;
            width: 20%;
            top: 0cm;

        }
        .dit2 {
            position:absolute;
            left:0px;
            margin: auto;
            width: 60%;
            top: 7cm;

        }
        .dit3 {
            position:absolute;
            right:0px;
            width: 20%;
            top: 2cm;

        }
        .union {
             position:absolute;
             right:0px;
             width: 20%;
             top: 40%;

         }

        .net {
            position:absolute;
            left:-30px;
            width: 20%;
            top: 68%;

        }
        .ditlogo4{
            position:absolute;
            left:0px;
            margin: auto;
            width: 60%;
            top: 5cm;
        }

        .searchpart{
            position:absolute;
            margin: auto;
            right:12cm;
            width: 60%;
            top:13.5cm;

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
            bottom:0;
            width:40%;
            height:60px;   /* Height of the footer */

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
            }

            .fa-btn {
                margin-right: 6px;
            }
        }
    </style>
</head>
<body id="app-layout">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <font color=#006AA6>The DIT Library System</font>
            </a></li>
            <div class="logo2">
                <img src="{{URL::asset('/image/ditlogo.png')}}" alt="profile Pic" height="50" width="50">
            </div>
            <div class="logopart2">
                <img src="{{URL::asset('/image/ditlogo.png')}}" alt="profile Pic" height="50" width="50">
            </div>
        </div>
        <div class="group">
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav">
                    @if (!Auth::guest())
                        <li><a href="{{ url('/customer/books') }}"><font color=#006AA6>My books</font></a></li>
                        @permission('librarianPermission')
                        <li><a href="{{ url('/librarian/search_user') }}">Users</a></li>
                        @endpermission
                        @permission('adminPermission')
                        <li><a href="{{ url('/admin/generate_report') }}">Generate Report</a></li>
                        @endpermission
                    @endif
                </ul>
            </ul>
           </div>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->

    </div>
        <!-- Right Side Of Navbar -->

    </div>
    <div class="right">
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
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
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="https://www.facebook.com/dublininstituteoftechnology"><font color="white">Facebook</font></a></p>
            <p><a href="http://www.linkedin.com/company/dublin-institute-of-technology"><font color="white">Linkedin</font></a></p>
            <p><a href="https://www.youtube.com/user/DITPublicAffairs/"><font color="white">YouTube</font></a></p>
            <p><a href="https://twitter.com/ditofficial/"><font color="white">Twitter</font></a></p>
        </div>
        <div class="ditlogo4">
            <img src="{{URL::asset('/image/logo4.png')}}" alt="profile Pic" height="76" width="240">
        </div>
        <div class="dit2">
            <img src="{{URL::asset('/image/dit2.png')}}" alt="profile Pic" height="250" width="250">
        </div>
        <div class="dit3">
             <img src="{{URL::asset('/image/dit3.png')}}" alt="profile Pic" height="250" width="250">
        </div>
        <div class="union">
            <img src="{{URL::asset('/image/union.png')}}" alt="profile Pic" height="200" width="200">
        </div>
        <div class="net">
            <img src="{{URL::asset('/image/net.png')}}" alt="profile Pic" height="150" width="350">
        </div>
        <div class="col-sm-8 text-left">
            <div align="center">
                <div class="logo">
                    <img src="{{URL::asset('/image/DITlogo2.png')}}" alt="profile Pic" height="400" width="400">
                </div>
            <h1><font color="#006AA6"> Welcome to DIT Library System</font></h1>
                <div class="container">
                @include('flash::message')
            </div>
            <div class="searchpart">
            @yield('content')
            </div>
        </div>
            <br>
            <br>
            <br>

    </div>
</div>
<br>
<br>

<footer class="text-left>
    <div id="footer">
    <br>
    <br>
        <!-- New Info Links section added within #footer -->
            <div align="centre">
                <h4>INFORMATION FOR</h4>
                <ul>
                    <li><a href="http://www.dit.ie/study/">Prospective Students</a></li>
                    <li><a href="http://www.dit.ie/study/internationaloffice/">International Students</a></li>
                    <li><a href="http://www.dit.ie/fyi/">Incoming Students</a></li>
                    <li><a href="http://www.dit.ie/currentstudents/">Current Students</a></li>
                    <li><a href="http://www.dit.ie/forstaff/">Staff</a></li>
                    <li><a href="http://www.dit.ie/graduatenetwork/">Alumni</a></li>
                    <li><a href="http://www.dit.ie/hothouse/">Business &amp; Entrepreneurs</a></li>
                    <li><a href="http://www.dit.ie/ditfoundation/">Donors</a></li>
                    <li><a href="http://www.dit.ie/about/organisation/instituteoffices/publicaffairsoffice/media/">Media</a></li>
                </ul>

            </div>
            <div align="centre">
                <h4>INFORMATION ABOUT</h4>
                <ul>
                    <li><a href="http://www.dit.ie/about/">The Institute</a></li>
                    <li><a href="http://www.dit.ie/study/">Programmes &amp; Courses</a></li>
                    <li><a href="http://www.dit.ie/researchandenterprise/graduateresearchschool/phdopportunities/">PhD Opportunities</a></li>
                    <li><a href="http://dit.ie/about/campusfacilities/">Campus &amp; Facilities</a></li>
                    <li><a href="http://www.dit.ie/researchandenterprise/">Research at DIT</a></li>
                    <li><a href="http://www.dit.ie/ditfoundation/">DIT Foundation</a></li>
                    <li><a href="http://dit.ie/hr/resourcing/resourcingandrecruitment/vacancies/">Job Opportunities</a></li>
                    <li><a href="http://dit.ie/oifignagaeilge/">Oifig na Gaeilge</a></li>
                    <li><a href="http://www.dit.ie/ace/">Access &amp; Civic Engagement</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>A–Z INDEX</h4>
                <ul>
                    <li><a href="http://www.dit.ie/study/undergraduate/programmes/">A–Z Programmes &amp; Courses</a></li>
                    <li><a href="http://www.dit.ie/dita-z/studentsa-z/">A–Z for Students</a></li>
                    <li><a href="http://www.dit.ie/dita-z/staffa-z/">A–Z for Staff</a></li>
                </ul>
            </div>
        </div>

        <div id="connect">
            <h4>Connect with DIT</h4>
            <ul class="inline">
                <li><a href="https://www.facebook.com/dublininstituteoftechnology" target="_blank"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/facebook.gif" alt="facebook.jpg" style="width : 32px; height : 32px;     " /></a></li>
                <li><a href="https://twitter.com/ditofficial/" target="_blank"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/twitter.gif" alt="twitter.jpg" style="width : 32px; height : 32px;     " /></a></li>
                <li><a href="http://www.linkedin.com/company/dublin-institute-of-technology" target="_blank"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/linkedin.gif" alt="linkedin.jpg" style="width : 32px; height : 32px;     " /></a></li>
                <li><a href="https://www.youtube.com/user/DITPublicAffairs/"><img src="http://www.dit.ie/media/aboutdit/images/grangegorman/youtube.gif" alt="youtube.jpg" style="width : 32px; height : 32px;     " /></a></li>

            </ul>
        </div><!--connect-->

        <div id="sitelinks">
            <p><a href="http://www.dit.ie">Home</a> | <a href="/tools/contacts/">Contact</a> | <a href="/tools/map/">Sitemap</a> | <a href="/dita-z/">A-Z</a> | <a href="/tools/help/">Help</a> | <a href="/tools/disclaimer/privacy/">Cookie &amp; Privacy Statement</a></p>
        </div>

        <div id="siteinfo">
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
        </div>

    </footer>

</body>
</html>
