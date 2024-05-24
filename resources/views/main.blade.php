@extends('layouts.layoutsMain')

@section('title', 'Tecmunity')

@section('content')
<div class="navbar">
    <div class="navbar_menuicon" id="navicon">
        <i class="fa fa-navicon"></i>
    </div>
    <div class="navbar_logo">
        <img src="{{ asset('img/logotec.png') }}" alt="" />
    </div>
    <div class="navbar_search">
        <form method="" action="/">
            <input type="text" placeholder="Search people.." />
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="navbar_icons">
        <ul>
            <li id="friendsmodal"><i class="fa fa-user-o"></i><span id="notification">7</span></li>
            <li id="messagesmodal"><i class="fa fa-comments-o"></i><span id="notification">2</span></li>
            <a href="" style="color:white"><li><i class="fa fa-globe"></i></li></a>
        </ul>
    </div>
    <div class="navbar_user" id="profilemodal" style="cursor:pointer">
        <img src="{{ asset('img/´polo.jpg') }}" alt="" />
        <span id="navbar_user_top">{{ auth()->user()->username}}<br><p>User</p></span><i class="fa fa-angle-down"></i>
    </div>
</div>

<div class="all">

    <div class="rowfixed"></div>
    <div class="left_row">
        <div class="left_row_profile">
            <img id="portada" src="images/bl.jpg" />
            <div class="left_row_profile">
                <img id="profile_pic" src="{{ asset('img/´polo.jpg') }}" />
                <span>{{ auth()->user()->username }}<br><p>150k followers / 50 follow</p></span>
            </div>
        </div>
        <div class="rowmenu">
            <ul>
                <li><a href="index.html"><i class="fa fa-globe"></i>Newsfeed</a></li>
                <li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="friends.html" id="rowmenu-selected"><i class="fa fa-users"></i>Friends</a></li>
                <li class="primarymenu"><i class="fa fa-compass"></i>Explore</li>
                <ul>
                    <li style="border:none"><a href="#">Activity</a></li>
                    <li style="border:none"><a href="#">Friends</a></li>
                    <li style="border:none"><a href="#">Groups</a></li>
                    <li style="border:none"><a href="#">Pages</a></li>
                    <li style="border:none"><a href="#">Saves</a></li>
                </ul>
                <li class="primarymenu"><i class="fa fa-user"></i>Rapid Access</li>
                <ul>
                    <li style="border:none"><a href="#">Your-Page.html</a></li>
                    <li style="border:none"><a href="#">Your-Group.html</a></li>
                </ul>
            </ul>
        </div>
    </div>

    

    </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

<!-- NavMobile -->
<div class="mobilemenu">
    
    <div class="mobilemenu_profile">
        <img id="mobilemenu_portada" src="{{ asset('img/bl.jpg') }}" />
        <div class="mobilemenu_profile">
            <img id="mobilemenu_profile_pic" src="{{ asset('img/´polo.jpg') }}" /><br>
            <span>{{ auth()->user()->username }}<br><p>150k followers / 50 follow</p></span>
        </div>
        <div class="mobilemenu_menu">
            <ul>
                <li><a href="index.html"><i class="fa fa-globe"></i>Newsfeed</a></li>
                <li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="friends.html"><i class="fa fa-users"></i>Friends</a></li>
                <li><a href="messages.html"><i class="fa fa-comments-o"></i>messages</a></li>
                <li class="primarymenu"><i class="fa fa-compass"></i>Explore</li>
                <ul class="mobilemenu_child">
                    <li style="border:none"><a href="#"><i class="fa fa-globe"></i>Activity</a></li>
                    <li style="border:none"><a href="#"><i class="fa fa-file"></i>Friends</a></li>
                    <li style="border:none"><a href="#"><i class="fa fa-file"></i>Groups</a></li>
                    <li style="border:none"><a href="#"><i class="fa fa-file"></i>Pages</a></li>
                    <li style="border:none"><a href="#"><i class="fa fa-file"></i>Saves</a></li>
                </ul>
                <li class="primarymenu"><i class="fa fa-user"></i>Rapid Access</li>
                <ul class="mobilemenu_child">
                    <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Page.html</a></li>
                    <li style="border:none"><a href="#"><i class="fa fa-star-o"></i>Your-Group.html</a></li>
                </ul>
            </ul>
                <hr>
            <ul>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">FAQ's</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="login.html">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection