@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">代理店情報を編集<i class="fas fa-pen text-black-50 ml-2"></i></div>

								  <div class="card-body">
										<form action='/partner/update/{{ $partner->id }}' method='post'>
											{{ csrf_field() }}

											<div class='form-group row'>
										    <label for="name" class="col-md-4 col-form-label text-md-right">代理店企業名</label>
										    <div class="col-md-6">
										        <input id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{ $partner->name }}" autofocus>
										        @if ($errors->has('name'))
										            <span class="invalid-feedback">
										                <strong>{{ $errors->first('name') }}</strong>
										            </span>
										        @endif
										    </div>
											</div>

											<div class='form-group row'>
										    <label for="campaign_code" class="col-md-4 col-form-label text-md-right">紹介者ID</label>

										    <div class="col-md-6">
										        <input id="campaign_code" type="text" class="form-control @if($errors->has('campaign_code')) is-invalid @endif" name="campaign_code" value="{{ $partner->campaign_code }}">

										        @if ($errors->has('name'))
										            <span class="invalid-feedback">
										                <strong>{{ $errors->first('campaign_code') }}</strong>
										            </span>
										        @endif
										    </div>
											</div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
								            <button type="submit" class="btn btn-green">
								                更新
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