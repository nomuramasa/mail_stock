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

	                    {{-- 入力欄 --}}
	                    <div class="form-group">
                        <textarea id="content" type="text" class="form-control" name="content" rows="8" required autofocus></textarea>
	                    </div>

                      <div class="text-center">
                          <button type="submit" class="btn btn-light-blue">
                              登録
                          </button>
                      </div>

	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>



@endsection

