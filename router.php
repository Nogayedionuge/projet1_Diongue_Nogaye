<?php

// Define a function to handle the home page
function homePage()
{
    require __DIR__ . '/views/home.php';
}

// Define a function to handle the about page
function aboutPage()
{
    require __DIR__ . '/views/about.php';
}
// Define a function to handle the product page
function productPage()
{
    require __DIR__ . '/views/product.php';
}
// Define a function to handle the why page
function whyPage()
{
    require __DIR__ . '/views/why.php';
}
function detailPage()
{
    require __DIR__ . '/views/detail.php';
}
// Get the requested URL
$requestUri = explode("/projet1_Diongue_Nogaye", $_SERVER['REQUEST_URI'])[1];

// Routing based on the URL
if(isset($_GET["product"])){
    productPage();
}else if(isset($_GET["about"])){
    aboutPage();
}else if(isset($_GET["why"])){
    whyPage();
}else if(isset($_GET["detail"])){
    detailPage();
}else{
    homePage();
}

