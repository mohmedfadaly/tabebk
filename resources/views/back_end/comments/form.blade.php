@php $input = "comment"; @endphp
<div class="col-md-12">
    <div class="wrap-input100 text-right">
        <label for="title">تعليق</label>
        <textarea name="{{ $input }}"  cols="30" rows="2" class="input100">{{ isset($Post) ? $Post->{$input} : '' }}</textarea>

    </div>
</div>