
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
    <div class="wrapper">
        
        <div class="main-panel">
           
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Complaint {{$complaint->id}}</h4>
                                </div>
                                <div class="card-body">


                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Compliant Sub Category : </label>
                                                    <label>{{$category[0]->id}}</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Compliant Category : </label>
                                                    <label>{{$category[0]->parent_id}}</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Category Name: </label>
                                                    <label>{{$category[0]->title}}</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description : </label>
                                                    <label>{{$complaint->description}}</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Complaint status Id : </label>
                                                    <label>{{$complaint->complaint_status_id}}</label>
                                                </div>
                                            </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location :</label>
                                                    <label>{{$complaint->location}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    <a href='/complaints/{{$complaint->id}}/edit'>
                                    <button class=' btn btn-info btn-fill pull-right'>Edit</button>
                                    </a>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>