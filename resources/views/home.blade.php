@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create a new Vault entry
                        @if ($errors->has('create'))
                            <span class="help-block">
                                <strong>{{ $errors->first('delete') }}</strong>
                            </span>
                        @endif
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/entries') }}">
                        {{ csrf_field() }}

                        @if ($errors->has('url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <div class="form-group">
                            <label for="url" class="col-md-4 control-label">URL</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control" name="url" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="password" value="{{ str_random() }}" onfocus="this.select();" required>
                            </div>
                        </div>
                        @if ($errors->has('passwords'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">Vault Data
                        @if ($errors->has('delete'))
                            <span class="help-block">
                                <strong>{{ $errors->first('delete') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('update'))
                            <span class="help-block">
                                <strong>{{ $errors->first('update') }}</strong>
                            </span>
                        @endif
                    </div>
                    <entries :entries="{{ json_encode($entries) }}" url="{{ url('entries') . '/' }}"></entries>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
