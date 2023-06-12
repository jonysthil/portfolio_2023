<form action="{{ route('category.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pc_name">Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('pc_name') is-invalid @enderror" name="pc_name" id="pc_name" value="{{ old('pc_name') }}">
                @error('pc_name') <span class="text-danger">{!! $message !!}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-sm btn-danger"><i class="la la-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="la la-save"></i> Save Category</button>
                </div>
            </div>
        </div>
    </div>
</form>