@props(['user'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">{{$user->username}}</h3>
            <div class="text-xl font-bold mb-4">{{$user->email}}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$user->phone}}
            </div>
        </div>
    </div>
</x-card>