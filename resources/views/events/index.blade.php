<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ปฏิทินผู้บริหาร
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-end mb-4">
                    <button
                        id="btnNewEvent"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        เพิ่มกิจกรรม
                    </button>
                </div>

                <div id="calendar" style="min-height:700px;"></div>

            </div>
        </div>
    </div>

</x-app-layout>