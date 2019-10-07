@section('content')
@extends('layouts.app')
<div class="container">
    <div class="row">
        <h3><i class="fas fa-project-diagram    "></i> Projects</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{ url('/project/update/'.$project->id) }}" method="get">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$project->name}}" required type="text" name="name" id="name" class="form-control" placeholder="name"
                        aria-describedby="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input value="{{$project->description}}" required type="text" name="description" id="description" class="form-control"
                        placeholder="description" aria-describedby="description">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input value="{{$project->start_date}}" required type="date" name="start_date" id="start_date" class="form-control datepicker"
                        placeholder="start date" aria-describedby="start_date">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input value="{{$project->end_date}}" required type="date" name="end_date" id="end_date" class="form-control datepicker"
                        placeholder="end date" aria-describedby="end_date">
                </div>

                <div class="form-group">
                    <label for="id-clien">Client</label>
                    <select name="idclient" class="form-control" aria-describedby="id-client" id="id-client">
                        <option disabled selected>Select one</option>
                        @foreach ($clients as $c)
                        @if($c->id == $project->id_client)
                        <option value="{{$c->id}}" disabled selected>{{$c->name}}</option>
                        @else
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" role="button">Edit <i class="fas fa-edit"></i></button>
            </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
@endsection
