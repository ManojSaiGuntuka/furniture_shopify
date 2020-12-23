<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "a4f7932a9baec550192e31ba154d426c";
$scopes = "read_orders,write_products";
$redirect_uri = "https://52.60.46.178/furniture/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();