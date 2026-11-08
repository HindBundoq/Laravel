<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>

    <h2>Name</h2>
    <p>{{ $name }}</p>

    <h2>Skills</h2>
    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    <h2>Course</h2>
    <p>Title: {{ $course->title }}</p>
    <p>Academy: {{ $course->academy }}</p>
    <p>Track: {{ $course->track }}</p>

</body>
</html>
