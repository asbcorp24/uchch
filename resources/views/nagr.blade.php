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

        @include('tabm')
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
                                                                                style="display: block; text-decoration: none;">{{$grp->nazv}}</a>
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
                                </div>
                            @endif
                            <span class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button"
                                            data-toggle="dropdown">Сортировка <b class="caret"></b>
                                    </button>
                                    <ul class="dropdown-menu">
                                           <li><a href="?pr={{Request::get('pr')}}&sort=1">Бюджет/коммерция</a></li>
                                        <li><a href="?pr={{Request::get('pr')}}&sort=2">Семестр</a></li>
                                         <li><a href="?pr={{Request::get('pr')}}&sort=3">группа</a></li>
                                           <li><a href="?pr={{Request::get('pr')}}&sort=4">Преподаватель</a></li>

                                    </ul>
                                </span>
                            <span class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" type="button"
                                            data-toggle="dropdown">Итоги <b class="caret"></b>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><div class="checkbox">
                                             <label><input type="checkbox"  data-id="4" class="cbi" checked>итог по группе</label>
                                            </div></li>
                                        <li><div class="checkbox">
                                             <label><input type="checkbox"  data-id="3" class="cbi" checked>итог по семестру</label>
                                            </div></li>
                                        <li><div class="checkbox">
                                             <label><input type="checkbox" data-id="1" class="cbi" checked>итог по предмету </label>
                                            </div></li>
                                         <li><div class="checkbox">
                                             <label><input type="checkbox"  data-id="2" class="cbi" checked>итог по бюджет/коммерция </label>
                                            </div></li>
                                          <li><div class="checkbox">
                                             <label><input type="checkbox"  data-id="5" class="cbi" checked>итог по преподаватель</label>
                                            </div></li>

                                    </ul>
                                </span>

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
                            <h3> Нагрузка группы {{$defgr!=null?$defgr->nazv:''}}</h3>
                            <div class="table-responsive">
                              @include('ntable')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    @include('addnagr')


    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        let defstr = 0;

        $('document').ready(function () {
            $('#prepod').select2();
            $('#predmet').select2();

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
                $('#KP').val(0);
                $('#id').val(-1);  //id: 3
                $('#kurs').val(0);
                $('#lab').val(0);
                $('#leck').val(0);
                $('#podgr').val(0);
                $('#pogos').val(0);
                $('#pract').val(0);
                $('#semestr').val(0);
                $('#srs').val(0);
                $('#typ_pr').val(0);
                $('#zach').val(0);
                $('#typ_pr').val(0);
                $('#grupp').val( {{$defgr!=null?$defgr->id:''}})
                $('#typ_pr option:first').prop('selected', true);
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
                    $('#predmet').val(data.predmet);
                    $('#prepod').val(data.prepod);
                    $('#predmet').trigger('change');
                    $('#prepod').trigger('change');
                    $('#semestr').val(data.semestr);
                    $('#srs').val(data.srs);
                    $('#typ_pr option[value=' + data.typ_pr + ']').prop('selected', true);
                    $('#typ_pr').val(data.typ_pr);
                    $('#zach').val(data.zach);
                    $('#inoe').val(data.inoe);
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
