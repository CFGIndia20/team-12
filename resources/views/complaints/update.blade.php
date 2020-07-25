@extends('layouts.app')
@section('content')
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../../assets/css/demo.css" rel="stylesheet" />
    <div class="wrapper">
        
        <div class="main-panel">
           
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update Complaint</h4>
                                </div>
                                <div class="card-body">

                                        <form method = "POST" action = "/complaints/{{$complaint->id}}">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Relief center id</label>
                                                    <label>{{$complaint->id}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>location</label>
                                                    <input type="text" name="location" value="{{ $complaint->location}}" class="form-control" placeholder='Location'>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md-12 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description</label>
                                                    <input type="textarea" name="description" value="{{ $complaint->description}}" class="form-control" placeholder='Description'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Complaint Status Id</label>
                                                    <input type="text" name="complaint_status_id" value="{{ $complaint->complaint_status_id}}" class="form-control" placeholder = 'Complaint status id'>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <input type="hidden" name="_method" value="put" />

                                        <input type="submit" value = "Update" class="btn btn-info btn-fill pull-right">
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection