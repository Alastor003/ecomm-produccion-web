@extends('layouts.app')

@section('content')
<div class="container" style="height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu direccion de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un mensaje de verificacion se mando a tu email') }}
                        </div>
                    @endif

                    {{ __('Revisa tu casilla de email.') }}
                    {{ __('Si no recibiste un correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Presiona para reintentar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
