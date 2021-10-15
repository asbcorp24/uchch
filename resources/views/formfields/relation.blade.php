<br>
<label>{{Auth::user()->uch->name}}</label>
<input type="hidden"
       class="form-control"
       name="{{ $row->field }}"
       data-name="{{ $row->display_name }}"
       @if($row->required == 1) required @endif
       step="any"
       placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
       value="{{Auth::user()->ucheb_id}}">
