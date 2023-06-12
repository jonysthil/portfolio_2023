<form action="{{ route('skill.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="sk_title">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sk_title') is-invalid @enderror" name="sk_title" id="sk_title" value="{{ old('sk_title') }}">
                @error('sk_title') <span class="text-danger">{!! $message !!}</span> @enderror
            </div>
            <div class="form-group">
                <label for="sk_image">Choose Image<span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('sk_image') is-invalid @enderror" id="sk_image" name="sk_image">
                @error('sk_image') <span class="text-danger">{!! $message !!}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-sm btn-danger"><i class="la la-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="la la-save"></i> Save Skill</button>
                </div>
            </div>
        </div>
    </div>
</form>