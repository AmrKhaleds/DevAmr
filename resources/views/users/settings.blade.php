
@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="container-fluid pt-7" >
        <div class="row">
            
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Website Settings') }}</h3>
                        </div>
                    </div>
                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        {{-- <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6> --}}
                        
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            {{-- Edit Name --}}
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-xl-4">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- Edit Email --}}
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-xl-4">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- Edit age --}}
                            <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }} col-xl-4">
                                <label class="form-control-label" for="input-age">{{ __('Age') }}</label>
                                <input type="text" name="age" id="input-age" class="form-control form-control-alternative{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('Age') }}" value="{{ old('age', auth()->user()->age) }}" required autofocus>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
