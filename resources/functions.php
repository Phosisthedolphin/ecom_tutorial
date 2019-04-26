<?php

// helper functions

if($connection) {
    echo "is connected";
}

function redirect($location) {
    header("Location: $location ");
}

global $connection;

function query($sql) {

    global $connection;

    return mysqli_query($connection, $sql);
}

function confirm($result) {
    global $connection;

    if(!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string) {
    global $connection;

    return mysql_real_escape_string($connection, $string);
}

function fetch_array($result) {
    return mysqli_fetch_array($result);
}

// get products

function get_products() {
    // Using the query helper function to return mysqli_query from SQL database
    $query = query(" SELECT * FROM products");

    // Use the global confirm function to check and see if a result is being loaded. If not, die.

    confirm($query);

    while($row = fetch_array($query)) {

    $product = <<<DELIMETER
    
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="http://placehold.it/320x150" alt="">
            <div class="caption">
                <h4 class="pull-right">{$row['product_price']}</h4>
                <h4><a href="product.html">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_description']}</p>
                <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Buy Now</a>
            </div>
            
        </div>
    </div>

DELIMETER;

echo $product;

    }
}

?>