<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function select()
    {
        $allAuthor = Author::all();

        echo "<table border='1'>";
        echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kota</th>
                    <th>Negara</th>
                </tr>
            </thead>";

        echo "<tbody>";

        foreach ($allAuthor as $author) {
            $author->loadCount('books');
            echo "<tr>";
            echo "<td>" . $author->id . "</td>";
            echo "<td>" . $author->nama . "</td>";
            echo "<td>" . $author->kota . "</td>";
            echo "<td>" . $author->negara . "</td>";

            echo "<td><ul>";
            foreach ($author->books as $book) {
                echo "<li>" . ($book->selling ? $book->selling->acc_sold_count : '-') . "</li>";
            }

            echo "</ul> </td>";
            echo "<tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    public function insert()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
        // $author ;
    }
}
