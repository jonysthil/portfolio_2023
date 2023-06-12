@extends('layouts.layout')

@section('title', 'Experiences')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
                        <h4 class="card-title">List Experiences</h4>
                    </div>
                    <div class="col-md-2 col-sm-12 text-right">
                        <a href="{{ route('experience.new') }}" class="btn btn-sm btn-block btn-primary">
                            <i class="la la-plus-circle font-medium-1"></i> New experience
                        </a>
                    </div>
                </div>                
            </div>
            <div class="card-content">
                <div class="card-body">

                    <span class="text-info">Sort the elements, just by moving the cells of the table.</span>

                    @if ($experience->isEmpty())
                    <div class="alert alert-danger mb-2" role="alert">
                        <strong>Oh snap!</strong> No records were found in the db.
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered zero-configuration table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Status</th>
                                    <th>Title</th>
                                    <th>Period</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="changeOrder" data-url="{{ route('experience.order') }}">
                                @foreach ($experience as $exp)
                                <tr id="ord-{{ $exp->exp_id }}">
                                    <td class="text-center"><span class="loop-{{ $exp->exp_id }}">{{ $loop->iteration }}</span></td>
                                    <td class="text-center">
                                        <div class="custom-control-inline custom-switch">
                                            <input data-url="{{ route('experience.status', $exp->exp_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="exp_status-{{ $exp->exp_id }}" {{ ($exp->exp_status) ? 'checked' : '' }} >
                                            <label class="custom-control-label" for="exp_status-{{ $exp->exp_id }}"><span id="up-control-{{ $exp->exp_id }}" class="text-{{ ($exp->exp_status) ? 'success' : 'danger' }}">{{ ($exp->exp_status) ? 'Online' : 'Offline' }}</span></label>
                                        </div>
                                    </td>
                                    <td>{{ $exp->exp_title }}</td>
                                    <td>
                                        {{ Tools::months($exp->exp_month_start) }} {{ $exp->exp_year_start }} - 
                                        @if ($exp->exp_current)
                                            At present
                                        @else
                                        {{ Tools::months($exp->exp_month_finish) }} {{ $exp->exp_year_finish }}
                                        @endif
                                    </td>
                                    <td style="width: 115px;" class="text-center">
                                        <a href="{{ route('experience.detail', $exp->exp_id) }}" class="btn btn-icon btn-pure info mr-1">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a class="btn btn-icon btn-pure danger" href="javascript:return false;" onclick="document.modelForm.action='{{ route('experience.delete', $exp->exp_id) }}';" data-toggle="modal" data-target="#experience-delete"><i class="la la-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>


@include('admin/experience/delete')

@endsection