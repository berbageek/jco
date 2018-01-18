@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Project List</div>

                    <div class="panel-body">

                        @can('create', \App\Model\Project::class)
                        <a href="{{ route('project.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Tambah Baru</a>
                        @endcan

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Project</th>
                                <th>Klien</th>
                                <th>Deskripsi</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->nama }}</td>
                                <td>{{ $project->client->nama }}</td>
                                <td>{{ $project->deskripsi }}</td>
                                <td>
                                    <a href="" class="btn btn-default">Show</a>

                                    @can('update', $project)
                                    <a href="{{ route('project.edit', $project) }}" class="btn btn-default">Edit</a>
                                    @endcan

                                    @can('destroy', $project)
                                    <a href="" class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
