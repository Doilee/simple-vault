<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>URL</th>
                <th>Username</th>
                <th>Password</th>
                <tH>Options</tH>
            </tr>
            </thead>
            <tbody>
                <tr v-for="entry in entries">
                    <td>{{ entry.id }}</td>
                    <td><a v-bind:href="entry.url">{{ entry.url }}</a></td>
                    <td>{{ entry.username }}</td>
                    <td class="protection-shade">{{ entry.password }}</td>
                    <td>
                        <button class="glyphicon glyphicon-edit btn btn-info btn-xs" @click.prevent="editEntry(entry)"></button>
                        <form method="POST" v-bind:action="url + entry.id" style="display: inline-block">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="$csrf_token">
                            <button type="submit" class="glyphicon btn btn-danger btn-xs glyphicon-trash"></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

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
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" :value="$csrf_token">

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
    </div>
</template>

<script>
    export default {
        props: ['entries', 'url'],
        data() {
            return {
                fillEntry: {'id': '', 'url':'','username':'','password':''}
            }
        },
        methods: {
            editEntry: function(entry) {
                this.fillEntry.id = entry.id;
                this.fillEntry.url = entry.url;
                this.fillEntry.username = entry.username;
                this.fillEntry.password = entry.password;
                $("#edit-item").modal('show');
            }
        }
    }
</script>