<?php

namespace App\Http\Controllers;

use App\Models\Selling;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Error;

use Illuminate\Http\Request;

class SellingController extends Controller
{
    public function select()
    {
        $selling = Selling::find(1);
        echo $selling->acc_sold_count . "buku <b>" . $selling->book->judul . "</b> Terjual";
    }

    public function insert()
    {
        $selling = new Selling();
        $selling->acc_earnings = 1000000;
        $selling->acc_sold_count = 10;
        $selling->book_id = 1;
        $selling->insert();
    }
}
