@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="avatar">
                                    <div class="default">
                                        <i class="glyphicon glyphicon-user">
                                            <img src="/image/user-image.png" class="card-img-top" alt="">
                                        </i>
                                    </div>
                                </div>
                                <h2>{{ Auth::user()->name }}</h2>
                                <h3>{{ Auth::user()->email }}</h3>
                                <hr>
                                <div class="row mt-15">
                                    <div class="col-sm-6">
                                        <strong>
                                            <p class="text-center">{{ auth()->user()->followedUsers()->count() }}</p>
                                        </strong>
                                        <div>following</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>
                                            <p class="text-center">{{ auth()->user()->followers()->count() }}</p>
                                        </strong>
                                        <div>followers</div>
                                    </div>
                                </div>
                                <hr>
                                <h4> 
                                    {{ Auth::user()->learnedWords()->count() }}
                                    {{-- {{auth()->user()->learnedWords()->count()}} --}}
                                </h4>
                                <small>words learned</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 offset-sm-1">
                    <div class="activity-feed">
                        <div class="well pt-0">
                            <h2>Activities</h2>
                            <hr class="mb-3">
                            @if (auth()->user()->activities->count() > 0)
                                @foreach (auth()->user()->activities->sortByDesc('created_at') as $activity)
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
                                @else
                                <p> Nothing to show</p> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
