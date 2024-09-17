<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\BookIndex;

Route::get('/', BookIndex::class);
