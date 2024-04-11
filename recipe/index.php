<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $result = [];

    include_once ("../connection.php");
    $posts = "SELECT * FROM recipemethod  WHERE id =$id";
    $result_posts = $db->query($posts);
    if ($result_posts->num_rows > 0) {
        $row = $result_posts->fetch_assoc();
        $chefname = $row['chefname'];
        $category = $row['category'];
        $title = $row['Recipename'];
        $ingredients = $row['Ingredients'];
        $Directions = $row['Directions'];
        $image = $row['image'];
        $date = date("F j, Y", strtotime($row['created']));
    } else {
        header('location: ../404.html');
    }

}
$top5 = "SELECT * FROM recipemethod LIMIT 5";
$result_top5 = $db->query($top5);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta id="siteViewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>Title</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel="alternate" type="application/rss+xml" title="Apka &raquo; Feed" href="https://apka.peerduck.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Apka &raquo; Comments Feed"
        href="https://apka.peerduck.com/comments/feed/" />
<link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet" />

    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = { "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/", "ext": ".png", "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/", "svgExt": ".svg", "source": { "concatemoji": "https:\/\/apka.peerduck.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.5.2" } };
        /*! This file is auto-generated */
        !function (i, n) { var o, s, e; function c(e) { try { var t = { supportTests: e, timestamp: (new Date).valueOf() }; sessionStorage.setItem(o, JSON.stringify(t)) } catch (e) { } } function p(e, t, n) { e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0); var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data), r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data)); return t.every(function (e, t) { return e === r[t] }) } function u(e, t, n) { switch (t) { case "flag": return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"); case "emoji": return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b") }return !1 } function f(e, t, n) { var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"), a = r.getContext("2d", { willReadFrequently: !0 }), o = (a.textBaseline = "top", a.font = "600 32px Arial", {}); return e.forEach(function (e) { o[e] = t(a, e, n) }), o } function t(e) { var t = i.createElement("script"); t.src = e, t.defer = !0, i.head.appendChild(t) } "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = { everything: !0, everythingExceptFlag: !0 }, e = new Promise(function (e) { i.addEventListener("DOMContentLoaded", e, { once: !0 }) }), new Promise(function (t) { var n = function () { try { var e = JSON.parse(sessionStorage.getItem(o)); if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests } catch (e) { } return null }(); if (!n) { if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try { var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));", r = new Blob([e], { type: "text/javascript" }), a = new Worker(URL.createObjectURL(r), { name: "wpTestEmojiSupports" }); return void (a.onmessage = function (e) { c(n = e.data), a.terminate(), t(n) }) } catch (e) { } c(n = f(s, u, p)) } t(n) }).then(function (e) { for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]); n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function () { n.DOMReady = !0 } }).then(function () { return e }).then(function () { var e; n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji))) })) }((window, document), window._wpemojiSettings);
        /* ]]> */
    </script>
    <link rel='stylesheet' id='premium-addons-css'
        href='https://apka.peerduck.com/wp-content/plugins/premium-addons-for-elementor/assets/frontend/min-css/premium-addons.min.css?ver=4.10.16'
        type='text/css' media='all' />
    <style id='wp-emoji-styles-inline-css' type='text/css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css'
        href='https://apka.peerduck.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.8.5'
        type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'
        href='https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=8.4.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'
        href='https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=8.4.0'
        type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'
        href='https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=8.4.0'
        type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='bootstrap-css'
        href='https://apka.peerduck.com/wp-content/themes/apka/assets/css/bootstrap.css?ver=1.07' type='text/css'
        media='all' />
    <link rel='stylesheet' id='apka-css' href='https://apka.peerduck.com/wp-content/themes/apka/style.css?ver=1.07'
        type='text/css' media='all' />
    <style id='apka-inline-css' type='text/css'>
        :root {
            --primary-color: crimson;
            --primary-links-hover-color: #131415;
            --primary-bg-color: #f4f3ff;
            --header-bg-color: #F56991;
            --footer-bg-color: #f5f5f6;
            --primary-dark-color: #131415;
            --title-color: #131415;
            --fw-title-color: #131415;
            --btn-bg-color: crimson;
            --btn-hover-color: #131415;
            --txt-select-bg-color: #e5e6ff;
        }

        #main-header {
            position: relative;
            margin-bottom: 32px;
        }

        #site-footer {
            position: relative;
        }

        #header-wave {
            margin-bottom: -1px;
            width: 100%;
        }

        #magic-search .search-submit {
            display: none;
        }

        .onsale .onsale-svg {
            height: 100%;
        }

        #header-wave * {
            fill: transparent;
        }

        @media (max-width: 1199px) {
            #header-wave {
                height: 20px;
            }

            :root #main-header {
                margin-bottom: 32px;
            }
        }

        @media (min-width: 1200px) {
            #header-wave {
                height: 45px;
            }

            :root #main-header {
                padding-top: 50px;
                margin-bottom: 50px;
            }
        }

        .header-icons {
            display: none;
        }

        @media (max-width: 1199px) {
            .header-info {
                margin-top: 1rem;
            }
        }

        .entry-categories {
            display: none;
        }

        .post-author {
            display: none;
        }

        .blog-tile .post-date {
            display: none;
        }

        .post-comment-link {
            display: none;
        }

        .product_meta .posted_in {
            display: none;
        }
    </style>
    <link rel='stylesheet' id='elementor-frontend-css'
        href='https://apka.peerduck.com/wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.18.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='eael-general-css'
        href='https://apka.peerduck.com/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min.css?ver=5.9.3'
        type='text/css' media='all' />
    <script type="text/javascript" src="https://apka.peerduck.com/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
        id="jquery-core-js"></script>
    <script type="text/javascript" src="https://apka.peerduck.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
        id="jquery-migrate-js"></script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.8.4.0"
        id="jquery-blockui-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript" id="wc-add-to-cart-js-extra">
        /* <![CDATA[ */
        var wc_add_to_cart_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%", "i18n_view_cart": "View cart", "cart_url": "https:\/\/apka.peerduck.com\/cart\/", "is_cart": "", "cart_redirect_after_add": "no" };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=8.4.0"
        id="wc-add-to-cart-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.8.4.0"
        id="js-cookie-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript" id="woocommerce-js-extra">
        /* <![CDATA[ */
        var woocommerce_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%" };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=8.4.0"
        id="woocommerce-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/themes/apka/assets/js/bootstrap.bundle.min.js?ver=1.07"
        id="bootstrap-js"></script>
    <script type="text/javascript" id="apka-js-before">
        /* <![CDATA[ */
        if (screen.width >= 1535 && screen.width < 2561) {
            let mvp = document.getElementById('siteViewport');
            mvp.setAttribute('content', 'width=1920');
        }
        if (screen.width > 767 && screen.width < 1535) {
            let mvp = document.getElementById('siteViewport');
            mvp.setAttribute('content', 'width=1700');
        }

        /* ]]> */
    </script>
    <script type="text/javascript" src="https://apka.peerduck.com/wp-content/themes/apka/assets/js/index.js?ver=1.07"
        id="apka-js"></script>
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://apka.peerduck.com/xmlrpc.php?rsd" />
    <link rel="canonical" href="https://apka.peerduck.com/how-to-handle-competition-in-business/" />
    <link rel='shortlink' href='https://apka.peerduck.com/?p=18504' />
    <link rel="alternate" type="application/json+oembed"
        href="https://apka.peerduck.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fapka.peerduck.com%2Fhow-to-handle-competition-in-business%2F" />
    <link rel="alternate" type="text/xml+oembed"
        href="https://apka.peerduck.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fapka.peerduck.com%2Fhow-to-handle-competition-in-business%2F&#038;format=xml" />
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <meta name="generator"
        content="Elementor 3.18.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-internal, google_font-enabled, font_display-auto">
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <link rel="icon" href="https://apka.peerduck.com/wp-content/uploads/2022/08/cropped-efvfe-100x100.png"
        sizes="32x32" />
    <link rel="icon" href="https://apka.peerduck.com/wp-content/uploads/2022/08/cropped-efvfe-300x300.png"
        sizes="192x192" />
    <link rel="apple-touch-icon"
        href="https://apka.peerduck.com/wp-content/uploads/2022/08/cropped-efvfe-300x300.png" />
    <meta name="msapplication-TileImage"
        content="https://apka.peerduck.com/wp-content/uploads/2022/08/cropped-efvfe-300x300.png" />
</head>

<body
    class="post-template-default single single-post postid-18504 single-format-standard theme-apka woocommerce-no-js elementor-default elementor-kit-11">
    <nav id="pr-nav" class="primary-menu navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid primary-menu-inner px-0">
            <div class="top-wrap">
                <a class="custom-logo-link" href="https://apka.peerduck.com">
                    <h5 class="m-0">RECIPE-RADAR</h5>
                </a> <button id="mobile-toggle" class="navbar-toggler animate-button collapsed" type="button"
                    data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span id="m-tgl-icon" class="animated-icon1"><span></span><span></span></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarColor01">
                <ul id="primary-menu" class="navbar-nav pl-3" itemscope
                    itemtype="http://www.schema.org/SiteNavigationElement">

                    <li id="menu-item-1553"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1553 nav-item"><a
                            itemprop="url" href="/" class="nav-link"><span itemprop="name">HOME</span></a></li>
                    <li id="menu-item-1553"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1553 nav-item"><a
                            itemprop="url" href="/categories" class="nav-link"><span
                                itemprop="name">Categories</span></a></li>
                    <li id="menu-item-1553"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1553 nav-item"><a
                            itemprop="url" href="/Recipes.php" class="nav-link"><span itemprop="name">Recipes</span></a>
                    </li>
                    <li id="menu-item-1553"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1553 nav-item"><a
                            itemprop="url" href="/contact.php" class="nav-link"><span itemprop="name">Contact
                                Us</span></a></li>
                    
                </ul>
            </div>

        </div>
    </nav>
    <header id="main-header">
        <div class="container inner-header">
            <div class="title-wrap">
                <h1 class="header-title"><?php echo $title ?></h1>
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <!-- Breadcrumb NavXT 7.2.0 -->
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                            title="Go to Apka." href="/" class="home"><span
                                property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                            title="Go to the Development Category archives."
                            href="/" class="taxonomy category"><span
                                property="name">Receipe</span></a>
                        <meta property="position" content="2">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-post current-item"><?php echo $title ?></span>
                        <meta property="url" content="https://apka.peerduck.com/how-to-handle-competition-in-business/">
                        <meta property="position" content="3">
                    </span>
                </div>
            </div>
        </div>
        <div id="header-wave"></div>
    </header>

    <main id="site-content" class="flex-grow-1" role="main">

        <div class="container-xl blog-post">
            <div class="row">

                <div class="col-lg-8 pb-45 pb-lg-0 mx-auto">
                    <div class="featured-media">
                        <figure class="mb-0">
                            <img fetchpriority="high" width="1200" height="801"
                                src="<?php echo $image ?>"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                decoding="async"
                                srcset="<?php echo $image ?> 1200w, <?php echo $image ?> 600w"
                                sizes="(max-width: 1200px) 100vw, 1200px" />
                        </figure>
                    </div>

                    <article
                        class="post-18504 post type-post status-publish format-standard has-post-thumbnail hentry category-development tag-facts"
                        id="post-18504">

                        <div class="post-inner">


                            <header class="entry-header header-group">

                                <div class="entry-header-inner">



                                    <div class="entry-categories">
                                        <span class="screen-reader-text">Categories</span>
                                        <div class="entry-categories-inner h6">
                                            <div class="wrap-entry-categories-inner">
                                                <a href="https://apka.peerduck.com/category/development/"
                                                    rel="category tag">Development</a>
                                            </div>
                                        </div><!-- .entry-categories-inner -->
                                    </div><!-- .entry-categories -->


                                    <div class="post-meta-wrapper post-meta-single post-meta-single-top">


                                        <ul class="post-meta">

                                            <li class="post-author meta-wrapper">
                                                <span class="meta-icon">
                                                    <span class="screen-reader-text">Post author</span>
                                                    <svg class="svg-icon" aria-hidden="true" role="img"
                                                        focusable="false" xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="20" viewBox="0 0 18 20">
                                                        <path fill=""
                                                            d="M18,19 C18,19.5522847 17.5522847,20 17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,15.3431458 14.6568542,14 13,14 L5,14 C3.34314575,14 2,15.3431458 2,17 L2,19 C2,19.5522847 1.55228475,20 1,20 C0.44771525,20 0,19.5522847 0,19 L0,17 C0,14.2385763 2.23857625,12 5,12 L13,12 C15.7614237,12 18,14.2385763 18,17 L18,19 Z M9,10 C6.23857625,10 4,7.76142375 4,5 C4,2.23857625 6.23857625,0 9,0 C11.7614237,0 14,2.23857625 14,5 C14,7.76142375 11.7614237,10 9,10 Z M9,8 C10.6568542,8 12,6.65685425 12,5 C12,3.34314575 10.6568542,2 9,2 C7.34314575,2 6,3.34314575 6,5 C6,6.65685425 7.34314575,8 9,8 Z" />
                                                    </svg> </span>
                                                <span class="meta-text">
                                                    <a href="https://apka.peerduck.com/author/export/">By Export</a>
                                                </span>
                                            </li>
                                            <li class="post-date meta-wrapper">
                                                <span class="meta-icon">
                                                    <span class="screen-reader-text"></span>
                                                    <svg class="svg-icon" aria-hidden="true" role="img"
                                                        focusable="false" xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="19" viewBox="0 0 18 19">
                                                        <path fill=""
                                                            d="M4.60069444,4.09375 L3.25,4.09375 C2.47334957,4.09375 1.84375,4.72334957 1.84375,5.5 L1.84375,7.26736111 L16.15625,7.26736111 L16.15625,5.5 C16.15625,4.72334957 15.5266504,4.09375 14.75,4.09375 L13.3993056,4.09375 L13.3993056,4.55555556 C13.3993056,5.02154581 13.0215458,5.39930556 12.5555556,5.39930556 C12.0895653,5.39930556 11.7118056,5.02154581 11.7118056,4.55555556 L11.7118056,4.09375 L6.28819444,4.09375 L6.28819444,4.55555556 C6.28819444,5.02154581 5.9104347,5.39930556 5.44444444,5.39930556 C4.97845419,5.39930556 4.60069444,5.02154581 4.60069444,4.55555556 L4.60069444,4.09375 Z M6.28819444,2.40625 L11.7118056,2.40625 L11.7118056,1 C11.7118056,0.534009742 12.0895653,0.15625 12.5555556,0.15625 C13.0215458,0.15625 13.3993056,0.534009742 13.3993056,1 L13.3993056,2.40625 L14.75,2.40625 C16.4586309,2.40625 17.84375,3.79136906 17.84375,5.5 L17.84375,15.875 C17.84375,17.5836309 16.4586309,18.96875 14.75,18.96875 L3.25,18.96875 C1.54136906,18.96875 0.15625,17.5836309 0.15625,15.875 L0.15625,5.5 C0.15625,3.79136906 1.54136906,2.40625 3.25,2.40625 L4.60069444,2.40625 L4.60069444,1 C4.60069444,0.534009742 4.97845419,0.15625 5.44444444,0.15625 C5.9104347,0.15625 6.28819444,0.534009742 6.28819444,1 L6.28819444,2.40625 Z M1.84375,8.95486111 L1.84375,15.875 C1.84375,16.6516504 2.47334957,17.28125 3.25,17.28125 L14.75,17.28125 C15.5266504,17.28125 16.15625,16.6516504 16.15625,15.875 L16.15625,8.95486111 L1.84375,8.95486111 Z" />
                                                    </svg> </span>
                                                <span class="meta-text">
                                                <?php echo $date ?> </span>
                                            </li>
                                        </ul><!-- .post-meta -->

                                    </div><!-- .post-meta-wrapper -->

                                    <div class="blog-tile-wave"></div>
                                </div><!-- .entry-header-inner -->
                            </header><!-- .entry-header -->

                            <div class="entry-content clearfix">
                                <div id="lipsum">
                                <h2>Ingredients</h2>

                                <div id="editor2">
                                        <?php echo $ingredients ?>
                                    </div>
                                    <h2>Directions</h2>
                                <div id="editor">
                                        <?php echo $Directions ?>
                                    </div>
                                </div>
                            </div><!-- .entry-content -->


                            <div class="post-meta-wrapper post-meta-single post-meta-single-bottom">

                                <div class="blog-tile-wave"></div>
                                <ul class="post-meta">

                                    <li class="post-tags meta-wrapper">
                                        <span class="meta-icon">
                                            <span class="screen-reader-text">Tags</span>
                                            <svg class="svg-icon" aria-hidden="true" role="img" focusable="false"
                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18">
                                                <path fill=""
                                                    d="M15.4496399,8.42490555 L8.66109799,1.63636364 L1.63636364,1.63636364 L1.63636364,8.66081885 L8.42522727,15.44178 C8.57869221,15.5954158 8.78693789,15.6817418 9.00409091,15.6817418 C9.22124393,15.6817418 9.42948961,15.5954158 9.58327627,15.4414581 L15.4486339,9.57610048 C15.7651495,9.25692435 15.7649133,8.74206554 15.4496399,8.42490555 Z M16.6084423,10.7304545 L10.7406818,16.59822 C10.280287,17.0591273 9.65554997,17.3181054 9.00409091,17.3181054 C8.35263185,17.3181054 7.72789481,17.0591273 7.26815877,16.5988788 L0.239976954,9.57887876 C0.0863319284,9.4254126 0,9.21716044 0,9 L0,0.818181818 C0,0.366312477 0.366312477,0 0.818181818,0 L9,0 C9.21699531,0 9.42510306,0.0862010512 9.57854191,0.239639906 L16.6084423,7.26954545 C17.5601275,8.22691012 17.5601275,9.77308988 16.6084423,10.7304545 Z M5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 C5.55228475,4 6,4.44771525 6,5 C6,5.55228475 5.55228475,6 5,6 Z" />
                                            </svg> </span>
                                        <span class="meta-text">
                                            <a href="https://apka.peerduck.com/tag/facts/" rel="tag"><?php echo"$category";?></a> </span>
                                    </li>

                                </ul><!-- .post-meta -->

                            </div><!-- .post-meta-wrapper -->


                        </div><!-- .post-inner -->

                        <div class="section-inner clearfix"></div><!-- .section-inner -->

                    </article><!-- .post -->
                </div>

            </div>
        </div>

    </main><!-- #site-content -->



    <script>(function () {
            function maybePrefixUrlField() {
                const value = this.value.trim()
                if (value !== '' && value.indexOf('http') !== 0) {
                    this.value = 'http://' + value
                }
            }

            const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
            for (let j = 0; j < urlFields.length; j++) {
                urlFields[j].addEventListener('blur', maybePrefixUrlField)
            }
        })();</script>
    <script type="text/javascript">
        (function () {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.8.5"
        id="swv-js"></script>
    <script type="text/javascript" id="contact-form-7-js-extra">
        /* <![CDATA[ */
        var wpcf7 = { "api": { "root": "https:\/\/apka.peerduck.com\/wp-json\/", "namespace": "contact-form-7\/v1" }, "cached": "1" };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.8.5"
        id="contact-form-7-js"></script>
    <script type="text/javascript" id="eael-general-js-extra">
        /* <![CDATA[ */
        var localize = { "ajaxurl": "https:\/\/apka.peerduck.com\/wp-admin\/admin-ajax.php", "nonce": "a29125f526", "i18n": { "added": "Added ", "compare": "Compare", "loading": "Loading..." }, "eael_translate_text": { "required_text": "is a required field", "invalid_text": "Invalid", "billing_text": "Billing", "shipping_text": "Shipping", "fg_mfp_counter_text": "of" }, "page_permalink": "https:\/\/apka.peerduck.com\/how-to-handle-competition-in-business\/", "cart_redirectition": "no", "cart_page_url": "https:\/\/apka.peerduck.com\/cart\/", "el_breakpoints": { "mobile": { "label": "Mobile Portrait", "value": 767, "default_value": 767, "direction": "max", "is_enabled": true }, "mobile_extra": { "label": "Mobile Landscape", "value": 880, "default_value": 880, "direction": "max", "is_enabled": false }, "tablet": { "label": "Tablet Portrait", "value": 1024, "default_value": 1024, "direction": "max", "is_enabled": true }, "tablet_extra": { "label": "Tablet Landscape", "value": 1200, "default_value": 1200, "direction": "max", "is_enabled": false }, "laptop": { "label": "Laptop", "value": 1366, "default_value": 1366, "direction": "max", "is_enabled": false }, "widescreen": { "label": "Widescreen", "value": 2400, "default_value": 2400, "direction": "min", "is_enabled": false } } };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://apka.peerduck.com/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/js/view/general.min.js?ver=5.9.3"
        id="eael-general-js"></script>
    <script type="text/javascript" src="https://apka.peerduck.com/wp-includes/js/comment-reply.min.js?ver=6.5.2"
        id="comment-reply-js" async="async" data-wp-strategy="async"></script>
    <script type="text/javascript" defer
        src="https://apka.peerduck.com/wp-content/plugins/mailchimp-for-wp/assets/js/forms.js?ver=4.9.10"
        id="mc4wp-forms-api-js"></script>
        <script src="./editor.js"></script>

</body>

</html>

<!-- Dynamic page generated in 1.222 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2024-04-11 09:44:50 -->

<!-- super cache -->
<?php
$db->close();
?>