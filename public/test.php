<?php
// require lib
require_once('../vendor/autoload.php');
// connect to mongodb
$m = new MongoDB\Client();
// echo "Connection to database successfully";

// select a database
$db = $m->local;
$books = $db->books;
$products = $db->products;
$cats = $db->categorys;
$brands = $db->brands;
$users = $db -> users;
// $tmp = $books->find();

// var_dump($tmp);
// foreach($tmp as $value){
//     echo($value['title']."<br>");
// }
// create collection
// $tmp = $db->createCollection('test',
// array(
// 'capped'=> true,
// 'size'=> 1024,
// 'max'=>1
// ));

// delete collection
// $tmp = $db->dropCollection("brand");

// select collection
// $test = $db->collections;

$statement = [
//  product
        // "name"		  => "WOMENS",
        // "lName"		  => "womens",
        // "cat_name"    => ["name" => "WOMENS","sub" => "GUESS"],
        // "model"	      => "CLOTHES",
        // "brand_name"  => "VALENTINO",
        // "price"	      => 56,
        // "img"         => "theme/images/home/product3.jpg",
        // "available"   => date("y/m/d"),
        // "assets"	  => [
        // [
        // "height" => 0,
        // "src"    => "theme/images/home/girl1.jpg",
        // "width"  => 0
        // ],
        // [
        // "height" => 0,
        // "src"    => "theme/images/home/girl2.jpg",
        // "width"  => 0
        // ],
        // [
        // "height"=> 0,
        // "src"   => "theme/images/home/girl3.jpg",
        // "width" => 0
        // ]
        // ],
        // "desc"  => "",
        // "attrs" => "",
        // "shipping"	=> 	[
        // "dimensions"=> 	[
        // "height"=> 0,
        // "length"=> 0,
        // "width" => 0
        // ],
        // "weight"    => 0
        // ],
        // "lastUpdate"  => date("y/m/d"),
        // "history"     => [
        // [
        // "date" => date("y/m/d"),
        // "price"=> 100
        // ],
        // [
        // "date" => date("y/m/d"),
        // "price"=> 100
        // ]
        // ]

// category
// "name"		  => "SPORTWEAR",
// "lName"		  => "sportwear",
// "sub_cat"     => [
// [
// "name" =>"ADIDAS",
// "lName" =>  "adidas"
// ],
// [
// "name" =>"NIKE",
// "lName" =>  "nike"
// ],
// [
// "name" =>"PUMA",
// "lName" =>  "puma"
// ],
// [
// "name" =>"UNDER AMORE",
// "lName" =>  "under amore"
// ],
// ]

// brands
// "name"		  => "SPORTWEAR",
// "lName"		  => "sportwear",
// "qTy"         => 100 

// users

		"usrName"   => "admin",
		"psw"       => "password",
		"name"      => "admin",
        "role"      => "admin",
	//embedd type
		"address"  => [
			"line1" => "String",
			"line1" => "String",
			"city"  => "String",
			"state" => "String",
			"zip"   => 12345
        ],
		"cart" => [
			"status"   => "active",
	        "items"    => ["list" => ["_id" => "59356afab6b75128ec007ff2","quantity" => 2]],
	        "check_out"=> ["total" => 100,"c_o_d" => date("Y-m-d h:i:sa")]
        ],
		"wishlist" => [
			"status"   => "active",
	        "items"    => ["list" => ["_id" => "59356afab6b75128ec007ff3","quantity" => 2]],
        ],
		// "orderHistory" => [{
		// 	type: Schema.Types.ObjectID,
		// 	ref : 'cart'
		// }]


];



// inser data
for($i=0;$i<1;$i++){
    $users->insertOne($statement);
}

echo "inserted";

// var_dump($test);
// get all data inside collection
// $tmp = $test->find();

// listen all collections inside db
/*
foreach($db->listCollections() as $collection){
// echo "<br/>".$single['lName']."<br/>";
var_dump($collection);
}
*/

// listen all dbs inside server
/*
foreach($m->listDatabases() as $db){
// echo "<br/>".$single['lName']."<br/>";
var_dump($db);
}
*/

// remove db
/*
$tmp = $m->dropDatabase("test");
var_dump($tmp);
*/

/*
//pagination

$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 3 ;
$skip  = ($page - 1) * $limit;
$next  = ($page + 1);
$prev  = ($page - 1);
$sort  = array('createdAt' => -1);
$cursor = $books->find();//->skip($skip)->limit($limit)->sort($sort);
$total = $cursor->count();

foreach ($cursor as $r) {
    echo sprintf('<p>Added on %s. Last viewed on %s. Viewed %d times. </p>', $r['_id'], $r['isbn'], $r['title']);
}


if($page > 1){
    echo '<a href="?page=' . $prev . '">Previous</a>';
    if($page * $limit < $total) {
        echo ' <a href="?page=' . $next . '">Next</a>';
    }
} else {
    if($page * $limit < $total) {
        echo ' <a href="?page=' . $next . '">Next</a>';
    }
}
*/
