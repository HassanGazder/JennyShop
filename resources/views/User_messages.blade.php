@extends('layout')





@section('master')
<div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full inner_page_head">
                     <h3>User Messages</h3>
                  </div>
               </div>
            </div>
         </div>
<div class="jumbotron">

    <div class="container">
    <!-- <div class="heading_container heading_center">
               <h2>
                  User <span>Messages</span>
               </h2>
            </div> -->
<table class="table table-light table-hover table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">User Message</th>
    </tr>
  </thead>
  <tbody>
  @foreach($User_messages as $us)
    <tr>
      <th scope="row">{{$us->id}}</th>
      <td>{{$us->name}}</td>
      <td>{{$us->email}}</td>
      <td>{{$us->subject}}</td>
      <td>{{$us->message}}</td>
    </tr>
    <tr>
    @endforeach
      <!-- <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>

    </div>
</div>





@endsection