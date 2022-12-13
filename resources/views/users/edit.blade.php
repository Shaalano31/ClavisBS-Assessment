<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24" >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit User
                            </h2>
                            <p class="mb-4">Edit: {{$user->username}}</p>
                        </header>
    
                        <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label
                                    for="username"
                                    class="inline-block text-lg mb-2"
                                    >Username</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="username"
                                    value="{{$user->username}}"
                                />
                                @error('username')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="email" class="inline-block text-lg mb-2"
                                    >Email</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="email"
                                    value="{{$user->email}}"
                                />
                                @error('email')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="phone" class="inline-block text-lg mb-2"
                                    >Phone</label
                                >
                                <input
                                    type="phone"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="phone"
                                    value="{{$user->phone}}"
                                />
                                @error('phone')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="profile_picture" class="inline-block text-lg mb-2">
                                    Profile Picture
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="profile_picture"
                                />
                                <img
                                    class="w-48 mr-6 mb-6"
                                    src="{{$user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('/images/no-image.png')}}"
                                    alt=""
                                />
                                @error('profile_picture')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    Update user
                                </button>
    
                                <a href="/users" class="text-black ml-4"> Back </a>

                            </div>
                        </form>
                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
                        </form>
        </x-card>
    </x-layout>