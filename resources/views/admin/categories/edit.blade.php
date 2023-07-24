<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.category.index')}}" class="px-4 py-2 bg-indigo-700 hover:bg-indigo rounded-lg text-white">Category List</a>
            </div>
            <div class="m-2 p-2">

                <form method="post" action="{{route('admin.category.update',$category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your name</label>
                        <input type="text" name="name" id="name" value="{{$category->name}}" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('name') border-red-400 @enderror" >
                        @error('name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">

                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your description</label>
                        <textarea id="description" name="description" rows="4" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('description') border-red-400 @enderror" >{{$category->description}}</textarea>
                        @error('description')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload image</label>
                      <div>
                      <img class="h-32 w-32" src="{{Storage::url($category->image)}}" alt="">
                      </div>
                        <input name="image" class="block w-full text-sm text-gray-900 border  rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        @error('image') border-red-400 @enderror" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        @error('image')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror

                    </div>

                    <button type="submit" class="text-white bg-gradient-to-br bg-indigo-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 dark:shadow-gray-900 hover:scale-[1.02] transition-transform">
                        Update
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>