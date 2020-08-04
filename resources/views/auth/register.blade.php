@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlFile1"
                                class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                    onchange="checkIMG(event)">
                                <img src="data:image/png;base64,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"
                                    class="rounded float-right" alt="..." style="width:80px">
                            </div>
                        </div>

                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
    function checkIMG(evt){
        var files = evt.target.files;
        var file = files[0];
        console.log(fileReader.result);
        var fileReader = new FileReader();
        fileReader.readAsDataURL(file);
        console.log(fileReader);
    }
</script>
