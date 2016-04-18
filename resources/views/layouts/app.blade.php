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

        .logo2 {
            position:absolute;
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

        .welcome{
            text-align:center;
            padding-top:1px;
            padding-bottom: 5px;
            background-color:#0061b1;
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
            height:400px;
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
            <div class="container-fluid">
                    <ul class="nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav">
                            @if (!Auth::guest())
                                <li><a href="{{ url('/customer/books') }}">My books</a></li>
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

            <div class="container-fluid text-center">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                </div>
                    <!-- Right Side Of Navbar -->
            </div>

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
        <div align="center">
            <p style="padding-top:90px">
                <font size=5>Your Adventure. Starts Here.</font>
            </p>
        </div>

         <div align="center">
            <p style="padding-top:2px">
                <font size=3 color=#aeaeae>It's your life. You decide.</font>
            </p>
        </div>

        <div class="container">
            @include('flash::message')
        </div>
        
        <div class="searchpart">
            @yield('content')
        </div>
    </div>

    <div class="goldLine"></div>

    <footer>
    <div class="container">
            <div class="row" style="background-color:#3d4143">
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
              </div>
          </div>
    </div>
    </footer>
</body>
</html>