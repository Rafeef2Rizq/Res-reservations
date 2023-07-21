<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div >
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 ">
                <a href="{{route('admin.table.index')}}" class="px-4 py-2 bg-indigo-700 hover:bg-indigo rounded-lg text-white">Tables List</a>
            </div>
            <div class="m-2 ">

                <form method="post" action="{{route('admin.table.update',$table->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Table name</label>
                        <input type="text" id="name" name="name" value="{{$table->name}}" class="bg-transparent border text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('name') border-red-400 @enderror" >
                        @error('name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                     <div class="mb-2">
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Guest number</label>
                        <input type="number" min="0.00" step="0.01" max="1000.0" value="{{$table->guest_number}}" id="guest_number" name="guest_number" class="bg-transparent border text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white  @error('guest_number') border-red-400 @enderror" >
                        @error('guest_number')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-2">

                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"> Status</label>
                        <div class="mt-1">
                            <select  id="status" name="status" class="form-multiselect block w-full mt-1" >
                                @foreach (App\Enums\TablesStatus::cases() as $status)
                                <option value="{{$status->value}}">{{$status->name}}</option>
                                @endforeach
                            
                               
                              </select>
                        </div>
                    </div>
                    <div class="mb-2">

                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Location</label>
                        <div class="mt-1">
                            <select  id="location" name="location" class="form-multiselect block w-full mt-1" >
                                @foreach (App\Enums\TablesLocation::cases() as $location)
                                <option value="{{$location->value}}">{{$location->name}}</option>
                                @endforeach
                            
                               
                              </select>
                        </div>
                    </div>
                   

                    <button type="submit" class="text-white bg-gradient-to-br bg-indigo-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 dark:shadow-gray-900 hover:scale-[1.02] transition-transform">
                        Update
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>