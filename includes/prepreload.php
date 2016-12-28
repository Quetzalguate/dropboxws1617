<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <!-- Preloader Start -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <style>

    </style>
    <!-- Preloader Ende -->
</head>

<!-- Preloader Start -->
<div class="loader"></div>
<!-- Preloader Ende -->

<body>

<div class="preload">
    <?php include ("/preloader.php"); ?>
</div>

<script>
    $(function() {
        $(".preload").fadeOut(2000, function() {
            $(".content").fadeIn(1000);
        });
    });​
</script>
</body>
</html>