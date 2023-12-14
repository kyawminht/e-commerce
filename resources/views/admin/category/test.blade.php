<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Name Form</title>
</head>
<body>

<h2>Enter Your Name</h2>

<form action="{{ route('test.store') }}" method="POST">
@csrf <!-- Include this line for CSRF protection in Laravel -->

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
