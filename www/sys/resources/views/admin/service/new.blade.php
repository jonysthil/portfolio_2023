@extends('layouts.layout')

@section('title', 'New Service')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Services</h4>             
            </div>
            <div class="card-content">
                <div class="card-body">

                    <form action="{{ route('service.save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="ser_name">Name<span class="text-danger">*</span></label>
                            <input type="text" id="ser_name" name="ser_name" class="form-control @error('ser_name') is-invalid @enderror" value="{{ old('ser_name') }}">
                            @error('ser_name') <span class="text-danger">{!! $message !!}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="ser_description">Description<span class="text-danger">*</span></label>
                            <textarea id="ser_description" rows="5" class="form-control @error('ser_description') is-invalid @enderror" name="ser_description">{{ old('ser_description') }}</textarea>
                            @error('ser_description') <span class="text-danger">{!! $message !!}</span> @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-danger">* Campos requeridos.</small>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('services') }}" class="btn btn-sm btn-danger">
                                    <i class="la la-times font-medium-1"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="la la-save font-medium-1"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection