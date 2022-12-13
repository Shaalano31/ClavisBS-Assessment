@props(['employee'])

<x-card>
    <h3 class="text-2xl">
        <a href="/employees/{{$employee->id}}/edit">{{$employee->first_name}} {{$employee->last_name}}</a>
    </h3>
    <div class="text-xl font-bold mb-4">{{$employee->email}}</div>
    <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$employee->company}}
    </div>
</x-card>