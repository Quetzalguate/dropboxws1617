<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <!-- Preloader Start -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <style>
        body{
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
        }

        .loader{
            height: 10px;
            background-color: #000;
            position: absolute;
        }

        .content{
            text-align: center;
            height: 100vh;
            width: 100%;
            background: #fff;
            display: none;
        }
    </style>
    <!-- Preloader Ende -->
</head>

<!-- Preloader Start -->
<div class="loader"></div>
<!-- Preloader Ende -->

<body>
<script>
    function loaderSpinner() {
        $(window).load(function() {
            var loader = $('.loader');
            var wHeight = $(window).height();
            var wWidth = $(window).width();
            var i = 0;
            /*Center loader on half screen */
            loader.css({
                top: wHeight / 2 - 2.5,
                left: wWidth / 2 - 200
            })

            do{
                loader.animate({
                    width: i
                },10)
                i+=3;
            } while(i <= 400)
            if(i === 402){
                loader.animate({
                    left: 0,
                    width: '100%'
                })
                loader.animate({
                    top: '0',
                    height: '100vh'
                })
            }

            /* This line hide loader and show content */
            setTimeout(function(){
                $('.content').fadeIn("slow");
                (loader).fadeOut("fast");
                /*Set time in milisec */
            },3500);
        });

    }

    loaderSpinner();
</script>
</body>
</html>