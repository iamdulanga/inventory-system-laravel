<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                
                    <div class="box-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <span class="help-block with-errors"></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Password (leave blank to keep current)</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
