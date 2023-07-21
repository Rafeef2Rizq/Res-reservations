<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
            <a href="{{route('admin.table.create')}}" class="px-4 py-2 bg-indigo-700 hover:bg-indigo rounded-lg text-white">New table</a>
         </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Table name
                            </th>
                            <th scope="col" class="px-6 py-3">Guest number</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Location</th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($tables as $table)

                      
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                              {{$table->name}}
                            </th>
                            
                          
                            <td class="px-6 py-4">{{$table->guest_number}}</td>
                            <td class="px-6 py-4">{{$table->status}}</td>
                            <td class="px-6 py-4">{{$table->location}}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex space-x-2">
                                <a href="{{route('admin.table.edit',$table->id)}}" class="px-4 py-2 bg-green-500
                                  hover:bg-green-700 rounded-lg text-white ">Edit</a>
                                  <form action="{{route('admin.table.destroy',$table->id)}}" method="post" class="px-4 py-2 bg-red-500
                                  hover:bg-red-700 rounded-lg text-white " onsubmit="return confirm('Are you sure to delete table?')">
                                  @csrf
                                  @method('delete')
                                  <button type="submite">Delete</button>
                              </form>
                                </div>
                              </td>
                            </tr>
                  @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>