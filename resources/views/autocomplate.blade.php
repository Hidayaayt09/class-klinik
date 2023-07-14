<!DOCTYPE html>
<html>
<head>
    <title>Laravel Autocomplete Search With Jquery UI Example</title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha256-IdfIcUlaMBNtk4Hjt0Y6WMMZyMU0P9PN/pH+DFzKxbI=" crossorigin="anonymous" />
    <!-- Script -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1/jquery-ui.css') }}">
    <script src="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1/jquery-ui.js') }}"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10 offset-1 text-center">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3>Laravel Autocomplete Search With Jquery UI Example - Nicesnippets.com</h3>
                    </div>
                    <div class="card-body" style="height: 210px;">
                        <input type="text" id='employee_search' placeholder="--search--">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){
            $( "#employee_search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('Autocomplte.getAutocomplte')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    $('#employee_search').val(ui.item.label);
                    $('#employeeid').val(ui.item.value);
                    return false;
                }
            });
        });
    </script>
</body>
</html>
