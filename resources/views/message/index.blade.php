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
					      <th width='80px'>送信順</th> 
					      <th>メッセージ</th> 
					      <th width='50px'></th> 
					      <th width='50px'></th>  
					  </tr>
					</thead>

					<tbody>

						<?php $number = 1; ?>{{-- インデックス番号 --}}
						@foreach($messages as $message)
							<tr>
								<td class="py-0">
									<a class='py-3 d-block text-dark'>
									{{ $number }}
									</a>
								</td>

								<td class="py-0">
									<a class='py-3 d-block text-dark'>
										{{ $message->content }}
									</a>
								</td>

								<td>
									<a href={{ route('message.edit', ['id' => $message->id]) }} class='btn btn-light-blue btn-sm'><i class="fas fa-pen"></i></a>
								</td>

								<td>
									{{-- 削除ボタンのフォーム --}}
									<form method='POST' action='/message/{{ $message->id }}'> {{-- 消すID番号もリクエスト --}}
										{{ csrf_field() }} {{-- CSRFトークン --}}
										<input name='_method' type='hidden' value='DELETE'> {{-- DELETEメソッド --}}

										{{-- 送信ボタン --}}
										<button type='submit' class='btn btn-secondary btn-sm' onClick="delete_alert(event);return false;"> {{-- アラート --}}
											<i class="fas fa-trash"></i> {{-- アイコン --}}
										</button>
									</form> 
								</td>

							</tr>
						<?php $number++; ?>{{-- インデックス番号を追加 --}}
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