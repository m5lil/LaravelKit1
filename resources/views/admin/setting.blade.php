@extends('admin.layouts.app')

@section('title')
  إعدادات الموقع
@endsection

@section('section.content')
  {!! Form::open(['action' => 'SettingController@index', 'method' => 'post']) !!}
    <div class="panel panel-default ">
      <div class="panel-heading"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg>@yield('title')</div>
      <div class="panel-body">
        @foreach($settings as $setting)
        <div class="row">
          <div class="col-md-3">
            {{ $setting->set_slug }}
          </div>
          <div class="col-md-9">
            @if($setting->type == 0)
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
