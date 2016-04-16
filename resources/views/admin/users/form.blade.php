<div class="form-group">
    {!! form::label("الإسم", null ,['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! form::text("name", null ,['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! form::label("البريد الإلكترونى", null ,['class' => 'col-sm-2 control-label']) !!}
     <div class="col-sm-10">
       {!! form::text("email", null ,['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! form::label("الصلاحية", null ,['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! form::select("admin", ['0' => 'user', '1' => 'admin'] ,['class' => 'form-control']) !!}
    </div>
</div>
<hr />
@if(!isset($user))
  <div class="form-group has-feedback">
    {!! form::label("كلمة المرور", null ,['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="Password" name="password"/>
    </div>
  </div>
  <div class="form-group has-feedback">
    {!! form::label("أعد كلمة المرور", null ,['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation"/>
    </div>
  </div>
@endif
