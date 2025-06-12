<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-item" method="post" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date *</label>
                                <input type="date" name="date" class="form-control" id="date" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Employee EPF *</label>
                                <input type="text" name="employee_epf" class="form-control" id="employee_epf" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Job Number *</label>
                                <input type="text" name="job_number" class="form-control" id="job_number" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Section *</label>
                                <input type="text" name="section" class="form-control" id="section" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Needle Type *</label>
                                <input type="text" name="needle_type" class="form-control" id="needle_type" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Needle Size *</label>
                                <input type="text" name="needle_size" class="form-control" id="needle_size" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Machine Number *</label>
                                <input type="text" name="machine_number" class="form-control" id="machine_number" required>
                            </div>
                            
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="all_parts_traced" id="all_parts_traced" value="1">
                                        All Parts Traced?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Needle Type</label>
                                <input type="text" name="new_needle_type" class="form-control" id="new_needle_type">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Needle Size</label>
                                <input type="text" name="new_needle_size" class="form-control" id="new_needle_size">
                            </div>
                        </div>
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