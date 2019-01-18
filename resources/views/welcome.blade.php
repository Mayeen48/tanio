@extends('layout.master')
@section('title')
Home
@endsection


@section('mainContent')

        
       
    <h3 class="jumbotron">Please Drug and Drop a CSV file or Select a CSV File</h3>
    <form method="post" action="{{url('upload')}}" enctype="multipart/form-data" 
                  class="dropzone custom" id="dropzone" >
    @csrf
    <div class="dz-message" data-dz-message>
    	<span>
    		<img src="{{asset('public/images/Upload-1.png')}}"></i>変換したいファイルを、
ここに　ドラッグ ＆ ドロップ
    	</span>
    </div>
</form> 
<iframe id="my_iframe" style="display:none;"></iframe>

@endsection