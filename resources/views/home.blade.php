@section('content')
@extends('layouts.app')
<div class="container">
    <div class="row">
        <h3><i class="fas fa-project-diagram    "></i> Projects</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        @if (Auth::user()->role == 'admin')
                        <th>Edit</th>
                        <th>Delete</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pro as $val)
                    <tr>
                        <td scope="row">{{$val->name}}</td>
                        <td>{{$val->description}}</td>
                        <td>{{$val->start_date}}</td>
                        <td>{{$val->end_date}}</td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <form action="{{ url('/project/edit',$val->id) }}" method="get">
                                <button type="submit" name="" id="" class="btn btn-success" role="button"><i class="fas fa-edit"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('/project/delete',$val->id) }}" method="get">
                                <button type="submit" name="" id="" class="btn btn-danger" role="button"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    Add <i class="fas fa-plus-circle"></i>
            </button>        
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Add Project</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                    <form action="{{ url('/project/add') }}" method="get">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input required type="text" name="name" id="name" class="form-control" placeholder="name"
                                                aria-describedby="name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input required type="text" name="description" id="description" class="form-control"
                                                placeholder="description" aria-describedby="description">
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input required type="date" name="start_date" id="start_date" class="form-control datepicker"
                                                placeholder="start date" aria-describedby="start_date">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input  required type="date" name="end_date" id="end_date" class="form-control datepicker"
                                                placeholder="end date" aria-describedby="end_date">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="id-clien">Client</label>
                                            <select name="idclient" class="form-control" aria-describedby="id-client" id="id-client">
                                                <option disabled selected>Select one</option>
                                                @foreach ($clients as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" role="button">Save <i class="fas fa-edit"></i></button>
                                    </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
