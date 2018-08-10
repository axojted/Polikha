@if(Route::is('index'))
<nav class="navbar navbar-expand-md navbar-light p-0 px-5 fixed-top">
    <a class="navbar-brand ml-auto invisible" href="/">Polikha</a>
@elseif(Route::is('profile'))
<nav class="navbar navbar-expand-md navbar-light bg-dark p-0 px-5 fixed-top">
        <a class="navbar-brand ml-auto " href="/">Polikha</a>
@else
<nav class="navbar navbar-expand-md navbar-light bg-light p-0 px-5 fixed-top">
        <a class="navbar-brand ml-auto " href="/">Polikha</a>
@endif
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-auto" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <form action="">
                <input type="text" name="search-input" id="search-input">
            </form>
            @if(auth()->check())
            <a href="/profile" class="nav-item nav-link avatar-holder">
                <img src="/storage/avatar/{{auth()->user()->avatar}}" alt="" title="{{auth()->user()->first}} {{auth()->user()->last}}" id="profile-avatar" style="width: 30px; height: 30px;border-radius: 50%;">
            </a>
            @endif
            <li class="nav-item dropdown">
                @if(Route::is('profile'))
                <a class="nav-link dropdown-toggle text-light dropDownCustom" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Browse</a>
                @else
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Browse</a>
                @endif
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/discover-articles">Discover Articles</a>
                    <a class="dropdown-item" href="/discover-photos">Discover Photos</a>
                    <a class="dropdown-item" href="/popular-articles">Popular Articles</a>
                    <a class="dropdown-item" href="/popular-photos">Popular Photos</a>
                    <a class="dropdown-item" href="/leaderboard">Leaderboard</a>
                </div>
            </li>
            <li class="nav-item active">
                @if(auth()->check())
                <a href="/contribute" class="nav-link btn btn-dark text-light p-1">Contribute</a>
                @else
                <a href="/signup" class="nav-link btn btn-dark text-light p-1">Contribute</a>
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle custom-dropdown" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Route::is('profile'))
                    <i class="fa fa-bars text-light"></i>
                    @else
                    <i class="fa fa-bars"></i>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                    @if(!auth()->check())
                    <a class="dropdown-item" href="/login">Login</a>
                    <a class="dropdown-item" href="/signup">Sign Up</a>
                    @else
                    <a class="dropdown-item" href="/logout">Logout</a>
                    @endif
                    <a class="dropdown-item" href="/faq">FAQ</a>
                    <a class="dropdown-item" href="/about">About</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item social-media fa fa-facebook-square m-0 ml-auto" href="https://www.facebook.com/Polikha" data-track-label="facebook"></a>
                    <a class="dropdown-item social-media fa fa-instagram m-0"  href="https://www.instagram.com/Polikha" data-track-label="instagram"></a>
                    <a class="dropdown-item social-media fa fa-twitter m-0"  href="https://www.twitter.com/Polikha" data-track-label="twitter"></a>
                    <a class="dropdown-item social-media fa fa-pinterest m-0 mr-auto"  href="https://www.pinterest.com/Polikha" data-track-label="pinterest"></a>
                </div>
            </li>
        </ul>
    </div>
</nav>