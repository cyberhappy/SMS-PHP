<?php

return [
    'student_info' => [
        'headers' => ['ID', 'Name', 'Email', 'Phone'],
        'columns' => ['id', 'name', 'email', 'phone']
    ],
    'exam_results' => [
        'headers' => ['Student ID', 'Course Code', 'Course Name', 'Score', 'Semester', 'Exam Date'],
        'columns' => ['student_id', 'course_code', 'course_name', 'score', 'semester', 'exam_date']
    ]
];
