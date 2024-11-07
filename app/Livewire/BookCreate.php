<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\Book;

class BookCreate extends Component
{
    use WithFileUploads;
    //image
    #[Rule('required', message: 'Masukkan Cover Buku')]
    #[Rule('image', message: 'File Harus Gambar')]
    #[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
    public $image;
    
    #[Rule('required', message: 'Masukkan Judul Buku')]
    public $title;

    #[Rule('required', message: 'Masukkan Jumlah Buku')]
    public $qty;

    #[Rule('required', message: 'Masukkan Nama Penulis')]
    public $writer;

    public function render()
    {
        return view('livewire.book-create');
    }

    public function store()
    {
        //validasi
        $this->validate();
        // $this->validate([
        //     'title' => 'required',
        //     'qty' => 'required',
        //     'writer' => 'required',
        // ]); 

        //menyimpan gambar di storage/app/public/books
        $this->image->storeAs('public/books', $this->image->hashName());

        //memasukkan data ke tabel books
        Book::create([
            'title' => $this->title,
            'qty' => $this->qty,
            'writer' => $this->writer,
            'image' => $this->image->hashName(),
        ]);

        // kosongkan kembali value dari setiap variabel
        $this->title = '';
        $this->qty = '';
        $this->image = '';
        $this->writer = '';

        //jika sukses maka lakukan trigger emit dengan nama bookAdded
        $this->dispatch('bookAdded');
    }
}
