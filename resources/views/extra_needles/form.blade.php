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
                                <label>Retrieved Date *</label>
                                <input type="date" name="retrieved_date" class="form-control" id="retrieved_date" required>
                            </div>
                            
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
                                <label>Submitted EPF *</label>
                                <input type="text" name="submitted_epf" class="form-control" id="submitted_epf" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Section (Submitted) *</label>
                                <input type="text" name="section_submitted" class="form-control" id="section_submitted" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Delivery Date *</label>
                                <input type="date" name="delivery_date" class="form-control" id="delivery_date" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Retrieved EPF *</label>
                                <input type="text" name="retrieved_epf" class="form-control" id="retrieved_epf" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Section (Retrieved) *</label>
                                <input type="text" name="section_retrieved" class="form-control" id="section_retrieved" required>
                            </div>
                            
                            <div class="form-group">
                                <label>New Machine Number</label>
                                <input type="text" name="new_machine_number" class="form-control" id="new_machine_number">
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