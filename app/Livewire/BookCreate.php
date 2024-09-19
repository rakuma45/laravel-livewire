<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookCreate extends Component
{
    public $title;
    public $qty;
    public $writer;

    public function render()
    {
        return view('livewire.book-create');
    }

    public function store()
    {
        # code...
        //memasukkan data ke tabel books
        Book::create([
            'title' => $this->title,
            'qty' => $this->qty,
            'writer' => $this->writer,
        ]);

        // kosongkan kembali value dari setiap variabel
        $this->title = '';
        $this->qty = '';
        $this->writer = '';

        //jika sukses maka lakukan trigger emit dengan nama bookAdded
        $this->dispatch('bookAdded');
    }
}
