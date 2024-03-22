@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="user-info text-center">
                            <div class="avatar">
                                <div class="default">
                                    <i class="glyphicon glyphicon-user">
                                        <img src="/image/user-image.png" class="card-img-top col-sm-8" alt="">
                                    </i>
                                </div>
                                <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                <div class="text-gray mb-15">{{ Auth::user()->email }}</div>
                                <div class="mt-3">
                                    {{-- <a class="btn btn-sm btn-warning text-white" href="/">Change Avatar</a> --}}
                                    <a class="btn btn-sm btn-info text-white" href="/profile">View profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="d-inline-block mr-4">
                                <h5 class="d-inline">{{ auth()->user()->followedUsers()->count() }}</h5>
                                <span>following</span>
                            </div>
                            <div class="d-inline-block mr-4">
                                <h5 class="d-inline">{{ auth()->user()->followers()->count() }}</h5>
                                <span>followers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <a class="btn btn-info btn-block no-border text-white p-3">
                            <h4> {{ Auth::user()->learnedWords()->count() }}</h4>
                                {{-- {{auth()->user()->learnedWords()->count()}} --}}
                            words learned
                        </a>
                    </div>
                </div>
            </div>
                
            <div class="col-sm-8">
                <div class="card activity-feed">
                    <div class="card-header">
                        <strong class="heading">Activity feed</strong>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($activities->count() > 0)
                            {{-- to display array content one by one, we use foreach --}}
                            <ul class="list-unstyled">
                                @foreach ($activities->sortByDesc('created_at') as $activity)
                                <li class="media mb-5">
                                    <img src="/image/user-image.png" class="mr-3" width="64">
                                    <div class="media-body">
                                    <h5 class="mt-0 mb-1">
                                        @if ($activity->action_type == "App\Relationship")
                                            <p>
                                                {{ $activity->text }}
                                                <br>
                                                <small>{{ $activity->created_at->diffForHumans() }}</small>
                                            </p>
                                        @else
                                            <p>
                                                {{ $activity->text }}
                                                <br>
                                                <small>{{ $activity->created_at->diffForHumans() }}</small>
                                            </p>
                                        @endif
                                    </h5>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <p> Nothing to show</p> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
