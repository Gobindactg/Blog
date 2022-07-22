<div id='outer-wrapper'>
        <!-- Header Wrapper -->
        <div id='header-wrap'>
            <div class='mobile-menu-wrap'>
                <div class='mobile-menu'></div>
            </div>
            <div class='container row'>
                <div class='header-logo'>
                    <div class='main-logo section' id='main-logo' name='Header Logo'>
                        <div class='widget Header' data-version='2' id='Header1'>
                            @foreach ($logo as $log)
                            <div class='header-widget' >
                                <a class='header-image-wrapper' href='https://kate-soratemplates.blogspot.com/'>
                                    <img alt='Kate' data-height='50' data-width='176' src="{{asset('LogoImage/'.$log->image)}}" style="border-radius: 50%; background-color:white"/>
                                </a>
                                <p>
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class='header-menu'>
                    <div class='main-menu section' id='main-menu' name='Main Menu'>
                        <div class='widget LinkList' data-version='2' id='LinkList74'>
                            <ul id='main-menu-nav' role='menubar'>
                                <li><a href='/' role='menuitem'>Home</a></li>
                                <li><a href='#' role='menuitem'>Features</a></li>
                                <li><a href='#' role='menuitem'>_Multi DropDown</a></li>
                                <li><a href='#' role='menuitem'>__DropDown 1</a></li>
                                <li><a href='#' role='menuitem'>__DropDown 2</a></li>
                                <li><a href='#' role='menuitem'>__DropDown 3</a></li>
                                <li><a href='https://kate-soratemplates.blogspot.com/p/post-format-and-page-markup.html' role='menuitem'>_ShortCodes</a></li>
                                <li><a href='https://www.sorabloggingtips.com/2017/01/how-to-add-sitemap-widget-in-blogspot-blogs.html' role='menuitem'>_SiteMap</a></li>
                                <li><a href='https://kate-soratemplates.blogspot.com/soratemplates' role='menuitem'>_Error Page</a></li>
                                <li><a href='#' role='menuitem'>Documentation</a></li>
                                <li><a href='https://www.sorabloggingtips.com/2021/06/how-to-setup-kate-blogger-template.html' role='menuitem'>_Web Documentation</a></li>
                                <li><a href='https://youtu.be/zY-AWccU-ww' role='menuitem'>_Video Documentation</a></li>
                                <li><a href='https://www.soratemplates.com/2021/07/kate-blogger-templates.html' role='menuitem'>Download This Template</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id='nav-search'>
                    <form action='https://kate-soratemplates.blogspot.com/search' class='search-form' role='search'>
                        <input autocomplete='off' class='search-input' name='q' placeholder='Search this blog' type='search' value='' />
                        <span class='hide-search'></span>
                    </form>
                </div>
                <span class='show-search'></span>
                <span class='mobile-menu-toggle'></span>
            </div>
        </div>
        <div class='clearfix'></div>