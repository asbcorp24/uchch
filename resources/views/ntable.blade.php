<table class="table  table-hover table-bordered" border="1">
    <thead>
    <tr>
        <th colspan="6"></th>

        <th></th>
        <th></th>
        <th colspan="4">Практ</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th>№п</th>
        <th>Курс</th>
        <th>Семестр</th>
        <th>Группа</th>
        <th>Кафедра</th>
        <th>Тип предмета</th>
        <th>Предмет</th>
        <th>Преподаватель</th>
        <th>Станд</th>
        <th>Лекц</th>
        <th>Подгр</th>
        <th>Практ</th>
        <th>Лаб</th>
        <th>Итог</th>
        <th>СРС</th>
        <th>Экз</th>
        <th>Зач</th>
        <th>Курс ПР</th>
        <th>Иная</th>
        <th>Всего</th>

    </tr>
    </thead>
    <tbody id="tble">
    @php $tm=0;
                                        $a=1;
                                        $mas=[];
                                        $mas['leck']=0;
                                         $mas['itog']=0;
                                           $mas['srs']=0;
                                              $mas['ekz']=0;
                                                 $mas['zach']=0;
                                                  $mas['KP']=0;
                                                    $mas['pogos']=0;
                                                      $mas['all']=0;
                                                         $mas['inoe']=0;
                                                    $all=$mas;
                                                      $sem=$mas;
                                                        $sems=$mas;
                                                         $igr=$mas;
                                                         $prepd=$mas;
                                                         $prd=-1;
                                                         $gr=-1;
                                                    $oldk='-1';
                                                    $gr_pr='-1';
                                                    $ssem=-1;
                                                    $smin=0;
    @endphp
    @foreach($nagr as $ngr)
        @if(( $prd!=$ngr->prepod)and($prd!='-1'))

            <tr class="danger prp">

                <td colspan="9">итого:{{$prepd['prep']}}</td>

                <td>{{$prepd['leck']}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$prepd['itog']}}</td>
                <td>{{$prepd['srs']}}</td>
                <td>{{$prepd['ekz']}}</td>
                <td>{{$prepd['zach']}}</td>
                <td>{{$prepd['KP']}}</td>
                <td>{{$prepd['inoe']}}</td>
                <td><strong>{{$prepd['all']}}</strong></td>
            </tr>
        @endif
        @if(( $gr!=$ngr->grupp)and($gr!='-1'))

            <tr class="success gm">

                <td colspan="9">итого:{{$igr['grupp']}}</td>

                <td>{{$igr['leck']}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$igr['itog']}}</td>
                <td>{{$igr['srs']}}</td>
                <td>{{$igr['ekz']}}</td>
                <td>{{$igr['zach']}}</td>
                <td>{{$igr['KP']}}</td>
                <td>{{$igr['inoe']}}</td>
                <td><strong>{{$igr['all']}}</strong></td>
            </tr>
        @endif
        @if(( $gr_pr!=$ngr->grupp.'_'.$ngr->predmet)and($gr_pr!='-1') and($smin!=0))

            <tr class="success sm">

                <td colspan="9">Итого: {{$sem['predmet']}}</td>

                <td>{{$sem['leck']}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$sem['itog']}}</td>
                <td>{{$sem['srs']}}</td>
                <td>{{$sem['ekz']}}</td>
                <td>{{$sem['zach']}}</td>
                <td>{{$sem['KP']}}</td>
                <td>{{$sem['inoe']}}</td>
                <td><strong>{{$sem['all']}}</strong></td>
            </tr>
        @endif
        @if(($ssem!=$ngr->semestr)and($ssem!='-1'))

            <tr class="info sms">

                <td colspan="9">Итого семестр: {{$sems['sem']}}</td>

                <td>{{$sems['leck']}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$sems['itog']}}</td>
                <td>{{$sems['srs']}}</td>
                <td>{{$sems['ekz']}}</td>
                <td>{{$sems['zach']}}</td>
                <td>{{$sems['KP']}}</td>
                <td>{{$sems['inoe']}}</td>
                <td><strong>{{$sem['all']}}</strong></td>
            </tr>
        @endif

        @if((($ngr->kommerc!=$oldk)and($oldk!='-1')))
            <tr class="warning kb">

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>  <td></td>
                <td></td>
                <td>{{$mas['leck']}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$mas['itog']}}</td>
                <td>{{$mas['srs']}}</td>
                <td>{{$mas['ekz']}}</td>
                <td>{{$mas['zach']}}</td>
                <td>{{$mas['KP']}}</td>
                <td>{{$mas['inoe']}}</td>
                <td><strong>{{$mas['all']}}</strong></td>
            </tr>
        @endif



        @php
            {
            if($ngr->kommerc!=$oldk){
         $mas['leck']=0;
          $mas['itog']=0;
            $mas['srs']=0;
               $mas['ekz']=0;
                  $mas['zach']=0;
                   $mas['KP']=0;
                     $mas['pogos']=0;
                         $mas['all']=0;
                            $mas['inoe']=0;
if($ngr->kommerc==0){ echo "<tr class='kb'><td colspan='17'>Бюджетные</td></tr>";}
if($ngr->kommerc==1){ echo "<tr class='kb'><td colspan='17'>Коммерческие</td></tr>";}
$oldk=$ngr->kommerc;
}}
if( $gr_pr!=$ngr->grupp.'_'.$ngr->predmet){
        $gr_pr=$ngr->grupp.'_'.$ngr->predmet;
         $sem['leck']=0;
          $sem['itog']=0;
            $sem['srs']=0;
               $sem['ekz']=0;
                  $sem['zach']=0;
                   $sem['KP']=0;
                     $sem['pogos']=0;
                         $sem['all']=0;
                         $sem['predmet']=$ngr->predmets->nazv;
                          $smin=0;
                            $sem['inoe']=0;
        } else $smin++;
if( $ssem!=$ngr->semestr){
       $ssem=$ngr->semestr;
         $sems['leck']=0;
          $sems['itog']=0;
            $sems['srs']=0;
               $sems['ekz']=0;
                  $sems['zach']=0;
                   $sems['KP']=0;
                     $sems['pogos']=0;
                         $sems['all']=0;
                           $sems['inoe']=0;
                         $sems['sem']=$ngr->semestr;

        }

         if( $gr!=$ngr->grupp){
      $gr=$ngr->grupp;
         $igr['leck']=0;
          $igr['itog']=0;
            $igr['srs']=0;
               $igr['ekz']=0;
                  $igr['zach']=0;
                   $igr['KP']=0;
                     $igr['pogos']=0;
                         $igr['all']=0;
                           $igr['inoe']=0;
                         $igr['grupp']=$ngr->grupps->nazv;

        }

         if( $prd!=$ngr->prepod){
    $prd=$ngr->prepod;
         $prepd['leck']=0;
          $prepd['itog']=0;
            $prepd['srs']=0;
               $prepd['ekz']=0;
                  $prepd['zach']=0;
                   $prepd['KP']=0;
                     $prepd['pogos']=0;
                         $prepd['all']=0;
                          $prepd['inoe']=0;
                         $prepd['prep']=$ngr->prepods->fam." ".$ngr->prepods->name;

        }

        @endphp



        <tr data-id="{{$ngr->id}}">
            <td>{{$a++}}</td>
            <td>{{$ngr->kurs}}</td>
            <td>{{$ngr->semestr}}</td>
            <td>{{$ngr->grupps->nazv}}</td>
            <td>{{$ngr->kaf->name}}</td>
            <td>{{$ngr->typ_pred!=null?$ngr->typ_pred->nazv:""}}</td>

            <td>{{$ngr->predmets->nazv}}</td>
            <td>{{$ngr->prepods->fam}} {{$ngr->prepods->name}}</td>
            <td>{{$ngr->pogos}}</td>
            <td>{{$ngr->leck}}</td>
            <td>{{$ngr->podgr}}</td>
            <td>{{$ngr->pract}}</td>
            <td>{{$ngr->lab}}</td>
            <td><strong>{{$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab}}</strong>
            </td>
            <td>{{$ngr->srs}}</td>
            <td>{{$ngr->ekz}}</td>
            <td>{{$ngr->zach}}</td>
            <td>{{$ngr->KP}}</td>
            <td>{{$ngr->inoe}}</td>
            <td>
                <strong>{{$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck}}</strong>
            </td>
            @php
                $tm=$tm+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck+$ngr->inoe;
                $mas['leck']=$mas['leck']+$ngr->leck;
                  $mas['srs']=$mas['srs']+$ngr->srs;
                     $mas['ekz']=$mas['ekz']+$ngr->ekz;
                        $mas['zach']=$mas['zach']+$ngr->zach;
                            $mas['KP']=$mas['KP']+$ngr->KP;
                             $mas['inoe']=$mas['inoe']+$ngr->inoe;
                                     $mas['pogos']=$mas['pogos']+$ngr->pogos;
                $mas['itog']=$mas['itog']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab;;
                    $mas['all']= $mas['all']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck+$ngr->inoe;

             $all['leck']=$all['leck']+$ngr->leck;
                  $all['srs']=$all['srs']+$ngr->srs;
                     $all['ekz']=$all['ekz']+$ngr->ekz;
                        $all['zach']=$all['zach']+$ngr->zach;
                            $all['KP']=$all['KP']+$ngr->KP;
                             $all['inoe']=$all['inoe']+$ngr->inoe;
                                     $all['pogos']=$all['pogos']+$ngr->pogos;
                $all['itog']=$all['itog']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab;;

           $sem['leck']=$sem['leck']+$ngr->leck;
                  $sem['srs']=$sem['srs']+$ngr->srs;
                     $sem['ekz']=$sem['ekz']+$ngr->ekz;
                        $sem['zach']=$sem['zach']+$ngr->zach;
                            $sem['KP']=$sem['KP']+$ngr->KP;
                                     $sem['pogos']=$sem['pogos']+$ngr->pogos;
                                       $sem['inoe']=$sem['inoe']+$ngr->inoe;
                $sem['itog']=$sem['itog']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab;;
$sem['all']= $sem['all']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck+$ngr->inoe;

                  $sems['leck']=$sems['leck']+$ngr->leck;
                  $sems['srs']=$sems['srs']+$ngr->srs;
                     $sems['ekz']=$sems['ekz']+$ngr->ekz;
                        $sems['zach']=$sems['zach']+$ngr->zach;
                            $sems['KP']=$sems['KP']+$ngr->KP;
                                     $sems['pogos']=$sems['pogos']+$ngr->pogos;
                                         $sems['inoe']=$sems['inoe']+$ngr->inoe;
                $sems['itog']=$sems['itog']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab;;
$sems['all']= $sems['all']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck+$ngr->inoe;


                    $igr['leck']=$igr['leck']+$ngr->leck;
                  $igr['srs']=$igr['srs']+$ngr->srs;
                     $igr['ekz']=$igr['ekz']+$ngr->ekz;
                        $igr['zach']=$igr['zach']+$ngr->zach;
                            $igr['KP']=$igr['KP']+$ngr->KP;
                                     $igr['pogos']=$igr['pogos']+$ngr->pogos;
                                       $igr['inoe']=$igr['inoe']+$ngr->inoe;
                $igr['itog']=$igr['itog']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->inoe;;
$igr['all']= $igr['all']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck+$ngr->inoe;

                 $prepd['leck']=$prepd['leck']+$ngr->leck;
                  $prepd['srs']=$prepd['srs']+$ngr->srs;
                     $prepd['ekz']=$prepd['ekz']+$ngr->ekz;
                        $prepd['zach']=$prepd['zach']+$ngr->zach;
                            $prepd['KP']=$prepd['KP']+$ngr->KP;
                                     $prepd['pogos']=$prepd['pogos']+$ngr->pogos;
                                       $prepd['inoe']=$prepd['inoe']+$ngr->inoe;
                $prepd['itog']=$prepd['itog']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab;;
$prepd['all']= $prepd['all']+$ngr->pract*$ngr->podgr+$ngr->podgr*$ngr->lab+$ngr->ekz+$ngr->zach+$ngr->KP+$ngr->leck+$ngr->inoe;
            @endphp
        </tr>
    @endforeach

    @if(($ssem!=-1)and($ssem!='-1'))

        <tr class="info sms">

            <td colspan="9">Итого семестр:  {{$sems['sem']}}</td>

            <td>{{$sems['leck']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$sems['itog']}}</td>
            <td>{{$sems['srs']}}</td>
            <td>{{$sems['ekz']}}</td>
            <td>{{$sems['zach']}}</td>
            <td>{{$sems['KP']}}</td>
            <td>{{$sems['inoe']}}</td>
            <td><strong>{{$sem['all']}}</strong></td>
        </tr>
    @endif
    @if(($prd!='-1'))

        <tr class="danger prp">

            <td colspan="9">итого: {{$prepd['prep']}}</td>

            <td>{{$prepd['leck']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$prepd['itog']}}</td>
            <td>{{$prepd['srs']}}</td>
            <td>{{$prepd['ekz']}}</td>
            <td>{{$prepd['zach']}}</td>
            <td>{{$prepd['KP']}}</td>
            <td>{{$prepd['inoe']}}</td>
            <td><strong>{{$prepd['all']}}</strong></td>
        </tr>
    @endif
    @if( $gr!='-1')
        <tr class="success gm">

            <td colspan="9">Итого: {{$igr['grupp']}}</td>

            <td>{{$igr['leck']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$igr['itog']}}</td>
            <td>{{$igr['srs']}}</td>
            <td>{{$igr['ekz']}}</td>
            <td>{{$igr['zach']}}</td>
            <td>{{$igr['KP']}}</td>
            <td>{{$igr['inoe']}}</td>
            <td><strong>{{$igr['all']}}</strong></td>
        </tr>
    @endif

    @if(($gr_pr!='-1') and($smin!=0))
        <tr class="success sm">

            <td colspan="9">{{$sem['predmet']}}</td>

            <td>{{$sem['leck']}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$sem['itog']}}</td>
            <td>{{$sem['srs']}}</td>
            <td>{{$sem['ekz']}}</td>
            <td>{{$sem['zach']}}</td>
            <td>{{$sem['KP']}}</td>
            <td>{{$sem['inoe']}}</td>
            <td><strong>{{$sem['all']}}</strong></td>
        </tr>
    @endif
    <tr class="warning kb">

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$mas['leck']}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$mas['itog']}}</td>
        <td>{{$mas['srs']}}</td>
        <td>{{$mas['ekz']}}</td>
        <td>{{$mas['zach']}}</td>
        <td>{{$mas['KP']}}</td>
        <td>{{$mas['inoe']}}</td>
        <td><strong>{{$mas['all']}}</strong></td>
    </tr>
    <tr class="danger">

        <td colspan="9"></td>
        <td>{{$all['leck']}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$all['itog']}}</td>
        <td>{{$all['srs']}}</td>
        <td>{{$all['ekz']}}</td>
        <td>{{$all['zach']}}</td>
        <td>{{$all['KP']}}</td>
        <td>{{$all['inoe']}}</td>
        <td><strong>{{$tm}}</strong></td>
    </tr>

    </tbody>
</table>
