@extends('layouts.layout')

@section('title', 'Skills')

@section('container')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Skills</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <span class="text-info">Sort the elements, just by moving the cells of the table.</span>

                    @if ($skills->isEmpty())
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
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="changeOrder" data-url="{{ route('skill.order') }}">
                                @foreach ($skills as $sk)
                                <tr id="ord-{{ $sk->sk_id }}">
                                    <td class="text-center"><span class="loop-{{ $sk->sk_id }}">{{ $loop->iteration }}</span></td>
                                    <td class="text-center">
                                        <div class="custom-control-inline custom-switch">
                                            <input data-url="{{ route('skill.status', $sk->sk_id) }}" type="checkbox" class="custom-control-input isActiveElement" id="sk_status-{{ $sk->sk_id }}" {{ ($sk->sk_status) ? 'checked' : '' }} >
                                            <label class="custom-control-label" for="sk_status-{{ $sk->sk_id }}"><span id="up-control-{{ $sk->sk_id }}" class="text-{{ ($sk->sk_status) ? 'success' : 'danger' }}">{{ ($sk->sk_status) ? 'Online' : 'Offline' }}</span></label>
                                        </div>
                                    </td>
                                    <td>{{ $sk->sk_title }}</td>
                                    <td class="text-center">
                                        <img width="45px" class="case-item__icon" src="{{ asset('uploads/skill/' . $sk->sk_image) }}" alt="{{ $sk->sk_title }}" />
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-icon btn-pure danger" href="javascript:return false;" onclick="document.modelForm.action='{{ route('skill.delete', $sk->sk_id) }}';" data-toggle="modal" data-target="#skill-delete"><i class="la la-trash"></i></a>
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
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Skill</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @include('admin.skill.new')
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/skill/delete')


@endsection