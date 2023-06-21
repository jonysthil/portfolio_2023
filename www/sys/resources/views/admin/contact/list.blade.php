@extends('layouts.layout')

@section('title', 'Contact')

@section('container')

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contacts</h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                    @if ($contact->isEmpty())
                    <div class="alert alert-danger mb-2" role="alert">
                        <strong>Oh snap!</strong> No records were found in the db.
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $cnt)
                                <tr class="{{ ($cnt->cnt_status) ? 'bg-success white' : '' }}">
                                    <td class="text-center"><span class="loop-{{ $cnt->cnt_id }}">{{ $loop->iteration }}</span></td>
                                    <td>
                                        {{ $cnt->cnt_name }}
                                        <br>
                                        <small>{{ $cnt->cnt_mail }}</small>
                                        <small>{{ $cnt->cnt_phone }}</small>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('contact.detail', $cnt->cnt_id) }}" class="btn btn-sm btn-info"><i class="la la-eye"></i></a>
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


@endsection