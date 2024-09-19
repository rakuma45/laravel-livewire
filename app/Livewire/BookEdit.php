<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookEdit extends Component
{
    //define property
    public $bookId;
    public $title;
    public $qty;
    public $writer;
    
    //get data buku dari emit(dispatch) bookEdit
    protected $listeners = [
        'bookEdit' => 'getBook'
    ];

    public function mount($bookId)
    {
        $this->bookId = $bookId;
        $this->loadBookData();
    }

    public function loadBookData()
    {
        $book = Book::find($this->bookId);
        if ($book) {
            $this->title = $book->title;
            $this->qty = $book->qty;
            $this->writer = $book->writer;
        }
    }

    public function render()
    {
        return view('livewire.book-edit');
    }

    public function getBook($book)
    {
        //set masing2 property dgn value yg didapat dari $book
        $this->bookId = $book['id'];
        $this->title = $book['title'];
        $this->qty = $book['qty'];
        $this->writer = $book['writer'];
    }

    public function update()
    {
        // Get book by ID
        $book = Book::find($this->bookId);

        // Check if the book exists
        if ($book) {
            // Update the book
            $book->update([
                'title' => $this->title,
                'qty' => $this->qty,
                'writer' => $this->writer,
            ]);

            // Emit the event named bookEdited
            $this->dispatch('bookEdited');
        } else {
            // Handle case when the book is not found
            session()->flash('error', 'Book not found.');
        }
    }
}
