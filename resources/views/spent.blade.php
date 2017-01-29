@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Новая покупка</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/spent') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
                                <label for="wallet" class="col-md-4 control-label">Кошелек</label>

                                <div class="col-md-6">
                                    <input id="wallet" type="text" class="form-control" name="wallet"
                                           value="{{ old('wallet') }}" autofocus>
                                    @if ($errors->has('wallet'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('wallet') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Телефон</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone"
                                           value="{{ old('phone') }}">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gift') ? ' has-error' : '' }}">
                                <label for="gift" class="col-md-4 control-label">Подарок</label>

                                <div class="col-md-6">
                                    <input id="gift" type="text" class="form-control" name="gift" value="{{ old('gift') }}"
                                           required autofocus>

                                    @if ($errors->has('gift'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gift') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        ОК
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
