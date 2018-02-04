@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My projects</div>

                    <div class="panel-body">
                        @if(!empty($projects))
                            <table class="table">
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td><h3>{{ $project->name }}</h3></td>
                                        <td class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false" aria-haspopup="true">
                                                <h3>&#8226;&#8226;&#8226;</h3>
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a href="" class="text-warning" onclick="event.preventDefault();
                                                            document.getElementById('delete-form-{{$project->id}}').submit();">delete</a>

                                                    <form id="delete-form-{{$project->id}}"
                                                          action="{{ route('projects.destroy',['project'=>$project->id]) }}"
                                                          method="post"
                                                          style="display: none;">
                                                        {{method_field('delete')}}
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
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
