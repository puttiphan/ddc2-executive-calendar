@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h5>ผู้บริหาร</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h5>กิจกรรมวันนี้</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h5>วันหยุด</h5>
                <h2>0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h5>ผู้ใช้งาน</h5>
                <h2>1</h2>
            </div>
        </div>
    </div>

</div>

@endsection