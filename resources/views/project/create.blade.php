@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Project</div>

                    <div class="panel-body">
                        <form method="post" action="{{ route('project.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                <label for="client_id" class="col-md-4 control-label">Client</label>

                                <div class="col-md-6">
                                    <select name="client_id" class="form-control">
                                        @foreach ($clients as $id => $client)
                                        <option value="{{ $id }}">{{ $client }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('client_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <label for="deskripsi" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>

                                    @if ($errors->has('deskripsi'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
