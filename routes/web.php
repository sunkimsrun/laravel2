<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\classroom;

Route::get('/', function () {
    return view('welcome');
});

//1. get all students from the backend
Route::get('/students', function () {
    return response()->json(classroom::getStudents());
});

//2. post new student(create new student)
Route::post('/students', function () {
    $body = request()->json()->all();
    $student = classroom::createStudent($body['name'], $body['age']);
    return response()->json(['message' => 'Student created successfully', 'data' => $student], 201);
});

//3.delete existing student by id
Route::delete('/students/{id}', function ($id) {
    return classroom::deleteStudentById($id)
        ? response()->json(['message' => 'Student deleted'])
        : response()->json(['error' => 'Student not found'], 404);
});

//4.patch existing student by id
Route::patch('/students/{id}', function ($id) {
    $body = request()->json()->all();
    $student = classroom::updateStudent($id, $body['name'], $body['age'], email: $body['email']);
    return $student
        ? response()->json(['message' => 'Student updated', 'data' => $student])
        : response()->json(['error' => 'Student not found'], 404);
});

//5. get all teachers from the backend
Route::get('/teachers', function () {
    return response()->json(classroom::getTeachers());
});

//6. post new teacher(create new teacher)
Route::post('/teachers', function () {
    $body = request()->json()->all();
    $teacher = classroom::createTeacher($body['name'], $body['subject']);
    return response()->json(['message' => 'Teacher created successfully', 'data' => $teacher], 201);
});

//7. delete existing teacher by id
Route::delete('/teachers/{id}', function ($id) {
    return classroom::deleteTeacherById($id)
        ? response()->json(['message' => 'Teacher deleted'])
        : response()->json(['error' => 'Teacher not found'], 404);
});


//8.patch existing teacher by id
Route::patch('/teachers/{id}', function ($id) {
    $body = request()->json()->all();
    $teacher = classroom::updateTeacher($id, $body['name'], $body['subject']);
    return $teacher
        ? response()->json(['message' => 'Teacher updated', 'data' => $teacher])
        : response()->json(['error' => 'Teacher not found'], 404);
});