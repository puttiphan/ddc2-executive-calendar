@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">

    <h1 class="text-2xl font-bold">
        ผู้บริหาร
    </h1>

    <a href="#"
       class="px-4 py-2 bg-blue-600 text-white rounded-lg">
        เพิ่มผู้บริหาร
    </a>

</div>

<div class="bg-white rounded-xl shadow">

<table class="min-w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-3 text-left">ชื่อ</th>

<th class="p-3 text-left">ตำแหน่ง</th>

<th class="p-3 text-left">หน่วยงาน</th>

<th class="p-3 text-left">สถานะ</th>

</tr>

</thead>

<tbody>

@forelse($bosses as $boss)

<tr class="border-t">

<td class="p-3">

{{ $boss->full_name }}

</td>

<td class="p-3">

{{ $boss->position }}

</td>

<td class="p-3">

{{ $boss->department }}

</td>

<td class="p-3">

@if($boss->active)

<span class="text-green-600">

ใช้งาน

</span>

@else

<span class="text-red-600">

ปิดใช้งาน

</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="4" class="text-center p-6">

ยังไม่มีข้อมูล

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-6">

{{ $bosses->links() }}

</div>

@endsection