<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
    This is the Customer header_remove
    

    <form action="{{route('logout')}}"method="POST">
        @csrf

        <button>Logout</button>
    </form>
</div>
</body>
</html>