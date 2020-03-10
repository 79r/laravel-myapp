@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 my-3">
            <h3 class="text-center">@lang('app.phrase')</h3>
        </div>
        <div class="col-12 text-center mb-3">
            <a href="{{ route('sentence.create') }}" class="btn btn-primary">Create Phrase</a>
        </div>
        @foreach ($phrases as $item)
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card sentence">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="flag">
                            <span class="id"></span>
                        </div>
                        <p class="item">{{ $item->indonesia }}</p>
                        <div class="edit-btn">
                            <a href="" class="btn btn-sm btn-outline-primary"><i class="material-icons">edit</i>Edit</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="flag">
                            <span class="en"></span>
                        </div>
                        <p class="item">{{ $item->english }}</p>
                        <div class="edit-btn">
                            <a href="" class="btn btn-sm btn-outline-primary"><i class="material-icons">edit</i>Edit</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                    @if(!empty($item->vietnam))
                        <div class="flag">
                            <span class="vn"></span>
                        </div>
                        <p class="item">{{ $item->vietnam }}</p>
                        <div class="edit-btn">
                            <a href="" class="btn btn-sm btn-outline-primary"><i class="material-icons">edit</i>Edit</a>
                        </div>
                    @else
                        <div class="flag">
                            <span class="vn"></span>
                        </div>
                        <p class="item">...</p>
                    @endif
                    </li>
                    <div class="author text-center">
                        @if($item->user_id === $item->updated_by)
                        <div class="creator d-inline">
                            <a href="">
                                <img src="{{ url('') }}/{{ $item->user->profile->image_sm_url }}" alt="" class="rounded-circle">
                            </a>
                        </div>
                        @else
                        <div class="creator d-inline">
                            <a href="">
                                <img src="{{ url('') }}/{{ $item->user->profile->image_sm_url }}" alt="" class="rounded-circle">
                            </a>
                        </div>
                            @if(!empty($item->updated_by))
                            <div class="updator d-inline">
                                <a href="">
                                    <img src="{{ url('') }}/{{ $item->updator->profile->image_sm_url }}" alt="" class="rounded-circle">
                                </a>
                            </div>
                            @endif
                        @endif
                    </div>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection