<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24" >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit Employee
                            </h2>
                            <p class="mb-4">Edit: {{$employee->first_name}} {{$employee->last_name}}</p>
                        </header>
    
                        <form method="POST" action="/employees/{{$employee->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label
                                    for="first_name"
                                    class="inline-block text-lg mb-2"
                                    >First Name</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="first_name"
                                    value="{{$employee->first_name}}"
                                />
                                @error('first_name')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                    for="last_name"
                                    class="inline-block text-lg mb-2"
                                    >Last Name</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="last_name"
                                    value="{{$employee->last_name}}"
                                />
                                @error('last_name')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label
                                    for="company"
                                    class="inline-block text-lg mb-2"
                                    >Company</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="company"
                                    value="{{$employee->company}}"
                                />
                                @error('company')
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
                                    value="{{$employee->email}}"
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
                                    value="{{$employee->phone}}"
                                />
                                @error('phone')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    Update Employee
                                </button>
    
                                <a href="/employees" class="text-black ml-4"> Back </a>

                            </div>
                        </form>
                        <form method="POST" action="/employees/{{$employee->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
                        </form>
        </x-card>
    </x-layout>