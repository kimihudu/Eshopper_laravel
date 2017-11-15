<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class TestDB extends Eloquent {
    
    protected $collection = 'books';
    // public static function insertProd($statement){
    //     $this->products->insertOne($statement);
    // }
}



// class product{
// private $id;
// private $cat_id;
// private $model;
// private $name;
// private $lname;
// private $brand_id;
// private $price;
// private $available;

// }

// product = {
// 	_id		    : String
// 	category_id : String,
// 	model	    : String
// 	name	    : String,
// 	lname		: String, #lowercase for name
// 	brand_id    : String,
// 	price	    : Numeber,
// 	available   : Date
// 	assets		: {
// 				imgs: [
// 					{img: {
// 						height: Number,
// 						src   :	String,
// 						width : Number
// 					}},
// 					{img: {
// 						height: Number,
// 						src   :	String,
// 						width : Number
// 					}},
// 					{img: {
// 						height: Number,
// 						src   :	String,
// 						width : Number
// 					}},[]
// 				]
// 	},
// 	desc		: [{lang: en,val: String},{...},{...}],
// 	attrs		: [{name: String, value: String},{...},{...}],
// 	shipping	: {
// 				dimensions: {
// 						height: Number,
// 						length: Number,
// 						width : Number
// 				},
// 				weight    : Number
// 	}
// 	history     : [{date: Date("2017-05-18"),price: 100},{date:...,price:...},],

// 	lastUpdate  : Date
// }




// class Book{

//     private $id;
//     private $title;
//     private $author;
//     private $category;

//     private static function createFromDB( $raw )
//     {
//         $n = new Book;
//         $n->title = $raw['firstname'];
//         $n->author  = $raw['lastname'];
//         $n->category  = $raw['category'];

//         // $contact = array(
//         // 'method' => 'phone',
//         // 'value'  => $raw['phonenumber'],
//         // );
//         // $n->contacts = array( $contact );

//         return $n;
//     }
// }