<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Selling;
use Error;
use Illuminate\Http\Request;


class BookController extends Controller
{
    // public function index()
    // {
    //     $book = Book::find(4);
    //     dump($book);
    //     // dump($book->selling->acc_earnings);

    //     // echo "<h3>" . $book->judul . "<h3>";
    //     // echo "<p>";
    //     // echo "Harga :" . $book->harga . "<br>";
    //     // echo "Halaman :" . $book->halaman . "<br>";
    //     // echo "Pendapatan Penjualan : " . $book->selling->acc_earnings . "<br>";
    //     // echo "Buku Terjual : " . $book->selling->acc_sld_coount . "<br>";
    //     // echo "Rata-Rata Nilai Jual Buku : " . $book->selling->acc_earnings / $book->selling->acc_sold_count . "</p>";

    //     $allBooks = Book::all();
    //     dump($allBooks);
    //     $allBooks = Book::with('selling')->get();
    //     dump($allBooks);
    //     $allBooks = Book::has('selling')->get();
    //     dump($allBooks);
    //     $allBooks = Book::doesntHave('selling')->get();
    //     dump($allBooks);
    //     $allBooks = Book::whereHas('selling', function ($row) {
    //         $row->where('acc_earnings', '<', 1000000);
    //     })->get();
    //     dump($allBooks);
    // }

    public function insert()
    {
        $book = new Book();
        $book->judul = "Buku Baru";
        $book->harga = "100000";
        $book->halaman = "10";
        $book->save();

        $selling = new Selling();
        $selling->acc_earnings = 1400000;
        $selling->acc_sold_count = 4;

        $book->selling()->save($selling);

        echo "Data Buku Tersimpab" . $book->judul . "Bla bala bla" . $book->$selling->acc_sold_count;
    }

    public function update()
    {
        // $book = Book::find(3);
        // $book->selling()->update([
        //     "acc_sold_count" => 300
        // ]);
        // echo "Buku <b>" . $book->judul . "</b> terjual sebanyak" . $book->selling->acc_sold_count;

        $bookToUpdate = Book::find(3);

        $bookToUpdate->selling->acc_earnings = 50000000;
        $bookToUpdate->push();
    }

    public function delete()
    {
        //Delete normal
        $book = Book::find(3);

        $book->selling->delete();
        $book->delete();
        echo "Data telah dihapus";

        //Delete dengan pencegahan
        $book = Book::find(1)->firstOrFail();
        if ($book->selling) {
            $book->selling->delete();
        }
        $book->delete();
    }

    public function dissociate()
    {
        $book = Book::find(2);
        $book->author()->dissociate();
        $book->save();
    }

    public function attach()
    {
        $book = Book::find(1);
        $category = Category::find(1);

        $book->categories()->attach($category);
        echo "Judul Buku" . $book->judul . "Masuk Kategori <b>" . $category->nama . "</b>";


        $book = Book::find(5);
        $category = Category::find([1, 2, 3, 4]);

        $book->categories()->attach($category);
    }

    public function detach()
    {
        $book = Book::find(5);
        $category = Category::find(2);
    }

    public function sync()
    {
        $book = Book::find(7);
        $category = Category::find([1, 2, 4]);

        $book->categories()->sync($category);
    }
}






























































    // public function insert()
    // {
    //     // $book = new Book();

    //     // $book->judul = "Buku #1";
    //     // $book->halaman = 108;
    //     // $book->penerbit = "Rijal Khalik";
    //     // $book->harga = "20000";
    //     // $book->ISBN = "1234567890123";
    //     // $book->kategori = "Cara Masak";

    //     // $book->save();

    //     Book::create(
    //         [
    //             'judul' => 'The Bench',
    //             'ISBN' => '9780593434512',
    //             'kategori' => 'Growing Up & Facts of Life',
    //             'harga' => 181500,
    //             'halaman' => 40,
    //             'penerbit' => 'Random House Books for Young Readers'
    //         ]
    //     );
    //     return 'Data buku sudah masuk!';
    // }

    // public function update()
    // {
    //     // $book = Book::find(1);
    //     // $book->judul = "Buku Kontol IJal";
    //     // $book->harga = "300000";

    //     // $book->save();

    //     // $book = Book::where('isbn', '1234567890123')->first();
    //     // $book->judul = "Buku jancok";
    //     // $book->harga = "200000000000";
    //     // $book->save();

    //     Book::where('isbn', '1234567890123')->first()->update([
    //         'judul' => "Buku Anying",
    //         'harga' => 20000
    //     ]);


    //     return 'Data buku Sudah di Update!';
    // }
    // public function delete()
    // {
    //     try {
    //         Book::find(1)->delete();
    //     } catch (Error $error) {
    //         echo "Error";
    //     }
    //     return 'Record books dengan ID: 1 sudah dihapus.';
    // }

    // public function Select()
    // {
    //     $result = Book::where('harga', '<', '200000')->get();
    //     // $result = Book::all();
    //     foreach ($result as $book) {
    //         echo "Judul Buku : ", $book->judul;
    //     }
    //     dump($result);
    // }
