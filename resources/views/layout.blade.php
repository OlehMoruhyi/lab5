<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1.0, user-scalable=0, min-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>DnD</title>

    <link rel="stylesheet" href="Styles.css">
    <script src="{{ asset("/js/jquery-3.6.0.min.js") }}"></script>
</head>



<!DOCTYPE html>
<html lang="en">
  <head>

      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>dnd</title>
      <link rel="icon" href={{ asset("/images/Globals/other/favicon.svg") }} />
      <link rel="stylesheet" href={{ asset("/css/Styles.css") }} />
      <script src="js/jquery-3.6.0.min.js"></script>
  </head>
  <body>

  <div class =wrapper>

    @include("partial.header")
    @yield("content")
  </div>

    <script>
        $( ".header_burger" ).click(function () {
            $(".header_burger,.header_menu" ).toggleClass("active");
            $("body" ).toggleClass("lock");
        });

        $( ".block3" ).click(function () {
            $current = "images/useless/image%201%20("+$(this).attr("id")+").png";
            $txt ="<br>"+ $(this).text();

            $(".overlay img" ).attr('src',$current );
            $(".overlay" ).addClass("active");
            $("body" ).addClass("lock1");
            console.log("target:", $txt);
            $(".overlay h" ).html($txt);

        });
        $( ".img_close" ).click(function () {
            $(".overlay" ).removeClass("active");
            $("body" ).removeClass("lock1");

            $(".overlay h" ).empty();
        });
    </script>
  </body>
</html>
