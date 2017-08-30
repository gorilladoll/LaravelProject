@extends('logins.index')

@section('header')
  <h1>Sign up</h1>
@endsection

@section('content')
  <form class="signup_form" action="/signup_confirm" method="post">
    <fieldset>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <label class="col-sm-2 control-label">ID</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" placeholder="example">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">PW</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" placeholder="password">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" name="email" class="form-control" placeholder="example@example.com">
        </div>
      </div>
    </fieldset>
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a href="/"><button type="button" name="button" class="btn btn-default">
          메인페이지
        </button></a>
        <button type="submit" name="button" class="btn btn-primary">
          가입완료
        </button>
      </div>
    </div>
  </form>
@endsection
