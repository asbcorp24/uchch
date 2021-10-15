<div class="modal fade modal-info" id="add_n">
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;
            </button>
            <h4 class="modal-title"><i class="voyager-warning"></i> Добавление нагрузки
            </h4>
        </div>

        <div class="modal-body">
            <form id="addngr" action="{{url('admin/addngr')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-xs-3">
                        <label class="control-label">Курс:</label>
                        <input type="number" min="1" max="6" id="kurs" name="kurs" class="form-control"
                               readonly>
                    </div>
                    <div class="col-xs-3">
                        <label class="control-label">Семестр:</label>
                        <input type="number" min="1" max="10" id="semestr" name="semestr" class="form-control">
                    </div>

                    <div class="col-xs-6">
                        <label class="control-label">Тип предмета:</label>
                        <select class="form-control" id="typ_pr" name="typ_pr">
                            @foreach($typpr as $tpr)
                                <option value="{{$tpr->id}}">{{$tpr->nazv}}</option>
                            @endforeach


                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="control-label">Предмет:</label>
                        <select class="form-control" id="predmet" name="predmet" style="width: 100%">
                            @foreach($predmet as $pr)
                                <option value="{{$pr->id}}">{{$pr->nazv}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="control-label">Преподаватель:</label>
                        <select class="form-control" id="prepod" name="prepod" style="width: 100%">
                            @foreach($prepod as $prp)
                                <option
                                    value="{{$prp->id}}">{{$prp->fam}} {{$prp->name}} {{$prp->otch}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label class="control-label">Группа:</label>
                        <select class="form-control" id="grupp" name="grupp">
                            @foreach($grupp as $gr)
                                <option data-col="{{$gr->col}}"
                                        value="{{$gr->id}}">{{$gr->nazv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label class="control-label">Кафедра:</label>
                        <select class="form-control" id="pck" name="pck">
                            @foreach($pck as $pc)
                                <option value="{{$pc->id}}">{{$pc->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-xs-2">
                        <label class="control-label">Гос ст:</label>
                        <input type="number" min="1" id="pogos" name="pogos" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label class="control-label">Лекц</label>
                        <input type="number" min="0" id="leck" name="leck" class="form-control itog"
                               style="background-color: #549DEA;color: white">
                    </div>
                    <div class="col-xs-2">
                        <label class="control-label">Подгр</label>
                        <input type="number" min="0" id="podgr" name="podgr" class="form-control pr1"
                               style="background-color: #eadb54;color: #130c0c">
                    </div>

                    <div class="col-xs-2">
                        <label class="control-label">Практ</label>
                        <input type="number" min="0" id="pract" name="pract" class="form-control pr1"
                               style="background-color: #549DEA;color: white">
                    </div>

                    <div class="col-xs-2">
                        <label class="control-label">Лаб</label>
                        <input type="number" min="0" id="lab" name="lab" class="form-control pr1"
                               style="background-color: #549DEA;color: white">
                    </div>
                    <div class="col-xs-2">
                        <label class="control-label">Итого пр</label>
                        <input type="number" min="0" id="it_pr" name="it_pr" class="form-control  itog"
                               readonly="readonly">
                    </div>


                </div>
                <div class="form-group">

                    <div class="col-xs-3">
                        <label class="control-label">Курс ПР</label>
                        <div class="input-group">
                            <input type="number" min="0" id="KP" name="KP" class="form-control  itog"  style="background-color: #549DEA;color: white">
                            <span class="input-group-addon avto" style="cursor: pointer" data-col="{{setting('admin.kkp')}}">Авто</span>
                        </div>

                    </div>
                    <div class="col-xs-2">
                        <label class="control-label">Экзамен</label>
                        <div class="input-group">
                            <input type="number" min="0" id="ekz" name="ekz" class="form-control  itog"  style="background-color: #549DEA;color: white">
                            <span class="input-group-addon avto" style="cursor: pointer" data-col="{{setting('admin.kezam')}}">Авто</span>
                        </div>



                    </div>

                    <div class="col-xs-2">
                        <label class="control-label">Зачет</label>
                        <div class="input-group">
                            <input type="number" min="0" id="zach" name="zach" class="form-control  itog" style="background-color: #549DEA;color: white">
                            <span class="input-group-addon avto" style="cursor: pointer" data-col="{{setting('admin.kzach')}}">Авто</span>
                        </div>

                    </div>
                    <div class="col-xs-2">
                        <label class="control-label">Иная нагрузка</label>
                        <div class="input-group">
                            <input type="number" min="0" id="inoe" name="inoe" class="form-control  itog" style="background-color: #549DEA;color: white">

                        </div>

                    </div>

                    <div class="col-xs-3">
                        <label class="control-label">CРС</label>
                        <input type="number" min="0" id="srs" name="srs" class="form-control">
                    </div>


                </div>

                <div class="form-group">

                    <div class="col-xs-4">
                        <label class="control-label">Итого по предмету</label>
                        <input type="number" min="0" id="all" name="all" class="form-control" readonly
                               style="background-color: #75ea54;color: #0c0909">
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

