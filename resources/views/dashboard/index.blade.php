<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Executive Calendar
            </h2>

            <button
                id="openEventModal"
                type="button"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
            >
                + เพิ่มกิจกรรม
            </button>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

                <div class="bg-white shadow rounded-lg p-5">
                    <div class="text-sm text-gray-500">
                        ผู้บริหาร
                    </div>

                    <div class="text-3xl font-bold mt-2">
                        0
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-5">
                    <div class="text-sm text-gray-500">
                        กิจกรรมวันนี้
                    </div>

                    <div class="text-3xl font-bold mt-2">
                        0
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-5">
                    <div class="text-sm text-gray-500">
                        งานด่วน
                    </div>

                    <div class="text-3xl font-bold mt-2">
                        0
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-5">
                    <div class="text-sm text-gray-500">
                        วันหยุดเดือนนี้
                    </div>

                    <div class="text-3xl font-bold mt-2">
                        0
                    </div>
                </div>

            </div>

            <div class="bg-white shadow rounded-lg p-6">

                <div id="calendar"></div>

                <x-event-modal />

            </div>

        </div>
    </div>
</x-app-layout>