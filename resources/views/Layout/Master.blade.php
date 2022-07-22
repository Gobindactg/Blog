<!DOCTYPE html>
<html class='ltr' dir='ltr' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>

<head>
   
    @include('Partial.meta')
    @include('Partial.customjs')
    @include('Partial.css')

    <!-- Global Variables -->
    <script type='text/javascript'>
        //<![CDATA[
        // Global variables with content. "Available for Edit"
        var monthFormat = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            noThumbnail = "https://4.bp.blogspot.com/-O3EpVMWcoKw/WxY6-6I4--I/AAAAAAAAB2s/KzC0FqUQtkMdw7VzT6oOR_8vbZO6EJc-ACK4BGAYYCw/w680/nth.png",
            postPerPage = 7,
            fixedSidebar = true,
            commentsSystem = "blogger",
            disqusShortname = "soratemplates";
        //]]>
    </script>
    <!-- Google Analytics -->
    <meta name='google-adsense-platform-account' content='ca-host-pub-1556223355139109' />
    <meta name='google-adsense-platform-domain' content='blogspot.com' />

</head>

<body class='index home'>
    <!-- Theme Options -->
    <div class='theme-options' style='display:none'>
        <div class='sora-panel section' id='sora-panel' name='Theme Options'>
            <div class='widget LinkList' data-version='2' id='LinkList70'>

                <style type='text/css'>
                    .index-post .post-snippet,
                    .index-post a.read-more {
                        display: none;
                    }
                </style>

            </div>
            <div class='widget LinkList' data-version='2' id='LinkList71'>

                <script type='text/javascript'>
                    //<![CDATA[


                    var disqusShortname = "soratemplates";


                    var commentsSystem = "blogger";


                    var fixedSidebar = true;


                    var postPerPage = 8;


                    var postPerPage = 5;


                    //]]>
                </script>

            </div>
        </div>
    </div>
    <!-- Outer Wrapper -->
    @include('Partial.header')
    <!-- Featured Slider -->
    <div id='intro-wrap'>
        <div class='section' id='main-intro' name='Main Intro'>
            @foreach($banner as $banners)

            <div class='widget Image' data-version='2' id='Image1'>
                <div class='widget-content'>
                    <style type='text/css'>
                        #intro-wrap {
                            display: block
                        }

                        #main-intro {
                            background-image: url("{{asset('BlogImage/'.$banners->image)}}")
                        }
                    </style>
                    <div class='intro-content'>
                        <h3 class='intro-title'>{{$banners->title}}</h3>
                        <p class='intro-snippet' style="color:white">{{$banners->description}}</p>
                        <div class='intro-action'>
                            <script type="text/javascript">
                                var ilc = "/#Read More",
                                    ima = ilc.split("#"),
                                    ili = ima[0].trim(),
                                    ilt = ima[1].trim(),
                                    kod = "<a href=" + ili + ">" + ilt + "</a>";
                                document.write(kod)
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class='clearfix'></div>
    <div class='row ad-wrapper'>
        <div class='home-ad-top section' id='home-ad-top1' name='Home Ads Top Home'>
            <div class='widget HTML' data-version='2' id='HTML21'>
                <div class='widget-title'>
                    <h3 class='title'>
                        Ad Code
                    </h3>
                </div>
                <div class='widget-content'>
                    <a class="sora-ads-full" href="javascript:;">Responsive Advertisement</a>
                </div>
            </div>
        </div>
    </div>
    <div class='clearfix'></div>
    <!-- Featured Wrapper -->
    <div class='row' id='hot-wrapper'>
        <div class='section' id='hot-section' name='Hot Posts'>
            <div class='widget PopularPosts' data-version='2' id='PopularPosts2'>
                <div class='widget-content'>
                    <ul class='hot-posts'>
                        @foreach($hero as $heros)
                        <li class='hot-item item-0'>
                            <div class='hot-item-inner'>
                                <a class='post-image-link' href='https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html'>
                                    <img alt='I like fishing because it is always the great way of relaxing' class='post-thumb' src="{{asset('HeroImage/'.$heros->image)}}" />
                                    <div class='post-info-wrap'>
                                        <div class='post-info'>
                                            <span class='post-tag'>Beauty</span>
                                            <h2 class='post-title'>
                                                <a href='#'>{{$heros->title}}</a>
                                            </h2>
                                            <div class='post-meta'>
                                                <span class='post-author'>Sora Blogging Tips</span><span class='post-date published' datetime='2016-03-18T01:04:00-07:00'>March 18, 2016</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='clearfix'></div>
    <div class='row ad-wrapper'>
        <div class='home-ad-top section' id='home-ad-top2' name='Home Ads Top'>
            <div class='widget HTML' data-version='2' id='HTML23'>
                <div class='widget-title'>
                    <h3 class='title'>
                        Ad Code
                    </h3>
                </div>
                <div class='widget-content'>
                    <a class="sora-ads-full" href="javascript:;">Responsive Advertisement</a>
                    <style>
                        .sora-ads-full {
                            display: block;
                            background-color: #eee;
                            text-align: center;
                            font-size: 13px;
                            color: #aaaaaa;
                            font-weight: 400;
                            font-style: italic;
                            line-height: 90px;
                            border: 1px solid #ccc;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <div class='clearfix'></div>
    <!-- Content Wrapper -->
    <div class='row' id='content-wrapper'>
        <div class='container'>
            <!-- Main Wrapper -->
            <div id='main-wrapper'>
                <div class='main section' id='main' name='Main Posts'>
                    <div class='widget Blog' data-version='2' id='Blog1'>
                        <div class='blog-posts hfeed container index-post-wrap'>
                            <div class='grid-posts'>
                                @foreach($blog as $blogs)
                                <div class='blog-post hentry index-post'>
                                    <div class='index-post-inside-wrap'>
                                        <div class='post-image-wrap'>
                                            <a class='post-image-link' href='https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html'>
                                                <img alt='I like fishing because it is always the great way of relaxing' class='post-thumb' src="{{asset('BlogImage/'.$blogs->image)}}" />
                                            </a>
                                        </div>
                                        <div class='post-info-wrap'>
                                            <div class='post-info'>
                                                <a class='post-tag' href='https://kate-soratemplates.blogspot.com/search/label/Beauty'>
                                                   {{$blogs->Category->name}}
                                                </a>
                                                <h2 class='post-title'>
                                                    <a href='https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html'>{{$blogs->title}}</a>
                                                </h2>
                                            </div>
                                            <div class='index-post-footer'>
                                                <div class='post-meta'>
                                                    <span class='post-author'><a href='https://www.blogger.com/profile/10687789128527805451' target='_blank' title='Sora Blogging Tips'>Created By User</a></span>
                                                    <span class='post-date published' datetime='2016-03-18T01:04:00-07:00'>{{$blogs->created_at}}</span>
                                                </div>
                                                <p class='post-snippet'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,&#8230;</p>
                                                <a class='read-more' href='https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html'>Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class=" pagination text-black ">
                                {!! $blog->render() !!}
                                </div>
                            </div>
                        </div>
                        <div class='blog-pager container' id='blog-pager'>
                            <a class='blog-pager-older-link' href='https://kate-soratemplates.blogspot.com/search?updated-max=2016-03-17T00:42:00-07:00&amp;max-results=8' id='Blog1_blog-pager-older-link' title='Older Posts'>
                                Load more posts
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Wrapper -->
            <div id='sidebar-wrapper'>
                <div class='sidebar section' id='social-widget' name='Social Widget'>
                    <div class='widget LinkList' data-version='2' id='LinkList75'>
                        <div class='widget-title'>
                            <h3 class='title'>
                                Social Plugin
                            </h3>
                        </div>
                        <div class='widget-content'>
                            <ul class='social-counter social social-color'>
                                <li class='facebook'><a href='https://www.facebook.com/soratemplates/' target='_blank' title='facebook'></a></li>
                                <li class='twitter'><a href='https://twitter.com/LiveBlogger1' target='_blank' title='twitter'></a></li>
                                <li class='linkedin'><a href='#' target='_blank' title='linkedin'></a></li>
                                <li class='reddit'><a href='#' target='_blank' title='reddit'></a></li>
                                <li class='pinterest'><a href='#' target='_blank' title='pinterest'></a></li>
                                <li class='vk'><a href='#' target='_blank' title='vk'></a></li>
                                <li class='instagram'><a href='https://www.instagram.com/livebloggerofficial/' target='_blank' title='instagram'></a></li>
                                <li class='youtube'><a href='https://www.youtube.com/liveblogger' target='_blank' title='youtube'></a></li>
                                <li class='whatsapp'><a href='#' target='_blank' title='whatsapp'></a></li>
                                <li class='skype'><a href='#' target='_blank' title='skype'></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='sidebar common-widget section' id='sidebar1' name='Sidebar Right'>
                    <div class='widget PopularPosts' data-version='2' id='PopularPosts1'>
                        <div class='widget-title'>
                            <h3 class='title'>
                                Popular Posts
                            </h3>
                        </div>
                        <div class='widget-content'>
                            @foreach($blogRecent as $blogR)
                            <div class='post'>
                                <div class='post-content'>
                                    <a class='post-image-link' href='https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html'>
                                        <img alt='I like fishing because it is always the great way of relaxing' class='post-thumb' src="{{asset('BlogImage/'.$blogR->image)}}"/>
                                    </a>
                                    <div class='post-info'>
                                        <h2 class='post-title'>
                                            <a href='https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html'>{{$blogR->title}}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                      
                        </div>
                    </div>
                    <div class='widget HTML' data-version='2' id='HTML1'>
                        <div class='widget-title'>
                            <h3 class='title'>
                                Subscribe Us
                            </h3>
                        </div>
                        <div class='widget-content'>
                            <div class="videoWrapper">
                                <!-- Copy & Pasted from YouTube -->
                                <iframe width="560" height="349" src="https://www.youtube.com/embed/gmhw5XzNOuo" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <style>
                                .videoWrapper {
                                    position: relative;
                                    padding-bottom: 56.25%;
                                    /* 16:9 */
                                    padding-top: 25px;
                                    height: 0;
                                }

                                .videoWrapper iframe {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                }
                            </style>
                        </div>
                    </div>
                    <div class='widget HTML' data-version='2' id='HTML6'>
                        <div class='widget-title'>
                            <h3 class='title'>
                                Facebook
                            </h3>
                        </div>
                        <div class='widget-content'>
                            <center>
                                <div class="fb-page" data-href="https://www.facebook.com/soratemplates" data-width="360" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                            </center>
                        </div>
                    </div>
                    <div class='widget Label' data-version='2' id='Label3'>
                        <div class='widget-title'>
                            <h3 class='title'>
                                Categories
                            </h3>
                        </div>
                        <div class='widget-content list-label'>
                            <ul>
                                @foreach($category as $cat)
                                <li>
                                    <a class='label-name' href='#'>
                                        {{$cat->name}}
                                        <span class='label-count'>(5)</span>
                                    </a>
                                </li>
                                @endforeach
                        
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='clearfix'></div>
    <!-- Footer Wrapper -->
    <div id='footer-wrapper'>
        <div class='primary-footer'>
            <div class='container row'>
                <div class='footer-about-area section' id='footer-about-area' name='About & Logo Section'>
                    <div class='widget Image' data-version='2' id='Image150'>
                        <a class='footer-logo custom-image' href='https://kate-soratemplates.blogspot.com/'>
                            <img alt='Kate' id='Image150_img' src='https://1.bp.blogspot.com/-Uxhr0NikJE0/YMRJaNXkGhI/AAAAAAAAK4U/qh_b62dLFt8xe3ksyI_nMLn_Fn0E-5GCACNcBGAsYHQ/Kate-logo-White.png' />
                        </a>
                        <p class='image-caption excerpt'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                    </div>
                </div>
                <!-- Footer Social -->
                <div class='foot-bar-social social social-color section' id='foot-bar-social' name='Social Footer'>
                    <div class='widget LinkList' data-version='2' id='LinkList78'>
                        <div class='widget-content'>
                            <ul>
                                <li class='facebook'><a href='https://www.facebook.com/soratemplates/' target='_blank' title='facebook'></a></li>
                                <li class='twitter'><a href='https://twitter.com/LiveBlogger1' target='_blank' title='twitter'></a></li>
                                <li class='skype'><a href='#' target='_blank' title='skype'></a></li>
                                <li class='instagram'><a href='https://www.instagram.com/livebloggerofficial/' target='_blank' title='instagram'></a></li>
                                <li class='youtube'><a href='https://www.youtube.com/liveblogger' target='_blank' title='youtube'></a></li>
                                <li class='linkedin'><a href='#' target='_blank' title='linkedin'></a></li>
                                <li class='pinterest'><a href='#' target='_blank' title='pinterest'></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='clearfix'></div>
        <div class='container row'>
            <div class='menu-footer section' id='menu-footer' name='Footer Menu'>
                <div class='widget LinkList' data-version='2' id='LinkList76'>
                    <div class='widget-title'>
                        <h3 class='title'>
                            Footer Menu Widget
                        </h3>
                    </div>
                    <div class='widget-content'>
                        <ul>
                            <li><a href='/'>Home</a></li>
                            <li><a href='https://kate-soratemplates.blogspot.com/p/about.html'>About</a></li>
                            <li><a href='https://kate-soratemplates.blogspot.com/p/contact-us.html'>Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class='copyright-area'>Created By <a href='http://soratemplates.com/' id='mycontent' rel='dofollow' title='Themes'>SoraTemplates</a>
            </div>
        </div>
    </div>
    </div>

    @include('Partial.js')
    <!-- Overlay and Back To Top -->
    <div class='back-top' title='Back to Top'></div>

    <div class='demo-float'>
        <span class='df-hide'><i class='fa fa-times'></i></span>
        <div class='df-logo'></div>
        <h3>SoraTemplates</h3>
        <p class='excerpt'>Best Free and Premium Blogger Templates Provider.</p>
        <a href='https://gooyaabitemplates.com/kate-blogger-template/' title='Kate Blogger Template'>Buy This Template</a>
    </div>
</body>

</html>