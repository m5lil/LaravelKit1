@extends('admin.layouts.app')

@section('title')
  إعدادات الموقع
@endsection

@section('section.content')
  {!! Form::open(['action' => 'SettingController@index', 'method' => 'post' ,'class' => 'form-horizontal']) !!}
    <div class="panel panel-default ">
      <div class="panel-heading"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg>@yield('title')</div>
      <div class="panel-body">
        @foreach($settings as $setting)
        <div class="form-group">
          <div style="color:#f00;" class="col-md-2 control-label">
            {{ $setting->set_slug }}
          </div>
          <div class="col-md-10">
            @if($setting->type == 1)
              {!! Form::text($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @else
              {!! Form::textarea($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
            @endif
          </div>
        </div>
        @endforeach
      </div>

      <div class="panel-footer">
        <div class="input-group">
            <input type="submit" name="submit" value="حفظ" class="btn btn-success btn-md btn-block">
        </div>
      </div>
    </div>

  {!! Form::close() !!}

@endsection
