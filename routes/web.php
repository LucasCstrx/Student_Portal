<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
      $samples = [
        1 => ['name' => 'Christian Jay', 'email' => 'chan@example.com', 'course' => 'Bachelor of Science in Information Technology', 'year' => '2'],
        2 => ['name' => 'Maria Carissa', 'email' => 'maria@example.com', 'course' => 'Bachelor of Secondary Education', 'year' => '2'],
        3 => ['name' => 'Jose Rizal', 'email' => 'jose@example.com', 'course' => 'Bachelor of Information Technology', 'year' => '4'],
        4 => ['name' => 'Juan Tamad', 'email' => 'juan@example.com', 'course' => 'Bachelor of Science in Nursing', 'year' => '1'],
        5 => ['name' => 'James Castro', 'email' => 'james@example.com', 'course' => 'Bachelor of Science in Medical Laboratories', 'year' => '2'],
        6 => ['name' => 'Erleen Ansing', 'email' => 'erleen@example.com', 'course' => 'Bachelor of Science in Nursing', 'year' => '2'],
        7 => ['name' => 'Leo Labis', 'email' => 'leo@example.com', 'course' => 'Bachelor of Science in Medical Laboratories', 'year' => '2'],
        8 => ['name' => 'Carlito Camajalan', 'email' => 'carlito@example.com', 'course' => 'Bachelor of Science in Electrical Engineer', 'year' => '4'],
        9 => ['name' => 'Lance Antipaso', 'email' => 'lance@example.com', 'course' => 'Bachelor of Science in Maritime', 'year' => '3'],
        10 => ['name' => 'Adrian Yu', 'email' => 'adrian@example.com', 'course' => 'Bachelor of Science in Maritime', 'year' => '2'],
        11 => ['name' => 'Keannice Loque', 'email' => 'keannice@example.com', 'course' => 'Bachelor of Science in Secondary Education', 'year' => '2'],
        12 => ['name' => 'Sultan Abdullah', 'email' => 'sultan@example.com', 'course' => 'Bachelor of Science in Accountancy', 'year' => '2'],
    ];
    return view('students.index', ["samples" => $samples]);
});

// Show create form
Route::get('/students/create', function () {
    return view('students.create');
});

// Show student details (static sample data)
Route::get('/students/{id}', function ($id) {
    $samples = [
        1 => ['name' => 'Christian Jay', 'email' => 'chan@example.com', 'course' => 'Bachelor of Science in Information Technology', 'year' => '2'],
        2 => ['name' => 'Maria Carissa', 'email' => 'maria@example.com', 'course' => 'Bachelor of Secondary Education', 'year' => '2'],
        3 => ['name' => 'Jose Rizal', 'email' => 'jose@example.com', 'course' => 'Bachelor of Information Technology', 'year' => '4'],
        4 => ['name' => 'Juan Tamad', 'email' => 'juan@example.com', 'course' => 'Bachelor of Science in Nursing', 'year' => '1'],
        5 => ['name' => 'James Castro', 'email' => 'james@example.com', 'course' => 'Bachelor of Science in Medical Laboratories', 'year' => '2'],
        6 => ['name' => 'Erleen Ansing', 'email' => 'erleen@example.com', 'course' => 'Bachelor of Science in Nursing', 'year' => '2'],
        7 => ['name' => 'Leo Labis', 'email' => 'leo@example.com', 'course' => 'Bachelor of Science in Medical Laboratories', 'year' => '2'],
        8 => ['name' => 'Carlito Camajalan', 'email' => 'carlito@example.com', 'course' => 'Bachelor of Science in Electrical Engineer', 'year' => '4'],
        9 => ['name' => 'Lance Antipaso', 'email' => 'lance@example.com', 'course' => 'Bachelor of Science in Maritime', 'year' => '3'],
        10 => ['name' => 'Adrian Yu', 'email' => 'adrian@example.com', 'course' => 'Bachelor of Science in Maritime', 'year' => '2'],
        11 => ['name' => 'Keannice Loque', 'email' => 'keannice@example.com', 'course' => 'Bachelor of Science in Secondary Education', 'year' => '2'],
        12 => ['name' => 'Sultan Abdullah', 'email' => 'sultan@example.com', 'course' => 'Bachelor of Science in Accountancy', 'year' => '2'],
    ];
    $student = $samples[$id] ?? ['name' => 'Unknown', 'email' => 'unknown@example.com', 'course' => '-', 'year' => '-'];

    return view('students.show', compact('student'));
});



// Edit student
Route::get('/students/{id}/edit', function ($id) {
    return view('students.edit', compact('id'));
});

