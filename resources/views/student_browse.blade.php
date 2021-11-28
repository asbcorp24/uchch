@php

    @endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.('edit')).' ')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-people"></i>
        Группа
        {{$defgr!=null?$defgr->name:''}}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">


    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">

                <div class="panel-body"><h3>Группы</h3>
                    <br>
                    <div class="table-responsive" style="max-height: 800px">
                        <table class="table  table-hover table-bordered" style="width: 100%">

                            <tbody>
                            @foreach($grupp as $grp)
                                <tr>
                                    <td data-id="{{$grp->id}}" class="selgr"><a href="?pr={{$grp->id}}"
                                                                                style="display: block; text-decoration: none;">{{$grp->name}}</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(Request::get('pr')!=null)
                                <div class="btn-group" role="group" aria-label="Операции">
                                    <button class="btn btn-info  btn-lg" id="add"><i class="voyager-plus"></i>Добавить
                                    </button>
                                    <button class="btn btn-default  btn-lg" id="editst"><i class="voyager-edit"></i>
                                        Изменить
                                    </button>
                                    <button class="btn btn-danger  btn-lg" id="delet"><i class="voyager-trash"></i>
                                        Удалить
                                    </button>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">Действия</button>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Выбор</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="prnagr">Добавить шаблоны к группе из нагрузки</a></li>

                                            <li><a href="#" class="addprk">Добавить приказ ко всем студентам группы</a></li>
                                            <li><a href="#" class="perevodgr">Перевести в другую группу</a></li>

                                        </ul>
                                    </div>
                                </div>
                            @endif


                                        <label class="form-label pull-right" for="form1">Поиск <select id="ssearch" class="form-control" style="min-width: 200px"></select></label>

                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-body" id="pz">
                            <h3> Студенты {{$defgr!=null?$defgr->nazv:''}}</h3>
                            <div class="table-responsive">
                                <table class="table  table-hover table-bordered" border="1">
                                    <thead>

                                    <tr>

                                        <th>Фамилия</th>
                                        <th>Имя</th>
                                        <th>Отчество</th>
                                        <th>Дата рождения</th>
                                        <th>Действия</th>

                                    </tr>
                                    </thead>
                                    <tbody id="tble">

                                    @foreach($nagr as $ngr)


                                            <tr data-id="{{$ngr->id}}">


                                                <td>{{$ngr->fam}}</td>
                                                <td>{{$ngr->name}}</td>
                                                <td>{{$ngr->otch}}</td>
                                                <td>{{$ngr->d_r}}</td>
                                                <td>

                                                </td>



                                            </tr>
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
    </div>
    <div class="modal fade modal-info" id="add_n">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Добавление студента
                    </h4>
                </div>

                <div class="modal-body">
                    <form id="addngr" action="{{url('admin/addstudent')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-xs-3">
                                <label class="control-label">Фамилия:</label>
                                <input type="text" id="fam" name="fam" class="form-control">
                            </div>
                            <div class="col-xs-3">
                                <label class="control-label">Имя:</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                            <div class="col-xs-6">
                                <label class="control-label">Отчество:</label>
                                <input type="text" id="otch" name="otch" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="control-label">Дата:</label>
                                <input type="date" id="d_r" name="d_r" class="form-control">
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="control-label">Группа:</label>
                                <select class="form-control" id="grupp" name="grupp">
                                    @foreach($grupp as $gr)
                                        <option data-col="{{$gr->col}}"
                                                value="{{$gr->id}}">{{$gr->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>





                        <div class="form-group">

                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-info">Сохранить</button>
                            </div>


                        </div>
                        <input type="hidden" name="id" id="id" value="-1">
                    </form>
                </div>

                <div class="modal-footer">


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
                            <input type="hidden" id="user" value="{{\Illuminate\Support\Facades\Request::input('pr',-1)}}">
                            <input type="hidden" id="bid" value="-1">
                            <label for="pr_nagr">Группа</label>
                            <select id="pr_nagr" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12"
                        <label for="pr_sem">Семестр</label>
                            <select id="pr_sem" class="form-control">

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
                    <h4 class="modal-title"><i class="voyager-warning"></i> Добавить приказ к группе   {{$defgr!=null?$defgr->name:''}}</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" id="puser" value="{{\Illuminate\Support\Facades\Request::input('pr',-1)}}">
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
    <!--Перевод в другую группу -->
    <div class="modal fade modal-info" id="form_perevod">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Перевод студента </h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>текущая группа  {{$defgr!=null?$defgr->name:''}}</h3>
                            <input type="hidden" id="puser" value="{{\Illuminate\Support\Facades\Request::input('pr',-1)}}">
                            <input type="hidden" id="pbid" value="-1">
                            <label> перевод в группу </label>
                            <select id="pergrp" class="form-control">
                                @foreach($grupp as $grp)
                                    <option value="{{$grp->id}}">{{$grp->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <label>Приказ</label>
                            <select id="pprikaz" class="form-control">




                            </select>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-xs-12">
                            <label> Дата перевода</label>
                            <input type="date" id="perdate" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label> Комментарии</label>
                            <textarea id="percomment" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="iid" value="-1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-info" id="spers">перевести</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        let defstr = 0;
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) {
                return null;
            }
            return decodeURI(results[1]) || 0;
        }
        $('document').ready(function () {
           let par=$.urlParam('sel') ;
           if(par!=null){
            defstr =par;
           $('#tble tr[data-id="'+par+'"]').addClass('info');
               $(window).scrollTop( $('#tble tr[data-id="'+par+'"]').position().top);
           }
            $('#ssearch').on('select2:select', function (e) {
                var data = e.params.data;
                var url = "{{url('admin/student')}}?pr="+data.id+"&sel="+data.sid;
                $(location).attr('href',url);

            });
            $('#ssearch').select2({
                minimumInputLength: 3,
                ajax: {
                    url: '{{url('admin/api')}}',
                    method:'POST',
                    data: function (params) {
                        var query = {
                            search: params.term,
                            md:21,
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    }
                }
            });

            $('#spers').click(function () {//провести перевод
                pprikaz = $('#pprikaz').val();
                if (pprikaz <= 0) {
                    $('#form_perevod').modal('hide');
                    toastr.warning('Вы не выбрали приказ!');
                    return;
                }
                pergrp = $('#pergrp').val();
                perdate = $('#perdate').val();
                percomment = $('#percomment').val();
                $.post('{{url('admin/api')}}', {
                    'md': 20,
                    'id': defstr,
                    'pprikaz':pprikaz,
                    'pergrp':pergrp,
                    'perdate':perdate,
                    'percomment':percomment,
                    'old':'{{$defgr!=null?$defgr->name:''}}',
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#form_perevod').modal('hide');
                    toastr.info('Перевод проведен успешно!');
                    location.reload();

                })
            });

            $('.perevodgr').click(function () { //Перевести в другую группу
                if(defstr==0) return;
                $.post('{{url('admin/api')}}', {
                    'md': 19,
                    'id':defstr,

                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#pprikaz').empty();
                    $('#pprikaz').append('<option value="-1">Выберите приказ</option>');
data.forEach(function (item) {
$('#pprikaz').append('<option value="'+item.id+'">'+item.data_pr+' '+item.n.name+' '+item.name+'</option>');
})
                    $('#form_perevod').modal('show');

                });


            })

            $('#editst').click(function () { //переход на страницу редактирования
                if(defstr==0) return;
                url= '{{url('admin/student')}}/'+defstr+'/edit';
                $(location).attr('href',url);

            })
            $('#saveprk').click(function () {//сохранить приказ
                $.post('{{url('admin/api')}}', {
                    'md': 18,
                    'pid': $('#pbid').val(),
                    'puser': $('#puser').val(),
                    'prdate':$('#prdate').val(),
                    'tpr':$('#tpr').val(),
                    'grp':{{\Illuminate\Support\Facades\Request::input('pr')}},
                    'prname':$('#prname').val(),
                    'prcomment':$('#prcomment').val(),
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    toastr.info('Добавлен приказ к группе!');

                    $('#add_prikaz').modal('hide');
                });
            });


            $('.addprk').click(function () {//добавить приказ
                $('#pbid').val(-1);
                $('#add_prikaz').modal('show');

            });
            $('#savengr_add').click(function () {
                $.post('{{url('admin/api')}}', {
                    'md': 26,
                    'sem': $('#pr_sem').val(),
                    'grp': $('#pr_nagr').val(),
                    'ingrp':{{\Illuminate\Support\Facades\Request::input('pr')}},
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#add_pr_nagr').modal('hide');
                    toastr.info('Добавлены предметы к группе!');
                });
            });
            $('#pr_nagr').change(function () {
                $.post('{{url('admin/api')}}', {
                    'md': 12,
                    'grp': $('#pr_nagr').val(),

                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    if(data.length==0) {
                        toastr.error('На данный семестр нет нагрузки!');

                        $('#savengr_add').hide();
                    } else   $('#savengr_add').show();
                    $('#pr_sem').empty();
                data.forEach(function(item){
                    $('#pr_sem').append('<option>'+item.semestr+'</option>');
                });



                });
            });

            $('.prnagr').click(function (e) {
                e.preventDefault;
                console.log('1');
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

            $('.avto').click(function () {
                $(this).parent().find('input').first().val(Math.round($('#grupp option:selected').data('col')*parseFloat($(this).data('col'))));
                $('.pr1').trigger('change');
            });


            $('.toggleswitch').bootstrapToggle();
            $('#print').click(function () {
                $('#pz').printThis({
                    importCSS: false,            // import parent page css
                    importStyle: false, loadCSS: '{{url('css/pz.css')}}',
                });
            });
            $('#tble tr').click(function () {
                if ($(this).data('id') != null)
                    defstr = $(this).data('id'); else defstr = 0;
                $('#tble tr').removeClass('info');
                $(this).addClass('info');

            });
            $('[data-toggle="tooltip"]').tooltip();


            $('#add').click(function () {
                $('#fam').val('');
                $('#name').val('');
                $('#otch').val('');
                $('#grupp').val( {{$defgr!=null?$defgr->id:''}})

                $('#add_n').modal('show');

            });

            $('.itog').change(function () {
                let it = 0;
                $('.itog').each(function () {
                    tmp = $(this).val();
                    if ((!!tmp)) {
                        it = it + parseInt(tmp);
                        console.log(tmp);
                    }
                })
                console.log(it);
                $('#all').val(it);
            })
            $('.pr1').change(function () {
                $('#it_pr').val($('#podgr').val() * $('#pract').val() + $('#podgr').val() * $('#lab').val());
                $('.itog').trigger('change');
            })


            $('#delet').click(function () {
                if (defstr == 0) return;
                $.post('{{url('admin/api')}}', {
                   'md':22,
                    'id': defstr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                  if(data==1){
                      toastr.warning('Удалить студента можно только из неучебной группы!');
                      return;
                  }
                    $('#tble tr[data-id="' + defstr + '"]').remove();
                    toastr.info('Студент успешно удален');
                    defstr = 0;
                });
            });
            $('#edit').click(function () {
                if (defstr == 0) return;
                $.post('{{url('admin/loadngr')}}', {
                    'id': defstr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    $('#KP').val(data.KP);
                    $('#grupp option[value=' + data.grupp + ']').prop('selected', true);
                    $('#id').val(data.id);  //id: 3
                    $('#kurs').val(data.kurs);
                    $('#lab').val(data.lab);
                    $('#leck').val(data.leck);
                    $('#pck option[value=' + data.pck + ']').prop('selected', true);
                    $('#podgr').val(data.podgr);
                    $('#pogos').val(data.pogos);
                    $('#pract').val(data.pract);
                    $('#predmet option[value=' + data.predmet + ']').prop('selected', true);
                    $('#prepod option[value=' + data.prepod + ']').prop('selected', true);
                    $('#semestr').val(data.semestr);
                    $('#srs').val(data.srs);
                    $('#typ_pr option[value=' + data.typ_pr + ']').prop('selected', true);
                    $('#typ_pr').val(data.typ_pr);
                    $('#zach').val(data.zach);
                    $('.pr1').trigger('change');
                    $('#add_n').modal('show');
                });
            });
            $('#semestr').change(function () {
                let sem = $('#semestr').val();
                if (sem <= 2) $('#kurs').val(1);
                if ((sem >= 3) && (sem <= 4)) $('#kurs').val(2);
                if ((sem >= 5) && (sem <= 6)) $('#kurs').val(3);
                if ((sem >= 7) && (sem <= 8)) $('#kurs').val(4);
                if ((sem >= 9) && (sem <= 10)) $('#kurs').val(5);
            });


        });
    </script>
@stop
