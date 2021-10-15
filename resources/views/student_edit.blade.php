@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        Данные студента: {{$dataTypeContent->fam}} {{$dataTypeContent->name}} {{$dataTypeContent->otch}}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <ul class="nav nav-tabs">
            <!-- Первая вкладка (активная) -->
            <li class="active">

                <a data-toggle="tab" href="#d_1">Главное</a>
            </li>
            <li>

                <a data-toggle="tab" href="#usp">Успеваемость</a>
            </li>
            <li>

                <a data-toggle="tab" href="#prk">Приказы</a>
            </li>
            @foreach ($kat as $kt)
                <li>
                    <a data-toggle="tab" href="#dop{{$kt->id}}">{{$kt->name}}</a>
                </li>
            @endforeach


        </ul>


        <div class="tab-content">

            <div class="tab-pane" id="prk">
                <div class="panel panel-bordered">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="btn-group" role="group" aria-label="Операции">
                                        <button class="btn btn-info  btn-lg" id="addprk" data-id="1"><i
                                                class="voyager-plus"></i>Добавить
                                        </button>
                                        <button class="btn btn-default btn-lg prkedit"><i class="voyager-edit"></i>
                                            Изменить
                                        </button>
                                        <button class="btn btn-danger  btn-lg prkdelet"><i class="voyager-trash"></i>
                                            Удалить
                                        </button>

                                    </div>


                                    <button class="btn btn-info  btn-lg pull-right" id="print"><i
                                            class="voyager-receipt"></i>
                                        Печать
                                    </button>


                                </div>


                            </div>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Приказ</th>
                            <th>Дата</th>
                            <th>Название</th>
                            <th>Комментарий</th>
                        </tr>
                        </thead>
                        <tbody id="iprikaz">

                        </tbody>
                    </table>
                </div>

            </div>



            <div class="tab-pane" id="usp">
                <div class="panel panel-bordered">
                    <h1>Семестр: <span id="krs">1</span></h1>
                    <ul class="nav nav-tabs">
                        @for($x=1;$x<10;$x++)
                            <li class="nav-item">
                                <a class="nav-link kurs" data-toggle="tab" data-id="{{$x}}">{{$x}} семестр</a>
                            </li>
                        @endfor

                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="btn-group" role="group" aria-label="Операции">
                                        <button class="btn btn-info  btn-lg" id="addu" data-id="1"><i
                                                class="voyager-plus"></i>Добавить
                                        </button>
                                        <button class="btn btn-default btn-lg balledit"><i class="voyager-edit"></i>
                                            Изменить
                                        </button>
                                        <button class="btn btn-danger  btn-lg balldelet"><i class="voyager-trash"></i>
                                            Удалить
                                        </button>
                                        <button class="btn btn-success  btn-lg prnagr"><i class="voyager-upload"></i>
                                            Добавить из нагрузки
                                        </button>
                                    </div>


                                    <button class="btn btn-info  btn-lg pull-right" id="print"><i
                                            class="voyager-receipt"></i>
                                        Печать
                                    </button>


                                </div>


                            </div>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Предмет</th>
                            <th>Оценка</th>

                        </tr>
                        </thead>
                        <tbody id="iball">

                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Первый блок (он отображается по умолчанию, т.к. имеет классы show и active) -->
            <div class="tab-pane active" id="d_1">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-bordered">
                            <!-- form start -->
                            <form role="form"
                                  class="form-edit-add"
                                  action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                                  method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                            @if($edit)
                                {{ method_field("PUT") }}
                            @endif

                            <!-- CSRF TOKEN -->
                                {{ csrf_field() }}

                                <div class="panel-body">

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <!-- Adding / Editing -->
                                    @php
                                        $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                    @endphp

                                    @foreach($dataTypeRows as $row)
                                    <!-- GET THE DISPLAY OPTIONS -->
                                        @php
                                            $display_options = $row->details->display ?? NULL;
                                            if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                            }
                                        @endphp
                                        @if (isset($row->details->legend) && isset($row->details->legend->text))
                                            <legend class="text-{{ $row->details->legend->align ?? 'center' }}"
                                                    style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                        @endif

                                        <div
                                            class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $row->slugify }}
                                            <label class="control-label"
                                                   for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if (isset($row->details->view))
                                                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                            @elseif ($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['options' => $row->details])
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                            @if ($errors->has($row->field))
                                                @foreach ($errors->get($row->field) as $error)
                                                    <span class="help-block">{{ $error }}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach

                                </div><!-- panel-body -->

                                <div class="panel-footer">
                                    @section('submit-buttons')
                                        <button type="submit"
                                                class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                                    @stop
                                    @yield('submit-buttons')
                                </div>
                            </form>

                            <iframe id="form_target" name="form_target" style="display:none"></iframe>
                            <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                                  enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                                <input name="image" id="upload_file" type="file"
                                       onchange="$('#my_form').submit();this.value='';">
                                <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- другие блоки  -->
            @foreach ($kat as $kt)

                <div class="tab-pane" id="dop{{$kt->id}}">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="btn-group" role="group" aria-label="Операции">
                                        <button class="btn btn-info  btn-lg addp" id="" data-id="{{$kt->id}}"><i
                                                class="voyager-plus"></i>Добавить
                                        </button>
                                        <button class="btn btn-default btn-lg bedit"><i class="voyager-edit"></i>
                                            Изменить
                                        </button>
                                        <button class="btn btn-danger  btn-lg delet"><i class="voyager-trash"></i>
                                            Удалить
                                        </button>
                                    </div>


                                    <button class="btn btn-info  btn-lg pull-right" id="print"><i
                                            class="voyager-receipt"></i>
                                        Печать
                                    </button>


                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-condenced table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Тип данных</th>
                                            <th>Значение</th>
                                            <th>Комментарий</th>
                                        </tr>
                                        </thead>
                                        <tbody id="bod{{$kt->id}}">
                                        @foreach ($sved as $svd)
                                            @if($svd->typ->kategor==$kt->id)
                                                <tr data-id="{{$svd->id}}" class="zzp">
                                                    <td>{{$svd->typ->name}}</td>
                                                    <td>{{$svd->value}}</td>
                                                    <td>{{$svd->comment}}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            @endforeach


        </div>


        ...
    </div>

    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'
                    </h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger"
                            id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
    <div class="modal fade modal-info" id="add_portf">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Добавить свойство</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" id="user" value="{{$dataTypeContent->id}}">
                            <select id="ssv" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12" id="inpp">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea id="comm" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="iid" value="-1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-info" id="addsvs">Cохранить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Добавить балл -->
    <div class="modal fade modal-info" id="add_ball">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Добавить Предмет</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" id="user" value="{{$dataTypeContent->id}}">
                            <input type="hidden" id="bid" value="-1">
                            <select id="predmet" class="form-control" style="width: 100%">
                                @foreach($predmet as $pr)
                                    <option value="{{$pr->id}}">{{$pr->nazv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <select class="form-control" id="ball">
                                @foreach($typball as $tb)
                                    <option value="{{$tb->num}}">{{$tb->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <input type="hidden" id="iid" value="-1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-info" id="saveuch">Cохранить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- добавить предметы из нагрузки -->
    <div class="modal fade modal-info" id="add_pr_nagr">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Добавить Предметы</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" id="user" value="{{$dataTypeContent->id}}">
                            <input type="hidden" id="bid" value="-1">
                            <select id="pr_nagr" class="form-control">

                            </select>
                        </div>
                    </div>

                </div>
                <input type="hidden" id="iid" value="-1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-info" id="savengr_add">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- добавить приказы -->
    <div class="modal fade modal-info" id="add_prikaz">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Добавить приказ</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" id="puser" value="{{$dataTypeContent->id}}">
                            <input type="hidden" id="pbid" value="-1">
                            <select id="tpr" class="form-control">
@foreach($prikaz as $pr)
    <option value="{{$pr->id}}">{{$pr->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-xs-12">
                            <label>Дата приказа</label>
                                <input type="date" id="prdate" class="form-control">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <label>Название приказа</label>
                                <input type="text" id="prname" class="form-control">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label> Комментарии</label>
                           <textarea id="prcomment" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="iid" value="-1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-info" id="saveprk">Добавить</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;
        var defstr = 0;
        var kurs = 1;
        var defbl = 0;
var defpr=0;
        function loadball(sem, id) {
            $.post('{{url('admin/api')}}', {
                'md': 6,
                'id': id,
                'sem': sem,
                '_token': '{{ csrf_token() }}'
            }, function (data) {
                $('#iball').empty();
                data.forEach(function (item) {
                    bl = '-';
                    if (item.tball != null) bl = item.tball.name;
                    $('#iball').append('<tr data-id="' + item.id + '" class="zzd"><td>' + item.td.nazv + '</td><td>' + bl + '</td></tr>');

                })

                defbl = 0;
            });
        }
        function loadprikaz(id) { //загрузка приказов в таблицу
            $.post('{{url('admin/api')}}', {
                'md': 15,
                'id': id,

                '_token': '{{ csrf_token() }}'
            }, function (data) {
                $('#iprikaz').empty();
                data.forEach(function (item) {
                    if (item.name!= null) bl = item.pname.name;
                    $('#iprikaz').append('<tr data-id="' + item.id + '" class="pzzd"><td>' + bl + '</td><td>' + item.data_pr + '</td><td>' + item.name + '</td><td>' + item.comment + '</td></tr>');

                })

                defpr=0;
            });
        }
        $('body').on('click', '.pzzd', function () { //расскрасим приказы
            if ($(this).data('id') != null)
                defpr = $(this).data('id'); else defpr = 0;
            $('.pzzd').removeClass('warning');
            $('.pzzd').removeClass('wpk');
            $(this).addClass('warning');
            $(this).addClass('wpk');


        });
        function deleteHandler(tag, isMulti) {
            return function () {
                $file = $(this).siblings(tag);

                params = {
                    slug: '{{ $dataType->slug }}',
                    filename: $file.data('file-name'),
                    id: $file.data('id'),
                    field: $file.parent().data('field-name'),
                    multi: isMulti,
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text(params.filename);
                $('#confirm_delete_modal').modal('show');
            };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            $('#predmet').select2();

            $('#addprk').click(function () {//добавить приказ
                $('#pbid').val(-1);
                $('#add_prikaz').modal('show');

            });
            loadball(1,{{$dataTypeContent->id}});
            //   $('#iball tr').cl
            $('#pr_nagr').change(function () {
                $.post('{{url('admin/api')}}', {
                    'md': 10,
                    'grp': $('#pr_nagr').val(),
                    'sem': kurs,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    console.log(data);
                    $('#comment1').empty();
                    if(data.length==0) {
                        toastr.error('На данный семестр нет нагрузки!')

                        $('#savengr_add').hide();
                    } else   $('#savengr_add').show();

                });
            });
            $('.prnagr').click(function () {//добавить предметы с нагрузки
                $.post('{{url('admin/api')}}', {
                    'md': 9,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#pr_nagr').empty();
                    $('#pr_nagr').append('<option value="-1">Выберите группу донора</option>');
                    $('#savengr_add').hide();
                    data.forEach(function (item) {
                        $('#pr_nagr').append('<option value="' + item.id + '">' + item.nazv + '</option>');
                    })
                });
                $('#add_pr_nagr').modal('show');

            });
            $('#saveprk').click(function () {//сохранить приказ
                $.post('{{url('admin/api')}}', {
                    'md': 14,
                    'pid': $('#pbid').val(),
                    'puser': $('#puser').val(),
                    'prdate':$('#prdate').val(),
                    'tpr':$('#tpr').val(),
                    'stud':{{$dataTypeContent->id}},
                    'prname':$('#prname').val(),
                    'prcomment':$('#prcomment').val(),
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
               loadprikaz({{$dataTypeContent->id}});
                    $('#add_prikaz').modal('hide');
                });
            });

            $('#savengr_add').click(function () {//сохранить нагрузку к студенту из группы
                $.post('{{url('admin/api')}}', {
                    'md': 11,
                    'sem': kurs,
                    'grp': $('#pr_nagr').val(),
                    'stud':{{$dataTypeContent->id}},
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    loadball(kurs,{{$dataTypeContent->id}});
                    $('#add_pr_nagr').modal('hide');
                });
            });

            $('.kurs').click(function () {
                kurs = $(this).data('id');
                $('#krs').html(kurs);
                loadball(kurs,{{$dataTypeContent->id}});
            });
            $('#addu').click(function () {
                $('#bid').val(-1);
                $('#add_ball').modal('show');
            });
            $('.delet').click(function () {
                let th = $(this);
                if (defstr == 0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 4,
                    'id': defstr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#bod' + data.tp).find('tr.info').remove();
                    defstr=0;
                });
            });
            $('.balldelet').click(function () {//удалить оценку
                let th = $(this);
                if (defbl == 0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 8,
                    'id': defbl,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('body').find('tr.warning').remove();
                    defbl=0;
                });
            });
            $('.prkdelet').click(function () {//удалить приказ
                let th = $(this);
                if (defpr == 0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 17,
                    'id': defpr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('body').find('tr.wpk').remove();
                    defpr=0;
                });
            });


            $('#saveuch').click(function () { //сохранить оценку
                predm = $('#predmet').val();
                ball = $('#ball').val();

                $.post('{{url('admin/api')}}', {
                    'md': 5,
                    'predm': predm,
                    'ball': ball,
                    'id': {{$dataTypeContent->id}},
                    'kurs': kurs,
                    'bid': $('#bid').val(),
                    '_token': '{{ csrf_token() }}'
                }, function (data) {

                    $('#add_ball').modal('hide');
                    loadball(kurs,{{$dataTypeContent->id}});
                    defstr = 0;
                });
            });


            $('.prkedit').click(function () { //редактор приказов
                if (defpr == 0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 16,
                    'id': defpr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {

                    $('#pbid').val(data.id);
                    $('#tpr').val(data.prikaz_id);
                    $('#prdate').val(data.data_pr);
                    $('#prname').val(data.name);
                    $('#prcomment').val(data.comment);


                    $('#add_prikaz').modal('show');
                });

            });
            $('.balledit').click(function () { //редактировать оценку
                if (defbl == 0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 7,
                    'id': defbl,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    console.log(data);
                    $('#bid').val(data.id);
                    $('#predmet').val(data.predmet_id);
                    $('#predmet').trigger('change');
                    if (data.tb != null)
                        $('#ball').val(data.tb.num);
                    $('#add_ball').modal('show');
                });

            });

            $('.bedit').click(function () {//редактировать свойства

                if (defstr == 0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 3,
                    'id': defstr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#ssv').append('<option selected>' + data.dop.name + '</option>');
                    $('#ssv').prop('disabled', true);
                    res = data.dop.variant;
                    $('#inpp').empty();
                    if (res == 0) $('#inpp').append('<input type="text" id="value" class="form-control">');
                    if (res == 1) $('#inpp').append('<input type="date" id="value" class="form-control">');
                    if (res == 2) $('#inpp').append('<input type="datetime-local" id="value" class="form-control">');
                    if (res == 3) $('#inpp').append('<textarea id="value" class="form-control"></textarea>');
                    $('#comm').val(data.comment)
                    $('#iid').val(data.id);

                    $('#value').val(data.value);
                    $('#add_portf').modal('show');
                });
            });
            $('body').on('click', '.zzd', function () {
                if ($(this).data('id') != null)
                    defbl = $(this).data('id'); else defbl = 0;
                $('.zzd').removeClass('warning');
                $(this).addClass('warning');


            });
            $('body').on('click', '.zzp', function () {
                if ($(this).data('id') != null)
                    defstr = $(this).data('id'); else defstr = 0;
                $('.zzp').removeClass('info');
                $(this).addClass('info');

            });
            $('#addsvs').click(function () {
                let id ={{$dataTypeContent->id}};
                let idtyp = $('#ssv').val();
                let value = $('#value').val();
                $.post('{{url('admin/api')}}', {
                    'md': 2,
                    'id': id,
                    'idtyp': idtyp,
                    'value': value,
                    'comm': $('#comm').val(),
                    'did': $('#iid').val(),
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#add_portf').modal('hide');
                    if (data.n == 1) {


                        $('#bod' + data.tp).find('tr.info').replaceWith(' <tr data-id="' + data.id + '">\n' +
                            '<td>' + data.typ.name + '</td>\n' +
                            '<td>' + data.value + '</td>\n' +
                            '<td>' + data.comment + '</td>\n' +
                            '</tr>');
                    } else

                        $('#bod' + data.tp).append(' <tr data-id="' + data.id + '">\n' +
                            '<td>' + data.typ.name + '</td>\n' +
                            '<td>' + data.value + '</td>\n' +
                            '<td>' + data.comment + '</td>\n' +
                            '</tr>');
                    // console.log(data);
                });

            });
            $('.addp').click(function () {//добавить портфолио
                let id = $(this).data('id');
                $.post('{{url('admin/api')}}', {
                    'md': 1,
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#ssv').empty();
                    data.forEach(function (item) {
                        $('#ssv').append('<option value="' + item.id + '" data-id="' + item.variant + '">' + item.name + '</option>');
                    })
                    $('#ssv').trigger('change');
                });

                $('#add_portf').modal('show');
            });
            $('#ssv').change(function () {
                $('#inpp').empty();
                $('#iid').val(-1);
                let res = $('#ssv option:selected').data('id');
                if (res == 0) $('#inpp').append('<input type="text" id="value" class="form-control">');
                if (res == 1) $('#inpp').append('<input type="date" id="value" class="form-control">');
                if (res == 2) $('#inpp').append('<input type="datetime-local" id="value" class="form-control">');
                if (res == 3) $('#inpp').append('<textarea id="value" class="form-control"></textarea>');
            });

            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: ['YYYY-MM-DD']
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function (i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function () {
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if (response
                        && response.data
                        && response.data.status
                        && response.data.status == 200) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function () {
                            $(this).remove();
                        })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
            loadprikaz({{$dataTypeContent->id}});
        });
    </script>
@stop
