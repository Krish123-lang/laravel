@include('common.header')

<h1>About page</h1>


@include('common.inner', ['page' => 'this is a about page'])
{{-- @includeIf('common.common', ['page' => 'this is a about page']) --}}
