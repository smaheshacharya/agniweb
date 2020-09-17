<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{setting('site.title')}}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
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
    @include('inc.message')
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
    <script src={{asset("js/html2pdf.bundle.js")}}></script>
    <script src={{asset("js/main.js")}}></script>


    <script>

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

        function generatePDF() {
            console.log("hello")
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("invoice");
        // Choose the element and save the PDF for our user.
        html2pdf().from(element).save();
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=1080434395665706&autoLogAppEvents=1" nonce="DSDOYNk2"></script>
    $(function() {
  var regExp = /[a-z]/i;
  $('#test').on('keydown keyup', function(e) {
    var value = String.fromCharCode(e.which) || e.key;

    // No letters
    if (regExp.test(value)) {
      e.preventDefault();
      return false;
    }
  });
});
</body>

</html>
