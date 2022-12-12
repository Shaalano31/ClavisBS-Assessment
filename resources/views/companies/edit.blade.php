<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24" >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit Company
                            </h2>
                            <p class="mb-4">Edit: {{$company->name}}</p>
                        </header>
    
                        <form method="POST" action="/companies/{{$company->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label
                                    for="name"
                                    class="inline-block text-lg mb-2"
                                    >Company Name</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="name"
                                    value="{{$company->name}}"
                                />
                                @error('name')
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
                                    value="{{$company->email}}"
                                />
                                @error('email')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label
                                    for="website"
                                    class="inline-block text-lg mb-2"
                                >
                                    Website
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="website"
                                    value="{{$company->website}}"
                                />
                                @error('website')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <label for="logo" class="inline-block text-lg mb-2">
                                    Company Logo
                                </label>
                                <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="logo"
                                />
                                <img
                                    class="w-48 mr-6 mb-6"
                                    src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/no-image.png')}}"
                                    alt=""
                                />
                                @error('logo')
                                    <p class = "text-red-500 text-xs mt-1">{{$message}} </p>
                                @enderror
                            </div>
    
                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    Update Company
                                </button>
    
                                <a href="/companies" class="text-black ml-4"> Back </a>

                            </div>
                        </form>
                        <form method="POST" action="/companies/{{$company->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
                        </form>
        </x-card>
    </x-layout>