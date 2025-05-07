<?php

namespace App\Models;

class classroom {
    protected static $data = [
        'students' => [
            ['name' => 'Mr. A', 'age' => 20, 'id' => 1],
            ['name' => 'Mr. B', 'age' => 30, 'id' => 2],
            ['name' => 'Mr. C', 'age' => 40, 'id' => 3]
        ],
        'teachers' => [
            ['name' => 'Mr. D', 'Subject' => 'Math', 'id' => 1],
            ['name' => 'Mr. E', 'Subject' => 'Science', 'id' => 2],
            ['name' => 'Mrs. F', 'Subject' => 'IT', 'id' => 3]
        ]
    ];

    // Students
    public static function getStudents() {
        return array_values(self::$data['students']);
    }

    public static function getStudentById($id) {
        foreach (self::$data['students'] as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    public static function createStudent($name, $age) {
        $id = count(self::$data['students']) + 1;
        $new = ['name' => $name, 'age' => $age, 'id' => $id];
        self::$data['students'][] = $new;
        return $new;
    }

    public static function updateStudent($id, $name, $age) {
        foreach (self::$data['students'] as $key => $student) {
            if ($student['id'] == $id) {
                self::$data['students'][$key]['name'] = $name;
                self::$data['students'][$key]['age'] = $age;
                return self::$data['students'][$key];
            }
        }
        return null;
    }

    public static function deleteStudentById($id) {
        foreach (self::$data['students'] as $key => $student) {
            if ($student['id'] == $id) {
                unset(self::$data['students'][$key]);
                return true;
            }
        }
        return false;
    }

    // Teachers
    public static function getTeachers() {
        return array_values(self::$data['teachers']);
    }

    public static function createTeacher($name, $subject) {
        $id = count(self::$data['teachers']) + 1;
        $new = ['name' => $name, 'Subject' => $subject, 'id' => $id];
        self::$data['teachers'][] = $new;
        return $new;
    }

    public static function updateTeacher($id, $name, $subject) {
        foreach (self::$data['teachers'] as $key => $teacher) {
            if ($teacher['id'] == $id) {
                self::$data['teachers'][$key]['name'] = $name;
                self::$data['teachers'][$key]['Subject'] = $subject;
                return self::$data['teachers'][$key];
            }
        }
        return null;
    }

    public static function deleteTeacherById($id) {
        foreach (self::$data['teachers'] as $key => $teacher) {
            if ($teacher['id'] == $id) {
                unset(self::$data['teachers'][$key]);
                return true;
            }
        }
        return false;
    }
}
