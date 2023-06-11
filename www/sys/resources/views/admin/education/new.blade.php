@extends('layouts.layout')

@section('title', 'New Education')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Education</h4>             
            </div>
            <div class="card-content">
                <div class="card-body">

                    <form action="{{ route('education.save') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edu_place">Place<span class="text-danger">*</span></label>
                                    <input type="text" id="edu_place" name="edu_place" value="{{ old('edu_place') }}" class="form-control @error('edu_place') is-invalid @enderror">
                                    @error('edu_place') <span class="text-danger">{!! $message !!}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edu_title">Title<span class="text-danger">*</span></label>
                                    <input type="text" id="edu_title" name="edu_title" value="{{ old('edu_title') }}" class="form-control @error('edu_title') is-invalid @enderror">
                                    @error('edu_title') <span class="text-danger">{!! $message !!}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="edu_month_start">Start month and year</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control @error('edu_month_start') is-invalid @enderror" name="edu_month_start" id="edu_month_start">
                                                @for ($i = 0; $i <= 11; $i++)
                                                    <option {{ (old('edu_month_start') == $i) ? 'selected' : '' }} value='{{ $i }}'>{{ Tools::months($i) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control @error('edu_year_start') is-invalid @enderror" name="edu_year_start" id="edu_year_start">
                                                @for ($j = date('Y'); $j >= 1800; $j--)
                                                    <option {{ (old('edu_year_start') == $j) ? 'selected' : '' }} value="{{ $j }}">{{ $j }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="edu_month_finish">Finish month and year</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control @error('edu_month_finish') is-invalid @enderror date_month_finish" name="edu_month_finish" id="edu_month_finish" {{ (old('edu_current')) ? 'disabled' : '' }}>
                                                @for ($i = 0; $i <= 11; $i++)
                                                    <option {{ (old('edu_month_finish') == $i) ? 'selected' : '' }} value='{{ $i }}'>{{ Tools::months($i) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control @error('edu_year_finish') is-invalid @enderror date_year_finish" name="edu_year_finish" id="edu_year_finish" {{ (old('edu_current')) ? 'disabled' : '' }}>
                                                @for ($j = date('Y'); $j >= 1800; $j--)
                                                    <option {{ (old('edu_year_finish') == $j) ? 'selected' : '' }} value="{{ $j }}">{{ $j }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">At present</label>
                                            <input class="activeLastDate" name="edu_current" id="edu_current" type="checkbox" {{ (old('edu_current')) ? 'checked' : '' }} >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="edu_description">Description<span class="text-danger">*</span></label>
                                    <textarea id="edu_description" rows="5" class="form-control @error('edu_description') is-invalid @enderror" name="edu_description">{{ old('edu_description') }}</textarea>
                                    @error('edu_description') <span class="text-danger">{!! $message !!}</span> @enderror
                                </div>
                            </div>
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