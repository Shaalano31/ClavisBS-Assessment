
<x-layout>
{{-- 
@include('partials._hero')
@include('partials._search') --}}
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@auth
@unless (count($users) == 0)

@foreach ($users as $user)
    <x-user-card :user="$user"/>
@endforeach
    
@else
    <p>No users found</p>
@endunless
</div>
@else
    <h1>Not Authorized please login to view</h1>
@endauth
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
</footer>
{{-- <div class="mt-6 p-4">
    {{$companies->links()}}
</div> --}}
</x-layout>