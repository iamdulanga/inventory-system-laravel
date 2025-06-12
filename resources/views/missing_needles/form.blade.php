<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label>Employee EPF</label>
                        <input type="text" name="employee_epf" class="form-control" id="employee_epf" required>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="section" class="form-control" id="section" required>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label>Broken Time</label>
                        <input type="time" name="broke_time" class="form-control" id="broke_time" required>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label>Release Time</label>
                        <input type="time" name="release_time" class="form-control" id="release_time">
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label>Request Letter (optional)</label>
                        <input type="file" name="request_letter" class="form-control-file" id="request_letter">
                        <span class="help-block with-errors"></span>
                        <div id="current-file" class="mt-2"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>