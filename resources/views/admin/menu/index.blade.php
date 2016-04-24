@extends('admin.layouts.app')

@section('title')
  القوائم
@endsection


@section('section.content')
            <table class = "table table-striped table-hover table-responsive">
                <thead>
                    <th>#</th>
                    <th>إسم القائمة</th>
                    <th>الرابط</th>
                    <th>الترتيب</th>
                    <th>Parent</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($menus as $value)
                      @if ($value->parent_id == 0)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->title}}</td>
                          <td>{{$value->url}}</td>
                          <td>{{$value->order}}</td>
                          <td>{{ $title[$value->parent_id] }}</td>
                          <td>
                              <a class="btn btn-default" href = '/cp/menu/{{$value->id}}/edit'><i class = 'ion ion-edit'></i></a>
                              <a class="btn btn-default" href = "/cp/menu/{{$value->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                          </td>
                        </tr>
                        @if ( ! $value->children->isEmpty() )
                          @foreach ($value->children as $subMenuItem)
                            <tr>
                              <td>{{$subMenuItem->id}}</td>
                              <td> -- {{$subMenuItem->title}}</td>
                              <td>{{$subMenuItem->url}}</td>
                              <td>{{$subMenuItem->order}}</td>
                              <td>{{ $title[$subMenuItem->parent_id] }}</td>
                              <td>
                                <a class="btn btn-default" href = '/cp/menu/{{$subMenuItem->id}}/edit'><i class = 'ion ion-edit'></i></a>
                                <a class="btn btn-default" href = "/cp/menu/{{$subMenuItem->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      @endif
                    @endforeach
                </tbody>
            </table>


            @endsection

