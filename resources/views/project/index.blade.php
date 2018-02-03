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
                                <thead>
                                <tr>
                                    <th>Projects name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
