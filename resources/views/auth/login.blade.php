@extends('layouts.auth')
@section('content')
<section class="material-half-bg">
	<div class="cover"></div>
</section>
<section class="login-content">
	<div class="logo">
		<h1>MyCompany</h1>
	</div>
	<div class="login-box">
		<form class="login-form" action="{{ route('login') }}" method="post"  style="position:relative; ">
      @csrf
			@if ($message = Session::get('error'))
          <div class="alert alert-danger alert-dismissible" id="myAlert">
              <strong>Approve required.</strong>
          </div>
          <?php \Session::forget('error');?>
      @endif
			<h3 class="login-head">
				<i class="fa fa-lg fa-fw fa-sign-in"></i>SIGN IN
			</h3>
			<div class="form-group">
				<label class="control-label">Email</label> <input id="email"
					type="email"
					class="form-control @error('email') is-invalid @enderror"
					name="email" value="{{ old('email') }}" required
					autocomplete="email" autofocus> @error('email') <span
					class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
				</span> @enderror
			</div>
			<div class="form-group">
				<label class="control-label">PASSWORD</label> <input id="password"
					type="password"
					class="form-control @error('password') is-invalid @enderror"
					name="password" required autocomplete="current-password">

				@error('password') <span class="invalid-feedback" role="alert"> <strong>{{
						$message }}</strong>
				</span> @enderror
			</div>

            <div class="g-recaptcha" data-sitekey="6LeiQbYUAAAAAK5_u38fuWjR33K35eZ5v2ndLymu"></div>


			<div class="form-group btn-container">
				<button class="btn btn-success btn-block">
					<i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN
				</button>
			</div>

		</form>



	</div>

    <div class="text-center mt-3 font-weight-bold">
        &copy; Copyright 2019 - MyCompany
    </div>
</section>
@endsection

@section('script')
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $(".login-form").submit(function (e) {--}}
{{--                if (grecaptcha.getResponse() == ""){--}}
{{--                    e.preventDefault();--}}
{{--                    alert("Please check the recaptcha!");--}}
{{--                } else {--}}

{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}

@endsection
