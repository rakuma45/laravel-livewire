<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BookIndex;

Route::get('/', BookIndex::class);
