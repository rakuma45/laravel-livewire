<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookIndex extends Component
{
    protected $listeners = ['bookAdded' => 'bookStored'];
    public function bookStored()
    {
        session()->flash('success', 'Buku berhasil ditambahkan');
    }

    public function render()
    {
        $books = Book::orderBy('title')->get();

        return view('livewire.book-index', compact('books'))->extends('layouts.app');
    }

}
