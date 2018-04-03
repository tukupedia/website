<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nama Lengkap:</label>
            <input type="text" class="form-control" id="full_name" name="full_name">
        </div>

        <div class="form-group">
            <label for="email">Nomor Telepon:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html> 
