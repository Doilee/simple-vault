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

<!-- Edit Entry Modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
            </div>
            <div class="modal-body">

                <form method="POST" v-bind:action="url + fillEntry.id" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="url">Title:</label>
                        <input type="url" name="url" class="form-control" v-model="fillEntry.url"/>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" v-model="fillEntry.username" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" class="form-control" v-model="fillEntry.password"/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Table Template -->
<div style="display: none">
    <template id="tasks-template" style="display: none">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>URL</th>
                <th>Username</th>
                <th>Password</th>
                <th>Author</th>
                <tH>Options</tH>
            </tr>
            </thead>
            <tbody>
                <tr v-for="entry in entries">
                    <td>@{{ entry.id }}</td>
                    <td><a v-bind:href="entry.url">@{{ entry.url }}</a></td>
                    <td>@{{ entry.username }}</td>
                    <td class="protection-shade">@{{ entry.password }}</td>
                    <td>@{{ entry.author.name }}</td>
                    <td>
                        <button class="glyphicon glyphicon-edit btn btn-info btn-xs" @click.prevent="editEntry(entry)"></button>
                        <form method="POST" v-bind:action="url + entry.id" style="display: inline-block">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="glyphicon btn btn-danger btn-xs glyphicon-trash"></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </template>
</div>
@endsection
