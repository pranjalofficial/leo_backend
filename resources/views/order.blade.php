@extends('welcome')
<div style="display: none">
    {{ $total = 0 }}
    {{ $final = 0 }}
</div>

@isset($order)
    
    <table class="table table-dark">
        <h1>Orders</h1>
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Cost</th>
              <th scope="col">Count</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order as  $item)
            <tr>
              <th scope="row"><a class="btn btn-success">{{$item->item_name}}</a></th>
              <td>{{$item->item_cost}}</td>
              <td><a class="btn btn-primary" href="{{url('/minus/order/'.$item->id)}}" >-</a><span style="padding: 2%">{{$item->item_count}}</span><a class="btn btn-primary">+</a></td>
              <td>{{$item->item_total}}</td>
            </tr>
            @endforeach
            @foreach ($order as  $item)
            <div style="display: none">{{$total += $item->item_total}}</div>
            @endforeach
            <tr>
                <th scope="row" ></th>
                <td></td>
                <td>Total</td>
                <td>{{$total}}</td>
            </tr>

            <tr>
                <th scope="row" ></th>
                <td></td>
                <td>5% CGST</td>
                <td>{{$total * 0.05}}</td>
            </tr>

            <tr>
                <th scope="row" ></th>
                <td></td>
                <td>5% SGST</td>
                <td>{{$total * 0.05}}</td>
            </tr>

            <tr>
                <th scope="row" ></th>
                <td></td>
                <td>5% SGST</td>
                <td>{{$final = $total + $total * 0.05 + $total * 0.05}}</td>
            </tr>

          </tbody>
        </table>

        {{-- <h5>Total:</h5>
        <div>
            
            <div style="display: none">{{$total += $item->item_total}}</div>
            @endforeach
        </div>

        {{$total}} --}}

@endisset
