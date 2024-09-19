<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookIndex extends Component
{
    
    public $isEdit = false;
    public $selectedBookId;
    
    protected $listeners = [
        'bookAdded' => 'bookStored',
        'bookEdited' => 'bookUpdated'
    ];
    
    public function bookStored()
    {
        session()->flash('success', 'Buku berhasil ditambahkan');
    }
    public function bookUpdated(){
        $this->isEdit = false;
        session()->flash('success', 'Buku berhasil diubah');
    }

    public function edit($id)
    {
        //get buku by id
        $this->selectedBookId = $id;

        // ngirim data buku lewat emit(dispatch) bookEdit
        $this->dispatch('bookEdit', Book::find($id)->toArray());

        //set status edit ke true
        $this->isEdit = true;
    }

    public function render()
    {
        $books = Book::orderBy('title')->get();

        return view('livewire.book-index', compact('books'))->extends('layouts.app');
    }

}
