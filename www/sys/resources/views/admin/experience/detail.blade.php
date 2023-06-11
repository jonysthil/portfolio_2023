@extends('layouts.layout')

@section('title', 'Detail Experience')

@section('container')

<div class="row">
    <div class="col-2"></div>
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Detail Experience</h4>  
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-sm btn-danger" 
                            href="javascript:return false;" 
                            onclick="document.modelForm.action='{{ route('experience.delete', $experience->exp_id) }}';" 
                            data-toggle="modal" 
                            data-target="#experience-delete">
                            <i class="la la-trash font-medium-1"></i>
                        </a>
                        <a href="{{ route('experience.edit', $experience->exp_id) }}" class="btn btn-sm btn-info">
                            <i class="la la-edit font-medium-1"></i>
                        </a>
                        <a href="{{ route('experiences') }}" class="btn btn-sm btn-secondary">
                            <i class="la la-list font-medium-1"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            @include('admin/experience/delete')
            <div class="card-content">
                <div class="card-body">

                    <div class="custom-control-inline custom-switch">
                        <input data-url="{{ route('experience.status', $experience->exp_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="exp_status" {{ ($experience->exp_status) ? 'checked' : '' }} >
                        <label class="custom-control-label" for="exp_status">Status <span id="up-control" class="text-{{ ($experience->exp_status) ? 'success' : 'danger' }}">{{ ($experience->exp_status) ? 'Online' : 'Offline' }}</span></label>
                    </div>
                    <br>
                    <p><b>Place:</b> {{ $experience->exp_place }}</p>
                    <p><b>Title:</b> {{ $experience->exp_title }}</p>
                    <p><b>Start Date:</b> {{ Tools::months($experience->exp_month_start) }} {{ $experience->exp_year_start }}</p>
                    <p><b>End Date:</b> 
                        @if ($experience->exp_current)
                            At present
                        @else
                        {{ Tools::months($experience->exp_month_finish) }} {{ $experience->exp_year_finish }}
                        @endif
                    </p>
                    <p><b>Description:</b></p>
                    {!! $experience->exp_description !!}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection