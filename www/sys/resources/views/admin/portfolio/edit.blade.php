@extends('layouts.layout')

@section('title', 'Portfolio')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Proyect</h4>             
            </div>
            <div class="card-content">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('portfolio.update', $proyect->prt_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prt_title">Title<span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('prt_title', $proyect->prt_title) }}" name="prt_title" id="prt_title" class="form-control @error('prt_title') is-invalid @enderror">
                                            @error('prt_title') <span class="text-danger">{!! $message !!}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prt_date">Date of delivery<span class="text-danger">*</span></label>
                                            <input type="date" value="{{ old('prt_date', $proyect->prt_date->format('Y-m-d')) }}" name="prt_date" id="prt_date" class="form-control @error('prt_date') is-invalid @enderror">
                                            @error('prt_date') <span class="text-danger">{!! $message !!}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prt_description">Description</label>
                                            <textarea name="prt_description" id="prt_description" class="form-control" rows="5">{{ old('prt_description', $proyect->prt_description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="text-danger">* Campos requeridos.</small>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('portfolio.detail', $proyect->prt_id) }}" class="btn btn-sm btn-danger">
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
    </div>
</div>


@include('admin/service/delete')

@endsection