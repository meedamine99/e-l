@extends('layouts.welcome')

@section('content')
<div class="container">
                <div>
                    <h2>Reset Password</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" >Email Address</label>
                                <input id="email" type="email"  class="@error('email') is-invalid @enderror form-control"   1name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                        
                    </form>
                </div>
</div>
@endsection
