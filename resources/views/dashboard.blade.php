@extends('welcome')

@isset($rest)
@if($rest ?? '')
<button class= "btn btn-primary" (click)="openForm()">Add Resturants</button> 
<table class="table table-dark">
  <h1>Resturants</h1>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($rest as $item)
        <th scope="row"><a class="btn btn-success" href="/branch">{{$item->id}}</a></th>
        <td>{{$item->name}}</td>
        <td>{{$item->descp}}</td>
        <td><img src={{$item->img}}></td>
        @endforeach
      </tr>
    </tbody>
  </table>
  @else
  <h2>No restaraunts</h2>
  @endIf
  @endisset

  

  {{-- <form style="display:block">
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> --}}

  {{-- <script>
      openForm(){

      }
  </script> --}}
    
