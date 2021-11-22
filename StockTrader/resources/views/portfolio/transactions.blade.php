<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
            <tr class="border-b">
                <th class="text-left p-3 px-5">Company</th>
                <th class="text-left p-3 px-5">Current price</th>
                <th></th>
            </tr>
            {{--FOREACH--}}
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                <td class="p-3 px-5">======================</td>
                <td class="p-3 px-5">============================</td>
                <td class="p-3 px-5">
                </td>
                <td class="p-3 px-5 flex justify-end">
                    <button
                    <a</td>
                type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none
                focus:shadow-outline">Sell</button></td>
                <a href="{{ URL::to('stocks/' . $value->id . '/edit') }}">Sell</a>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
</x-app-layout>
