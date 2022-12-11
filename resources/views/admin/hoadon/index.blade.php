@extends('admin.theme.layout')
@section('content')
<div id="content">
    @if(Session::has('message'))
    <div class="alert alert-success">
      {{ Session::get('message') }}
    </div>
    @endif
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary">Quản lý</a>
    </div>
</div>
<table  class="table table-bordered" style="margin-top:20px;">
  <thead>
    <th>Id</th>
    <th>Tên khách hàng</th>
    <th>Ngày đặt hàng</th>
    <th>Giá trị đơn hàng</th>
    <th>Phương thức thanh toán</th>
    <th>Edit</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach($bills ?? '' as $bill)
      <tr>
        <td>{{ $bill->id }}</td>
        <td>{{ $bill->customer->name }} </td>
        <td>{{ $bill->date_order }}</td>
        <td>{{ number_format($bill->total, 2) }}</td>
        <td>{{ $bill->payment }}</td>
        <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
        <td>
        <form action="{{route('bill.destroy', $bill->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@stop
