@extends('layouts.layout')

@section('title', 'Detail Education')

@section('container')

<div class="row">
    <div class="col-2"></div>
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Detail Education</h4>  
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-sm btn-danger" 
                            href="javascript:return false;" 
                            onclick="document.modelForm.action='{{ route('education.delete', $education->edu_id) }}';" 
                            data-toggle="modal" 
                            data-target="#education-delete">
                            <i class="la la-trash font-medium-1"></i>
                        </a>
                        <a href="{{ route('education.edit', $education->edu_id) }}" class="btn btn-sm btn-info">
                            <i class="la la-edit font-medium-1"></i>
                        </a>
                        <a href="{{ route('educations') }}" class="btn btn-sm btn-secondary">
                            <i class="la la-list font-medium-1"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            @include('admin/education/delete')
            <div class="card-content">
                <div class="card-body">

                    <div class="custom-control-inline custom-switch">
                        <input data-url="{{ route('education.status', $education->edu_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="edu_status" {{ ($education->edu_status) ? 'checked' : '' }} >
                        <label class="custom-control-label" for="edu_status">Status <span id="up-control-{{ $education->edu_id }}" class="text-{{ ($education->edu_status) ? 'success' : 'danger' }}">{{ ($education->edu_status) ? 'Online' : 'Offline' }}</span></label>
                    </div>
                    <p><b>Place:</b> {{ $education->edu_place }}</p>
                    <p><b>Title:</b> {{ $education->edu_title }}</p>
                    <p><b>Start Date:</b> {{ Tools::months($education->edu_month_start) }} {{ $education->edu_year_start }}</p>
                    <p><b>End Date:</b> 
                        @if ($education->edu_current)
                            At present
                        @else
                        {{ Tools::months($education->edu_month_finish) }} {{ $education->edu_year_finish }}
                        @endif
                    </p>
                    <p><b>Description:</b></p>
                    {!! $education->edu_description !!}

                </div>
            </div>
        </div>
    </div>
</div>


@endsection