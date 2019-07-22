@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メッセージを編集<i class='fas fa-pen ml-2 text-black-50'></i></div>

	            <div class="card-body">
	                <form class="form-horizontal" method="POST" action="{{ route('message.update', ['message' => $message]) }}">
	                    {{ csrf_field() }}

	                    <div class="form-group row">

	                        <div class="col-md-8 col-lg-9">
	                            <textarea id="content" type="text" class="form-control" name="content" rows="3" required autofocus>{{ $message->content }}</textarea>
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

