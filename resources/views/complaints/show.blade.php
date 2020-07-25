
@extends('layouts.app')
@section('content')
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
@endsection