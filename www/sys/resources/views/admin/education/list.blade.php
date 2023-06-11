@extends('layouts.layout')

@section('title', 'educations')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
                        <h4 class="card-title">List educations</h4>
                    </div>
                    <div class="col-md-2 col-sm-12 text-right">
                        <a href="{{ route('education.new') }}" class="btn btn-sm btn-block btn-primary">
                            <i class="la la-plus-circle font-medium-1"></i> New education
                        </a>
                    </div>
                </div>                
            </div>
            <div class="card-content">
                <div class="card-body">

                    <span class="text-info">Sort the elements, just by moving the cells of the table.</span>

                    @if ($education->isEmpty())
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
                            <tbody class="changeOrder" data-url="{{ route('education.order') }}">
                                @foreach ($education as $edu)
                                <tr id="ord-{{ $edu->edu_id }}">
                                    <td class="text-center"><span class="loop-{{ $edu->edu_id }}">{{ $loop->iteration }}</span></td>
                                    <td class="text-center">
                                        <div class="badge badge-{{ ($edu->edu_status) ? 'success' : 'danger' }} badge-square">
                                            <span>{{ ($edu->edu_status) ? 'Online' : 'Offline' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $edu->edu_title }}</td>
                                    <td>
                                        {{ Tools::months($edu->edu_month_start) }} {{ $edu->edu_year_start }} - 
                                        @if ($edu->edu_current)
                                            At present
                                        @else
                                        {{ Tools::months($edu->edu_month_finish) }} {{ $edu->edu_year_finish }}
                                        @endif
                                    </td>
                                    <td style="width: 115px;" class="text-center">
                                        <a href="{{ route('education.detail', $edu->edu_id) }}" class="btn btn-icon btn-pure info mr-1">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a class="btn btn-icon btn-pure danger" href="javascript:return false;" onclick="document.modelForm.action='{{ route('education.delete', $edu->edu_id) }}';" data-toggle="modal" data-target="#education-delete"><i class="la la-trash"></i></a>
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


@include('admin/education/delete')

@endsection