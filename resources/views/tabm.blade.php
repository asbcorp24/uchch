<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">

            <li  @if(strpos(Request::path(),'nagr_')==false) class="active" @endif >
                <a href="{{url('admin/nagr')}}">По группе</a>
            </li>
            <li @if(strripos(Request::path(),'nagr_prepod')) class="active" @endif>
                <a href="{{url('admin/nagr_prepod')}}">По преподавателю</a>
            </li>
            <li @if(strripos(Request::path(),'nagr_spec')) class="active" @endif>
                <a href="{{url('admin/nagr_spec')}}">По специальности</a>
            </li>
            <li @if(strripos(Request::path(),'nagr_typ')) class="active" @endif>
                <a href="{{url('admin/nagr_typ')}}">По типу предмета</a>
            </li>
            <li @if(strripos(Request::path(),'nagr_itog')) class="active" @endif>
                <a href="{{url('admin/nagr_itog')}}">Сводная</a>
            </li>
        </ul>

    </div>
