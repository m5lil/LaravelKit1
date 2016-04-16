@extends('admin.layouts.app')

@section('title')
  الرئيسية
@endsection

@section('section.content')
  <div class="panel panel-default ">
    <div class="panel-heading"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Chat</div>
    <div class="panel-body">

    </div>
    
     
   
    <div class="panel-footer">
      <div class="input-group">
        <input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." />
        <span class="input-group-btn">
          <button class="btn btn-success btn-md" id="btn-chat">Send</button>
        </span>
      </div>
    </div>
  </div>
@endsection
