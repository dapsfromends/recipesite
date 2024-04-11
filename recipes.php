<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT b.id AS blog_id, b.love AS blog_love, b.view AS blog_view, b.cover_image AS blog_cover_image, b.title AS blog_title, b.preview AS blog_preview, b.created_at AS blog_created_at, u.fullname AS author_fullname FROM blogs AS b INNER JOIN users AS u ON b.author = u.id ORDER BY b.created_at DESC";
include_once ("./connection.php");
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Honey Well Today Post</title>

    <!-- Favicon -->
    <link rel="icon" href="/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="/css/responsive/responsive.css" rel="stylesheet">

</head>

<body>

    <?php include_once ('./include/top_header.php') ?>
    <!-- ****** Top Header Area End ****** -->

    <?php include_once ('./include/nav.php') ?>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area section_padding_80">
        <div class="container">
            <div class="row">
                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $blog_id = $row['blog_id'];
                        $blog_view = $row['blog_view'];
                        $blog_love = $row['blog_love'];
                        $blog_cover_image = $row['blog_cover_image'];
                        $blog_title = $row['blog_title'];
                        $blog_preview = $row['blog_preview'];
                        $blog_created_at = date("F j, Y", strtotime($row['blog_created_at']));
                        $author_fullname = $row['author_fullname'];

                        echo '<div class="col-12 col-md-6 col-lg-4">';
                        echo '<div class="single-post wow fadeInUp" data-wow-delay="0.1s">';
                        echo '<div class="post-thumb">';
                        echo ' <img src="' . $blog_cover_image . '" alt="">';
                        echo '</div>';
                        echo '<div class="post-content">';
                        echo ' <div class="post-meta d-flex">';
                        echo '<div class="post-author-date-area d-flex">';
                        echo ' <div class="post-author">';
                        echo '<a href="/post/?id=' . $blog_id . '">By ' . $author_fullname . '</a>';
                        echo '</div>';
                        echo '<div class="post-date">';
                        echo '<a href="/post/?id=' . $blog_id . '">' . $blog_created_at . '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="post-comment-share-area d-flex">';
                        // Additional meta information like comments, shares can be added here
                        echo '<div class="post-favourite">';
                        echo '<a href="/post/?id=' . $blog_id . '"><i class="fa fa-heart-o" aria-hidden="true"></i> ' . $blog_love . '</a>';
                        echo '</div>';
                        echo '<div class="post-comments">';
                        echo ' <a href="/post/?id=' . $blog_id . '"><i class="fa fa-eye" aria-hidden="true"></i> ' . $blog_view . '</a>';
                        echo '</div>';
                        echo '<div class="post-share">';
                        echo '<a href="/post/?id=' . $blog_id . '"><i class="fa fa-share-alt" aria-hidden="true"></i></a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<a href="/post/?id=' . $blog_id . '"><h4 class="post-headline">' . $blog_title . '</h4></a>';
                        echo '<p>' . $blog_preview . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No blogs created today.";
                }
                ?>


            </div>
        </div>
    </section>
    <!-- ****** Archive Area End ****** -->

    <!-- ****** Footer Menu Area Start ****** -->
    <?php include_once ('./include/footer.php'); ?>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="/js/active.js"></script>
</body>