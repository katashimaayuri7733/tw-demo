@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Timeline</div>
                <!-- <div style="display: inline-block; padding: 10px 20px; border: 1px solid black;"></div> -->
                @foreach ($tweets as $tweet)

                <div class="card-body">
                    {{ $tweet->tweet }}
                    <br>
                    <div style="display:flex; justify-content: left;align-items: center;">
                        <div style="float:left">
                            {{ $tweet->users->name }} / {{ $tweet->created_at }}
                        </div>
                        <div style="float:left" class="heart"></div>



                        <form method="POST" action="/tweet/delete">

              <input id="tweetId" name="tweetId" type="hidden" value="{{ $tweet->id }}">
                        <button type="submit" style="float:left" class="fas fa-trash">
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"></button>
                         @csrf
                    </form>

                    </div>
                </div>

                <hr style="margin-top:0px; margin-bottom:0px">
                <!-- <div style="display: inline-block;padding: 10px 20px;border: 1px solid black;margin: 10px;">あ</div> -->
                @endforeach

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
            </div>

            <?php //{{ $tweets->links() }} ?>
        </div>
    </div>
</div>
@endsection
