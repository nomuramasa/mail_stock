@extends('layouts.app')
@section('content')
<div class='container'>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card p-4">
				<h3 class='text-center mb-4'>メッセージタスク一覧</h3>

				<table class='table table-hover'>
					<thead>
					  <tr class='bg-light'>
					      <th>メッセージ</th> <th></th> <th></th>  
					  </tr>
					</thead>

					<tbody>
						@foreach($messages as $message)
							<tr>
								<td class="col-10 py-0">
									<a class='partner-name py-3 d-block text-dark'>
										{{ $message->content }}
									</a>
								</td>
								<td>
									<a href={{ route('message.edit', ['id' => $message->id]) }} class='btn btn-light-blue btn-sm'><i class="fas fa-pen"></i></a>
								</td>
								<td>
									<a href='' class='btn btn-secondary btn-sm'><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					<a href="{{ route('message.new') }}" class='btn btn-light-blue'>新規追加<i class='fas fa-plus ml-2'></i></a>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection