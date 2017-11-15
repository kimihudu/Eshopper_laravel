<?php

namespace App\Http\Controllers;

use App\testDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class testController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $products = Products::all();
        // $books = $tmp->find();
       
        
        $products = TestDB::all();
        foreach($products as $product){
            
        //     $insertOneResult = $products->insertOne($statement);
            
            $html = "<table>
            <tr>
            <th>name</th>
            <th>price</th>
            <th>category</th>
            <th>brand</th>
            <th>category</th>
            </tr>
            ";
            foreach($books as $book){
                $html.="<tr><td>".$book['category']."</td><td>".$book['author']."</td><td>".$book['title']."</td></tr>";
            
            }
            $html.="</table>";
            echo($html);
        }
        // echo "finished";
    }
}