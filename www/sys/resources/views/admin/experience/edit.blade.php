@extends('layouts.layout')

@section('title', 'Edit Experience')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Experience</h4>             
            </div>
            <div class="card-content">
                <div class="card-body">

                    <form action="{{ route('experience.update', $experience->exp_id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exp_title">Title<span class="text-danger">*</span></label>
                                    <input type="text" id="exp_title" name="exp_title" value="{{ old('exp_title', $experience->exp_title) }}" class="form-control @error('exp_title') is-invalid @enderror">
                                    @error('exp_title') <span class="text-danger">{!! $message !!}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exp_month_start">Start month and year</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control @error('exp_month_start') is-invalid @enderror" name="exp_month_start" id="exp_month_start">
                                                @for ($i = 0; $i <= 11; $i++)
                                                    <option {{ (old('exp_month_start', $experience->exp_month_start) == $i) ? 'selected' : '' }} value='{{ $i }}'>{{ Tools::months($i) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control @error('exp_year_start') is-invalid @enderror" name="exp_year_start" id="exp_year_start">
                                                @for ($j = date('Y'); $j >= 1800; $j--)
                                                    <option {{ (old('exp_year_start', $experience->exp_year_start) == $j) ? 'selected' : '' }} value="{{ $j }}">{{ $j }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exp_month_finish">Finish month and year</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control @error('exp_month_finish') is-invalid @enderror exp_month_finish" name="exp_month_finish" id="exp_month_finish" {{ (old('exp_current', $experience->exp_current)) ? 'disabled' : '' }}>
                                                @for ($i = 0; $i <= 11; $i++)
                                                    <option {{ (old('exp_month_finish', $experience->exp_month_finish) == $i) ? 'selected' : '' }} value='{{ $i }}'>{{ Tools::months($i) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control @error('exp_year_finish') is-invalid @enderror exp_year_finish" name="exp_year_finish" id="exp_year_finish" {{ (old('exp_current', $experience->exp_current)) ? 'disabled' : '' }}>
                                                @for ($j = date('Y'); $j >= 1800; $j--)
                                                    <option {{ (old('exp_year_finish', $experience->exp_year_finish) == $j) ? 'selected' : '' }} value="{{ $j }}">{{ $j }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">At present</label>
                                            <input class="activeLastDate" name="exp_current" id="exp_current" type="checkbox" {{ (old('exp_current', $experience->exp_current)) ? 'checked' : '' }} >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exp_description">Description<span class="text-danger">*</span></label>
                                    <textarea id="exp_description" rows="5" class="form-control @error('exp_description') is-invalid @enderror" name="exp_description">{{ old('exp_description', $experience->exp_description) }}</textarea>
                                    @error('exp_description') <span class="text-danger">{!! $message !!}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-danger">* Campos requeridos.</small>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('experience.detail', $experience->exp_id) }}" class="btn btn-sm btn-danger">
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