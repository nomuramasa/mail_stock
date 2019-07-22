@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新しいメッセージ<i class='fas fa-plus ml-2 text-black-50'></i></div>

	            <div class="card-body">
	                <form class="form-horizontal" method="POST" action="{{ route('message.store') }}">
	                    {{ csrf_field() }}

	                    <div class="form-group row">
	                        <label for="content" class="col-md-3 col-lg-2 col-form-label text-md-right">メッセージ</label>

	                        <div class="col-md-8 col-lg-9">
	                            <textarea id="content" type="text" class="form-control" name="content" value="{{ old('content') }}"  rows="3" required autofocus></textarea>
	                        </div>
	                    </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-3 col-lg-2 offset-lg-2">
	                            <button type="submit" class="btn btn-light-blue">
	                                登録
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

