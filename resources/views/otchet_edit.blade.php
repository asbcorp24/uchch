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
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <button class="btn btn-info" id="tnadd">добавить таблицу в отчет</button>
                    <button id="btn-tip" class="btn btn-danger" >Справка</button>
                </div>

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
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
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
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
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


        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-heading">Переменные к запросу</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-control" id="tps">
                                    <option value="1">Число</option>
                                    <option value="2">Дата</option>
                                    <option value="3">Дата-Время</option>

                                    <option value="4">Список</option>
                                    <option value="5">Список на основе запроса</option>
                                </select>
                                <button class="btn btn-info" id="addp">Добавить</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <table class="table table-striped">
                                    <thead>
                                    <tr><td>Тип</td><td>Имя на экране</td><td>Имя переменной</td><td>Запрос</td><td></td></tr></thead>

                                    <tbody id="tbda">
                                    @foreach ($perem as $per)
                                        <tr id="zer{{$per->id}}">
                                            <td>@if($per->type==1)число @endif
                                                @if($per->type==2)дата @endif
                                                @if($per->type==3)дата-время @endif
                                                @if($per->type==4)список @endif
                                                @if($per->type==5)Список на основе запроса @endif



                                            </td>
                                            <td>{{$per->displayname}}</td><td>{{$per->name}}</td><td>{{$per->sql}}</td><td><button class="btn btn-info redp" data-id="{{$per->id}}">Изменить</button></td></tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModalBox" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Заголовок модального окна</h4>
                </div>
                <!-- Основное содержимое модального окна -->
                <div class="modal-body">
                    <input type="hidden" id="id_per" value="-1">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Наименование переменной</label>
<input name="naim" id="pnaim" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Имя на экране </label>
                            <input name="naim" id="dnaim" class="form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12" id="pzn">

                        </div>

                    </div>
                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="spe">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('#btn-tip').click(function () {
                toastr.info("При использовании переменных SET @val=1 они должны быть в 1 строке а все остальное в следующих строках при использовании данных пишем их через : (:data)", "Справка");
            });
            $('[data-toggle="tooltip"]').tooltip();
            $('#tbda').on('click','.redp',function () {
id=$(this).data('id');
                $.post('{{url('api')}}', {
                    'mt': '1979',

                    'id': id,

                    '_token': '{{ csrf_token() }}'
                }, function (data) {

                   $('#pnaim').val(data.name);
                  $('#dnaim').val(data.displayname);
                    let znach=data.type;
                    let tmp="";
                    if(znach==1)  tmp='<label>Числовое значение</label>\n' +
                        ' <input name="naim" id="znaim" class="form-control" type="number" data-id="1">';
                    if(znach==2)  tmp='<label>Дата</label>\n' +
                        ' <input name="naim" id="znaim" class="form-control" type="date" data-id="2">';
                    if(znach==3)  tmp='<label>Дата - время</label>\n' +
                        ' <input name="naim" id="znaim" class="form-control" type="datetime-local" data-id="3">';
                    if(znach==4)  tmp='<label>Список</label>' +
                        ' <p>Введите значения списка через запятую</p>\n'+
                        ' <textarea name="naim" id="znaim" class="form-control"  data-id="4"></textarea>';
                    if(znach==5)  tmp='<label>Sql запрос</label>' +
                        ' <p>на выходе должно быть два значения [id,name] показывается [name] выводится [id]</p>\n'+
                        ' <textarea name="naim" id="znaim" class="form-control"  data-id="5"></textarea>';
                    $('#pzn').html(tmp);



                   $('#znaim').val(data.sql);

                  $('#znaim').data('id',data.type);

                    $('#id_per').val(data.id);

                    $("#myModalBox").modal('show');

                });


            });
       $('#addp').click(function () {
        let znach=$('#tps').val();
      let tmp="";
         if(znach==1)  tmp='<label>Числовое значение</label>\n' +
             ' <input name="naim" id="znaim" class="form-control" type="number" data-id="1">';
           if(znach==2)  tmp='<label>Дата</label>\n' +
               ' <input name="naim" id="znaim" class="form-control" type="date" data-id="2">';
           if(znach==3)  tmp='<label>Дата - время</label>\n' +
               ' <input name="naim" id="znaim" class="form-control" type="datetime-local" data-id="3">';
           if(znach==4)  tmp='<label>Список</label>' +
               ' <p>Введите значения списка через запятую</p>\n'+
               ' <textarea name="naim" id="znaim" class="form-control"  data-id="4"></textarea>';
           if(znach==5)  tmp='<label>Sql запрос</label>' +
               ' <p>на выходе должно быть два значения [id,name] показывается [name] выводится [id]</p>\n'+
               ' <textarea name="naim" id="znaim" class="form-control"  data-id="5"></textarea>';
         $('#pzn').html(tmp);
           $("#myModalBox").modal('show');
       })

        });
        $('#spe').click(function () {
let pnaim=$('#pnaim').val();
            let dnaim=$('#dnaim').val();
let znaim=$('#znaim').val();
let id=$('#znaim').data('id');
            let id_per=$('#id_per').val();

            $.post('{{url('api')}}', {
                'mt': '1978',
                'pnaim': pnaim,
                'znaim': znaim,
                'dnaim': dnaim,
                'id': id,
                'id_per':id_per,
                'id_otch':{{$dataTypeContent->id}},

                '_token': '{{ csrf_token() }}'
            }, function (data) {
/*displayname: "zer"
id: 1
name: "zero"
otchet_id: "1"
sql: "иван петров иванов"
type: "4"*/
                $('#zer'+data.id).remove();
              $('#tbda').append('<tr id="zer'+data.id+'" ><td></td><td>'+data.displayname+'</td><td>'+data.name+'</td><td>'+data.sql+'</td><td><button class="btn btn-info redp" data-id="'+data.id+'">Изменить</button></td></tr>')
                $("#myModalBox").modal('hide');

            });


        });
        tinymce.baseURL = "{{ asset('tinymce') }}";
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
            $('#tnadd').click(function () {
                tinyMCE.execCommand('mceInsertContent', false, '!!!table!!!');
            });
        });
    </script>
@stop
