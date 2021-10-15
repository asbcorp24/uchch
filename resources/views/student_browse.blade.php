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
        {{$defgr!=null?$defgr->nazv:''}}
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
                                    <button class="btn btn-default  btn-lg" id="edit"><i class="voyager-edit"></i>
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
                                            <li><a href="#" class="prnagr">Добавить предметы ко всем студентам из нагрузки</a></li>
                                            <li><a href="#" class="prprik">Добавить приказ ко всем студентам группы</a></li>

                                        </ul>
                                    </div>
                                </div>
                            @endif



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

                        <div class="panel-body" id="pz">
                            <h3> Студенты {{$defgr!=null?$defgr->nazv:''}}</h3>
                            <div class="table-responsive">
                                <table class="table  table-hover table-bordered" border="1">
                                    <thead>

                                    <tr>
                                        <th>№п</th>
                                        <th>Фамилия</th>
                                        <th>Имя</th>
                                        <th>Отчество</th>
                                        <th>Дата рождения</th>
                                        <th>Действия</th>

                                    </tr>
                                    </thead>
                                    <tbody id="tble">

                                    @foreach($nagr as $ngr)


                                            <tr class="">

                                            <td></td>
                                                <td>{{$ngr->fam}}</td>
                                                <td>{{$ngr->name}}</td>
                                                <td>{{$ngr->otch}}</td>
                                                <td>{{$ngr->d_r}}</td>
                                                <td><a class="btn btn-info btn-sm" href="{{url('admin/student/'.$ngr->id.'/edit')}}">изменить</a></td>



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

    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        let defstr = 0;

        $('document').ready(function () {
            $('#savengr_add').click(function () {
                $.post('{{url('admin/api')}}', {
                    'md': 13,
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
            // $.cookie('name', 'value', { expires: 360, path: '/' });
            $('.cbi').change(function () {

                ms=[];
                $('.cbi').each(function () {
                    ms.push({id:$(this).data('id'),cb:$(this).prop('checked')})
                })

                $.cookie('vis_ch', JSON.stringify(ms), { expires: 360, path: '/' });
                if($(this).data('id')==1) if($(this).is(':checked'))$('.sm').show();else $('.sm').hide();
                if($(this).data('id')==2) if($(this).is(':checked'))$('.kb').show();else $('.kb').hide();
                if($(this).data('id')==3) if($(this).is(':checked'))$('.sms').show();else $('.sms').hide();
                if($(this).data('id')==4) if($(this).is(':checked'))$('.gm').show();else $('.gm').hide();
                if($(this).data('id')==5) if($(this).is(':checked'))$('.prp').show();else $('.prp').hide();
            })

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
                console.log(defstr);
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
                $.post('{{url('admin/delngr')}}', {
                    'id': defstr,
                    '_token': '{{ csrf_token() }}'
                }, function (data) {
                    console.log($('#tble tr[data-id="' + defstr + '"]'));
                    $('#tble tr[data-id="' + defstr + '"]').remove();
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

            let vis_ch= JSON.parse($.cookie('vis_ch'));
            vis_ch.forEach(function(item) {
                if(item.cb==true)$('.cbi[data-id="'+item.id+'"]').prop('checked','checked');
                if(item.cb==false)$('.cbi[data-id="'+item.id+'"]').removeAttr("checked");
                $('.cbi').trigger('change');
            });
        });
    </script>
@stop
