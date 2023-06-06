@extends('layouts.layout')

@section('title', 'About')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">About me</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('about.save', $about->ab_id) }}" method="post">
                        @csrf
                        @method('put')
    
                        <fieldset class="form-group">
                            <textarea class="form-control @error('ab_about') is-invalid @enderror" id="ab_about" name="ab_about" rows="15">{{ old('ab_about', $about->ab_about) }}</textarea>
                            @error('ab_about') <span class="text-danger">{!! $message !!}</span> @enderror
                        </fieldset>

                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="la la-save font-medium-1"></i> Guardar
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