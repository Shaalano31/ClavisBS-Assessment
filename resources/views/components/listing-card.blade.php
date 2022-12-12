@props(['company'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/companies/{{$company->id}}/edit">{{$company->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$company->email}}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$company->website}}
            </div>
        </div>
    </div>
</x-card>