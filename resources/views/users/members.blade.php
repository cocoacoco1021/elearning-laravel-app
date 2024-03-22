@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container">
            <header>
                <h1 class="page_title">
                    Users
                </h1>
            </header>
            <div class="row object-list">
                @foreach ($members as $user)
                    <div class="col-sm-6">
                        <article class="card my-3">
                            <div class="card-body">
                                <div class="media">
                                    <div class="align-self-center mr-3">
                                        <div class="avatar">
                                            <div class="default">
                                                <i class="glyphicon glyphicon-user">
                                                    <img src="/image/user-image.png" class="mr-3" width="64">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body py-3">
                                        <strong>
                                            <a href="/members/{{ $user->id }}/show">{{ $user->name }}</a>
                                        </strong>
                                        <div class="float-right">
                                            @if (auth()->user()->isFollowing($user->id))
                                                <a href="{{ route('user.unfollow', ['followed_id' => $user->id]) }}" class="btn btn-danger">Unfollow</a>
                                            @else
                                                <a href="{{ route('user.follow', ['followed_id' => $user->id]) }}" class="btn btn-primary">Follow</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>    
                    </div>  
                @endforeach
            </div> 
            <div class="d-flex justify-content-center paginate mt-5">
             {{ $members->links() }} 
            </div>
        </div>
    </div>
@endsection