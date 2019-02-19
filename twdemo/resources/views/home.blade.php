@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>
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
