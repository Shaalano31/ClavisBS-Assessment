
<x-layout>
{{-- 
@include('partials._hero')
@include('partials._search') --}}
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@unless (count($employees) == 0)

@foreach ($employees as $employee)
    <x-employee-card :employee="$employee"/>
@endforeach
    
@else
    <p>No employees found</p>
@endunless
</div>
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a
        href="/employees/create"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Add Employee</a
    >
</footer>
{{-- <div class="mt-6 p-4">
    {{$companies->links()}}
</div> --}}
</x-layout>