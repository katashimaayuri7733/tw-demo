@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if(!empty($users))
      <div class="card">
        <div class="card-header">UserList</div>

        @foreach ($users as $user)

        <div class="card-body">
          {{ $user->name }}

          <div style="float:right">

            @if (count($user->follows) == 0)

            <form method="POST" action="/users/follow" accept-charset="UTF-8" id="formTweet" enctype="multipart/form-data">

              <input id="followId" name="followId" type="hidden" value="{{ $user->id }}">

              <button type="submit" class="btn btn-light">follow
              </button>
              @csrf
            </form>
            @else
            <form method="POST" action="/unfollow" accept-charset="UTF-8" id="formTweet" enctype="multipart/form-data">

              <input id="followId" name="followId" type="hidden" value="{{ $user->id }}">

              <button type="submit" class="btn btn-light">unfollow
              </button>
              @csrf
            </form>




            <?php
                                // {!! Form::open(['id' => 'formTweet', 'url' => 'users/follow/', 'enctype' => 'multipart/form-data']) !!}
                                //     {{Form::hidden('followId', $user->id, ['id' => 'followId'])}}
                                //     <button type="submit" class="btn btn-light">
                                //         {{ __('フォローする') }}
                                //     </button>
                                // {!! Form::close() !!}
            ?>

            @endif



          </div>
        </div>

        <hr>

        @endforeach

        <?php
          //
          // {{ $users->links() }}
        ?>

      </div>

      @endif

    </div>
  </div>
</div>
@endsection
