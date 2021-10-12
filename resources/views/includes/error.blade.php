@if (session()->has('error'))
{!!
   session()->get('error')
  !!}
@endif
