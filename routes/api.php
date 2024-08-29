<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $contacts = Contact::all();
    return $contacts;
});
