@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Projects</div>

                    <div class="panel-body">
                        @if(!empty($projects))
                            <table class="table">
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td><h3>{{ $project->name }}</h3></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <a href="{{route('projects.create')}}" class="btn btn-info">➕</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
