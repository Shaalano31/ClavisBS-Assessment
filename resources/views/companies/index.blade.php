
<x-layout>

@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@unless (count($companies) == 0)

@foreach ($companies as $company)
    <x-listing-card :company="$company"/>
@endforeach
    
@else
    <p>No companies found</p>
@endunless
</div>

{{-- <div class="mt-6 p-4">
    {{$companies->links()}}
</div> --}}
</x-layout>