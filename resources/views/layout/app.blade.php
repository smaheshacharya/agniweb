<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
<link href={{ asset("https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap") }} rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css") }}  type="text/css">
    <link rel="stylesheet" href={{asset("css/font-awesome.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/elegant-icons.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/nice-select.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/jquery-ui.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/owl.carousel.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/slicknav.min.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("css/style.css")}} type="text/css">
</head>

<body>

    @include('inc.top-nav')
    @include('inc.nav')
    @include('inc.message');
    @yield('content')
    @include('inc.footer')


    <!-- Js Plugins -->
    <script src={{asset("js/jquery-3.3.1.min.js")}}></script>
    <script src={{asset("js/bootstrap.min.js")}}></script>
    <script src={{asset("js/jquery.nice-select.min.js")}}></script>
    <script src={{asset("js/jquery-ui.min.js")}}></script>
    <script src={{asset("js/jquery.slicknav.js")}}></script>
    <script src={{asset("js/mixitup.min.js")}}></script>
    <script src={{asset("js/owl.carousel.min.js")}}></script>
    <script src={{asset("js/main.js")}}></script>


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".item_quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
</body>

</html>
