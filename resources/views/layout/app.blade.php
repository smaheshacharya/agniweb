<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    @php
        $title =  setting('site.title');
        $description = setting('site.description');
        $image = Voyager::image(setting('site.logo'));
    @endphp
    <title>@yield('title',$title )</title>
    <meta name="description" content="@yield('meta_description',$description)">
    <meta name="keywords" content="Agni Hospitality, Agni">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="@yield('title',$title)" />
	<meta property="og:description" content="@yield('meta_description',$description)" />
	<meta property="og:url" content="{{url()->current()}}" />
	<meta property="og:site_name" content="Agni Hospitality" />
	<meta property="og:image" content="@yield('image',$image)" />





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
    <link rel="stylesheet" href={{asset("css/custom.css")}} type="text/css">
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

        $("#country").keyup(function(){
             var query = $(this).val();
             if(query != '')
             {
                 $.ajax({
                     url :"{{route('autocomplete.fetch')}}",
                     method:"POST",
                     data:{query:query, _token:'{{ csrf_token() }}'},
                     success:function(data)
                     {
                         $('#countryList').fadeIn();
                         $('#countryList').html(data)

                     }
                 })
             }
        });
        $(document).on('click','li', function(){
            $('#country').val($(this).text());
            $('#countryList').fadeOut();
        });

</script>

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
                        window.location.href = '/cart';
                    }
                });
            }
        });
    </script>
    <script>
        function generatePDF() {
            // console.log("hello")
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("invoice");
        // Choose the element and save the PDF for our user.
        html2pdf().from(element).save();
        }

    </script>
    <script>
    // $("#esewa_tran").hide();
    // $("#esewa").click(function() {
    //     $("#esewa_tran").show();
    //     // $("#" + test).show();
    // });
    $("div.tran").hide();
    $("input[name$='payment']").click(function() {
        var test = $(this).val();
        $("div.tran").hide();
        $("#" + test).show();
    });
    </script>
<script>


  function SetBilling(checked) {
            if (checked) {
                      document.getElementById('ship_fullname').value = document.getElementById('fullname').value;
                      document.getElementById('ship_address').value = document.getElementById('address').value;
                      document.getElementById('ship_city').value = document.getElementById('city').value;
                      document.getElementById('ship_state').value = document.getElementById('state').value;
                      document.getElementById('ship_post_code').value = document.getElementById('post_code').value;
                      document.getElementById('ship_country').value = document.getElementById('country').value;
                      document.getElementById('ship_phone').value = document.getElementById('phone').value;
            } else {
                      document.getElementById('ship_fullname').value = '';
                      document.getElementById('ship_address').value = '';
                      document.getElementById('ship_city').value = '';
                      document.getElementById('ship_state').value = '';
                      document.getElementById('ship_post_code').value = '';
                      document.getElementById('ship_country').value = '';
                      document.getElementById('ship_phone').value = '';
            }
  }


</script>
<script>
    $("document").ready(function(){
    setTimeout(function(){
        $("div.alert-block").fadeOut('slow');
    }, 3000 );

});

</script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=1080434395665706&autoLogAppEvents=1" nonce="DSDOYNk2"></script>


</body>

</html>
