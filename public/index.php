<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>teste</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
</head>

<body>
<main>
    <?php if(isset($_GET['pagina'])) {
        $do = $_GET['pagina'];
       }else {
            $do = 'login';
       }
       include 'C:\xampp\htdocs/posts-memes/app/view/templates/'.$do.'.php';

       ?>
         </main>
</body>
</html>