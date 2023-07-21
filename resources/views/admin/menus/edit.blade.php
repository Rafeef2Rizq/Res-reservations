<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div >
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 ">
                <a href="{{route('admin.menu.index')}}" class="px-4 py-2 bg-indigo-700 hover:bg-indigo rounded-lg text-white">Menus List</a>
            </div>
            <div class="m-2 ">

                <form method="post" action="{{route('admin.menu.update',$menu->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Menu name</label>
                        <input type="text" id="name" name="name" value="{{$menu->name}}" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('name') border-red-400 @enderror" >
                        @error('name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                     <div class="mb-2">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Menu price</label>
                        <input type="number" min="0.00" step="0.01" max="1000.0" value="{{$menu->price}}" id="price" name="price" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('price') border-red-400 @enderror" >
                        @error('price')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-2">

                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Menu description</label>
                        <textarea id="description" price="description" name="description" rows="4" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('description') border-red-400 @enderror">{{$menu->description}}</textarea>
                        @error('description')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-2">

                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Categories</label>
                        <div class="mt-1">
                            <select  id="categories" name="categories[]" class="form-multiselect block w-full mt-1" multiple>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @selected($menu->categories->contains($category))>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="mb-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload image</label>
                        <img src="{{Storage::url($menu->image)}}" alt="" class="w-32  h-32">
                        <input name="image" class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
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