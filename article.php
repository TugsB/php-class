<?php
include 'include/function.php';


// Pridobi id podatke iz urlja ali nastavi na FALSE, če podatka ni.
$id = isset($_GET['id']) ? $_GET['id'] : FALSE;
//$id = $_GET['id'] ?? FALSE;
/*
 * Preveri, da id je in je ta numeričen, hkrati pa tudi preveri,
 * da imamo post s tem id-jem, drugače preusmeri uporabnika na 404 stran
 */
if(!is_numeric($id)) {
    header('Location: 404.php');
    die();
}
$post = getPost($id);
/*if(!$post){
    header('Location:404.php');
    die();
}*/
//$post = new Post;
//echo $post->izpisiCeloto();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title><?php echo $post->izpisiNaslov(); ?> - Agiledrop PHP-Masterclass</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Agiledrop PHP-Masterclass</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page content-->
<div class="container">
    <div class="row">
        <?php
        // Prikaži podatke posta.
        $post->izpisiCeloto();

        ?>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>

