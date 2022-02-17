<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>

<body>
    @include('includes.header-nav')

    @yield('content')

    @include('includes.footer')

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

    <!-- NOTY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>

    <script type="text/javascript">
        @if(Session::has('success')) 
            new Noty({ 
                type:'success', 
                layout:'bottomLeft', 
                text: '{{ Session::get('success') }}', 
                timeout: 5000
            }).show(); 
        @endif

        @if(Session::has('info')) 
            new Noty({ 
                type:'info', 
                layout:'bottomLeft', 
                text: '{{ Session::get('info') }}', 
                timeout: 5000
            }).show(); 
        @endif

        @if(Session::has('error')) 
            new Noty({ 
                type:'error', 
                layout:'bottomLeft', 
                text: '{{ Session::get('error') }}', 
                timeout: 5000
            }).show(); 
        @endif

        @if(Session::has('warning')) new Noty({ 
                type:'warning', 
                layout:'bottomLeft', 
                text: '{{ Session::get('warning') }}', 
                timeout: 5000
            }).show(); 
        @endif
    </script>

    <script type="text/javascript">
        
            var maxField = 10; //Input fields increment limitation
            var addButton = $('#add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div><div class="d-md-flex pd-y-20 pd-md-y-0" style="margin-top:10px;"><input type="text" id="size" name="size[]" class="form-control" placeholder="Size" required><input type="text" id="color" name="color[]" class="form-control" placeholder="Color" required><a href="javascript:void(0);" class="btn btn-danger pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0 remove_button">Remove</a></div></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        
    </script>
</body>