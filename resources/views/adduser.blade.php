@extends('layouts.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-user-plus"></i> Add New User</h1>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <div class="tile-body">
                        <form id="adduser_form" method="post" action="{{ route('newuser') }}">
                            @csrf

                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ __('E-Mail Address') }}</label>
                                <input id="email"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required
                                       autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{ __('Password') }}</label>
                                <input id="password"
                                     type="password"
                                     class="form-control @error('password') is-invalid @enderror"
                                     name="password" value="{{ old('password') }}" required
                                     autocomplete="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                              </span>
                                @enderror
                                <ul class="password_check">
                          				<li class="match_first">The password must be a minimum of 12 and maximun 30 characters in length.</li>
                          				<li class="match_sec">The password must include an upper case and a lower case letter.</li>
                          				<li class="match_third">The password must include a number.</li>
                                  <li class="match_last">The password must include a symbol.</li>
                          				<li class="match_confirm">Password doesn't match.</li>
                          			</ul>
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm"
                                     type="password"
                                     class="form-control"
                                     name="password_confirmation" value="{{ old('password') }}" required
                                     autocomplete="new-password" autofocus>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Save
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')

<script type="text/javascript">
  let match_first = false;
  let match_sec = false;
  let match_third = false;
  let match_last = false;
  let match_confirm = false;
  $("#password").keyup(function (){
    const confirm_pass = $("#password-confirm").val();

    // check password confirm
    if($(this).val() == confirm_pass) {
      $(".match_confirm").addClass('match');
      match_confirm = true;
    } else {
      $(".match_confirm").removeClass('match');
      match_confirm = false;
    }

    // check first condition
    if(/^.{12,30}$/.test($(this).val())){
      $(".match_first").addClass('match');
      match_first = true;
    } else {
      $(".match_first").removeClass('match');
      match_first = false;
    }

    // check second condition
    if(/^(?=.*?[A-Z])(?=.*?[a-z])/.test($(this).val())){
      $(".match_sec").addClass('match');
      match_sec = true;
    } else {
      $(".match_sec").removeClass('match');
      match_sec = false;
    }

    // check third condition
    if(/(?=.*?[0-9])/.test($(this).val())){
      $(".match_third").addClass('match');
      match_third = true;
    } else {
      $(".match_third").removeClass('match');
      match_third = false;
    }

    // check last condition
    if(/(?=.*?[#?!@()$%^&*=_{}[\]:;\"'|\\<>,.\/~`±§+-])/.test($(this).val())){
      $(".match_last").addClass('match');
      match_last = true;
    } else {
      $(".match_last").removeClass('match');
      match_last = false;
    }

  });

  $("#password-confirm").keyup(function (){
    const confirm_pass = $("#password").val();

    if($(this).val() == confirm_pass) {
      $(".match_confirm").addClass('match');
      match_confirm = true;
    } else {
      $(".match_confirm").removeClass('match');
      match_confirm = false;
    }
  });

  $("#adduser_form").submit(function(event) {
    /* Act on the event */
    const password = $("#password").val();
    const comfirm_pass = $("#password-confirm").val();

    if(match_confirm && match_last && match_third && match_sec && match_first){
    } else {
      event.preventDefault();
    }
  });
</script>


@endsection
