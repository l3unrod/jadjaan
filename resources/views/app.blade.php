<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
</head>
<body>
    <header>
        <h1>Welcome to My App</h1>
    </header>

    <!-- ใช้ @yield สำหรับเนื้อหาจาก section ต่างๆ -->
    <main>
        @yield('content') <!-- แสดงเนื้อหาจาก @section('content') -->
    </main>
</body>
</html>
