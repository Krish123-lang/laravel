<h1>First template</h1>
{{ $xyz_address }}

@if ($xyz_address == 'biratnagar')
    Yes
@else
    No
@endif


<select id="year" name="year" class="form-control ">
    {{ $last = date('Y') - 120 }}
    {{ $now = date('Y') }}

    @for ($i = $now; $i >= $last; $i--)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>

{{-- random number --}}
<p>{{ rand() }}</p>

{{ $arr1[0] }}

@for ($i = 0; $i < 10; $i++)
    {{ $i }}
@endfor

@foreach ($arr1 as $item)
    <div>
        {{ $item }}
    </div>
@endforeach
