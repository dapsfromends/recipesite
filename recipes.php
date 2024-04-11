<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ("./connection.php");

$posts = "SELECT *  FROM recipemethod";
$result_posts = $db->query($posts);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RECIPE RADAR</title>
    <link rel="stylesheet" href="css\style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/darkmode.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
  </head>
  <body>
    <header>
      <div class="topnav">
        <div class="container flex">
          <div class="navicons flex">
            <a href="/"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="/"><i class="fa-brands fa-instagram"></i></a>
            <a href="/"><i class="fa-brands fa-youtube"></i></a>
            <a href="/"><i class="fa-brands fa-x-twitter"></i></a>
          </div>
          <a href="/" class="srbtn"
            >Submit Recipe<i class="fa-solid fa-plus"></i
          ></a>
        </div>
      </div>
      <div class="mainnav">
        <div class="container flex">
          <div class="logo flex">
            <img src="/img/logo2.png" alt="" />
            <h1>RECIPE-RADAR</h1>
          </div>
          <ul class="navlist flex">
            <li><a href="/">Home</a></li>
            <li><a href="/">Categories</a></li>
            <li><a href="/">Blog</a></li>
            <li><a href="/">Recipes</a></li>
            <li><a href="/">Contact Us</a></li>
            <li><a href="/auth/register">Register</a></li>
            <li><a href="/auth/login">Login</a></li>
          </ul>
          <div class="searchbar flex">
            <input
              type="checkbox"
              name="check-toggle"
              id="checkbox"
              hidden=""
            />
            <label for="checkbox" class="toggle">
              <div class="toggle__circle"></div>
            </label>
            <i class="fa-solid fa-magnifying-glass" id="searchopen"></i>
            <div class="navonoff">
              <input type="checkbox" id="checkbox2" />
              <label for="checkbox2" class="toggle2">
                <div class="bar bar--top"></div>
                <div class="bar bar--middle"></div>
                <div class="bar bar--bottom"></div>
              </label>
            </div>
          </div>
          <div class="searchinput">
            <input type="text" placeholder="Search Recipes.." />
            <i class="fa-solid fa-xmark" id="removesearch"></i>
          </div>
        </div>
      </div>
    </header>

    <main>
    <section class="breakfastsec container flex">
      <div class="leftsidesec">
        <h2>Showing Result All:</h2>
        <div class="leftposts flex">
        <?php
          if ($result_posts->num_rows > 0) {
            while ($row = $result_posts->fetch_assoc()) {
              $id = $row['id'];
              $chefname = $row['chefname'];
              $category = $row['category'];
              $title = $row['Recipename'];
              $image = $row['image'];
          echo '<div class="tcard">';
          echo  '<div class="tcardimg">';
          echo  '<img src="' . $image . '" alt="">';
          echo   '<span class="fa fa-star"></span>';
          echo  '</div>';
          echo  '<div class="tcardinfo flex">';
          echo    '<div class="star-rating">';
          echo      '<span class="fa fa-star checked"></span>';
          echo      '<span class="fa fa-star checked"></span>';
          echo      '<span class="fa fa-star checked"></span>';
          echo     ' <span class="fa fa-star "></span>';
          echo      '<span class="fa fa-star "></span>';
          echo    '</div>';
          echo    '<label class="tlabel">' . $category . '</label>';
          echo    '<h2>' . $title . '</h2>';
          echo    '<p>' . $chefname . '</p>';
          echo    ' <a href="/recipe/?id=' . $id . '" class="catecarbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>';
          echo '</div></div>';
        }
      } else {
        echo "No popular blogs found.";
      }
      ?>
        </div>
      </div>
    </section>
    <section class="subscribe">
      <div class="subscribeinfo">
        <h1>Subscribe To My Channel</h1>
        <p>Get All My Latest Recipes By Joining My Youtube Channel</p>
        <form action="https://www.youtube.com/@codingwebstudio/codingwebstudio?sub_confirmation=1">
          <input type="hidden" name="sub_confirmation=1" value="1">
          <label for="name">@codingwebstudio</label>
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </section>
   </main>

   <footer>
    <div class="container flex">
      <div class="footer flex">
        <div class="footerlogo">
          <h1>Recipe Blog</h1>
          <p>I provide the best recipes with a special twist on a daily basis. I also make posts about fun things to do in the kitchen.</p>
          <div class="fsocial">
            <a href="" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="" target="_blank"><i class="fa-brands fa-twitter"></i></a>
          </div>
        </div>
        <div class="footernav">
          <h3>Category</h3>
          <ul class="flex">
            <li><a href="/category?name=breakfast">Breakfast</a></li>
            <li><a href="/category?name=dessert">Dessert</a></li>

          </ul>
        </div>
        <div class="footernav">
          <h3>Category</h3>
          <ul class="flex">
            <li><a href="/category?name=dinner">Dinner</a></li>
            <li><a href="/category?name=dairy">Dairy</a></li>
          </ul>
        </div>
      </div>
      <div class="flex">
        <h5>&copy; 2024 RECIPE-RADAR All Rights Reserved.</h5>
      </div>
    </div>
   </footer>
   
     
    `
    <script src="js/script.js"></script>
  </body>
</html>
