@extends('welcome')

@isset($branch)
@if($branch ?? '')
<button class= "btn btn-primary" (click)="openForm()">Add Branches</button> 
<table class="table table-dark">
  <h1>Branches</h1>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($branch as $item)
      <tr>
        <th scope="row"><a class="btn btn-success" href="{{url('/branch/table/'.$item->id)}}">{{$item->id}}</a></th>
        <td>{{$item->address_line}}</td>
        <td>{{$item->city}}</td>
        <td>{{$item->state}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <h2>No restaraunts</h2>
  @endIf
  @endisset