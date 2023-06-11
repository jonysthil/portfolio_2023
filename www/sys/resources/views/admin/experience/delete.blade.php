<form name="modelForm" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
<div class="modal fade text-left" id="experience-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger" id="myModalLabel1">Delete Experience</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete the experience?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="la la-times font-medium-1"></i> Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger"><i class="la la-trash font-medium-1"></i> Delete</button>
            </div>
        </div>
    </div>
</div>
</form>