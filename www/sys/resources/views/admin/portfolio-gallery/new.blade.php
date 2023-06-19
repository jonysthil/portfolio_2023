<form name="modelForm" action="{{ route('portfolio.gallery.new', $proyect->prt_id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left modal-errors" id="portfolio-new-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">New image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pg_name">Choose Image<span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('pg_name') is-invalid @enderror" id="pg_name" name="pg_name">
                        @error('pg_name') <span class="text-danger">{!! $message !!}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="la la-times font-medium-1"></i> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="la la-save font-medium-1"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>