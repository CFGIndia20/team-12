<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#search').on("keyup",function(){
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });
    });

</script>


<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Complaints Data</h4>
                                    <p class="card-category">. .  . . . . . . . . . . . . . . .</p>
                                </div>
                                <input type="text" class="form-controller" id="search" name="search">
                                <div class="card-body table-full-width table-responsive">

                                    <table  class="table table-hover table-striped">
                                        <thead>
                                            <th>Complaint Id</th>
                                            <th>Category Id</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Complaint Status Id</th>
                                            <th class="no-filter">View</th>

                                        </thead>
                                         <tbody id='myTable'>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                            <td><a style="color: black" href="/complaints/{{$complaint->id}}">{{$complaint->id}}</a></td>
                                            <td><a style="color: black" href="/complaints/{{$complaint->id}}">{{$complaint->category_id}}</a></td>
                                            <td><a style="color: black" href="/complaints/{{$complaint->id}}">{{$complaint->location}}</a></td>
                                            <td><a style="color: black" href="/complaints/{{$complaint->id}}">{{$complaint->description}}</a></td>
                                            <td><a style="color: black" href="/complaints/{{$complaint->id}}">{{$complaint->complaint_status_id}}</a></td>
                                            <td><a href='/complaints/{{$complaint->id}}'><button style="cursor:pointer" class='btn btn-info btn-fill'>View</button></a></td>
                                            </tr>
                                        @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $complaints->links() }}
                </div>
            </div>
</body>
</html>
