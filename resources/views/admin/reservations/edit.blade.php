<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div >
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 ">
                <a href="{{route('admin.reservation.index')}}" class="px-4 py-2 bg-indigo-700 hover:bg-indigo rounded-lg text-white">reservations List</a>
            </div>
            <div class="m-2 ">

                <form method="post" action="{{route('admin.reservation.update',$reservation->id)}}" >
                    @csrf
                    @method('put')
                  
                    <div class="mb-6">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First name</label>
                        <input type="text" id="first_name" value="{{$reservation->first_name}}" name="first_name" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white @error('first_name') border-red-400 @enderror"  >
                        @error('first_name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last name</label>
                        <input type="text"  id="last_name" value="{{$reservation->last_name}}" name="last_name" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('last_name') border-red-400 @enderror"  >
                        @error('last_name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="email"  id="email" name="email" value="{{$reservation->email}}"  class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('email') border-red-400 @enderror"  >
                        @error('email')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="tel_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">telephone number</label>
                        <input type="text"  id="tel_number" value="{{$reservation->tel_number}}" name="tel_number" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white
                        @error('tel_number') border-red-400 @enderror"  >
                        @error('tel_number')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="res_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Reservation date</label>
                        <input type="datetime-local"  id="res_time"value="{{$reservation->res_time}}" name="res_time" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white   @error('res_time') border-red-400 @enderror"  >
                        @error('res_time')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Guest number</label>
                        <input type="number"  id="guest_number" value="{{$reservation->guest_number}}" name="guest_number" class="bg-transparent border  text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white @error('guest_number') border-red-400 @enderror" >
                        @error('guest_number')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-2">

                        <label for="table_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Table id</label>
                        <div class="mt-1">
                            <select  id="table_id" name="table_id" class="form-multiselect block w-full mt-1
                            @error('table_id') border-red-400 @enderror" >
                                @foreach ($tables as $table)
                                <option value="{{$table->id}}">{{$table->name}} ({{$table->guest_number}} Guests)</option>
                                @endforeach
                              </select>
                              @error('table_id')
                              <div class="text-sm text-red-400">{{ $message }}</div>
                          @enderror
                        </div>
                   

                    <button type="submit" class="text-white mt-4 bg-gradient-to-br bg-indigo-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 dark:shadow-gray-900 hover:scale-[1.02] transition-transform">
                        Update
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>