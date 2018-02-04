@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new project</div>

                    <div class="panel-body">
                        <form action="{{route('projects.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Project name:</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
