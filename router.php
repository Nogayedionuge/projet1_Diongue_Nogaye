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

// Get the requested URL
$requestUri = explode("/projet1_Diongue_Nogaye", $_SERVER['REQUEST_URI'])[1];

// Routing based on the URL
switch ($requestUri) {
    case '/':
        homePage();
        break;
    case '/?product':
        productPage();
        break;
    case '/?about':
        aboutPage();
        break;
    case '/?why':
        whyPage();
        break;
    default:
        echo "404 Not Found";
        break;
}