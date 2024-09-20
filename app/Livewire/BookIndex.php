<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $isEdit = false;
    public $selectedBookId;
    public $search = '';
    
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

    public function delete($id)
    {
        Book::destroy($id);
        session()->flash('success', 'Buku berhasil dihapus');
    }

    public function render()
    {
        $params = [
            'search' => $this->search
        ];

        $books = Book::when($params['search'], function($query) use ($params) {
            $query->where('title', 'like', '%'.$params['search'].'%');
        })
        ->orderBy('title')
        ->paginate(5);
        return view('livewire.book-index', compact('books'))->extends('layouts.app');

    }

}
