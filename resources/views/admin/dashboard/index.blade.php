@extends('admin.dashboard.include')
@section('content')
 
<style>
        body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  display: flex;
  justify-content: center;
  height: auto;
  /*background-color: #262626;*/
}

.container {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-auto-rows: 300px;
  grid-gap: 30px;
  margin: auto 0;
}

@media (min-width: 576px) and (max-width: 767.98px) {
  .container {
    width: 540px;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) {
  .container {
    width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    width: 1140px;
  }
}

.container .box {
  position: relative;
  height: 60%;
  box-sizing: border-box;
  overflow: hidden;
  border-radius: 10px;
}

.container .box .icon {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: 0.5s;
}

.container .box:hover .icon {
  top: 20px;
  left: calc(50% - 40px);
  width: 80px;
  height: 80px;
  border-radius: 50%;
}

.container .box .icon .fa {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 80px;
  transition: 0.5x;
  color: #fff;
}

.container .box:hover .icon .fa {
  font-size: 40px;
}

.container .box .content {
  position: absolute;
  top: 100%;
  height: calc(100% - 100px);
  text-align: center;
  padding: 20px;
  box-sizing: border-box;
  transition: 0.5s;
}

.container .box:hover .content {
  top: 100px;
}

.container .box .content h3 {
  margin: 0 0 10px;
  padding: 0;
  color: #fff;
  font-size: 24px;
}

.container .box .content p {
  margin: 0;
  padding: 0;
  color: #fff;
  font-size: 16px;
}

.container .box:nth-child(1) .icon {
  background-color: #392C70;
}

.container .box:nth-child(1) {
  background-color: #7063AA;
}

.container .box:nth-child(2) .icon {
  background-color: #392C70;
}

.container .box:nth-child(2) {
  background-color: #7063AA;
}

.container .box:nth-child(3) .icon {
  background-color: #392C70;
}

.container .box:nth-child(3) {
  background-color: #7063AA;
}
.container::before, .container::after {

    display: table;
    content: " ";
    display: none;

}

</style>
<div class="container" style="margin-top: inherit;">
  <div class="box">
    <div class="icon">
        <a href="{{ Auth::user()->role == 2 ? route('users') :route('manager.users') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
    </div>
    <div class="content">
      <h3>Users</h3>
      <p>{{ $users}}</p>
    </div>
  </div>
  <div class="box" ">
    <div class="icon">
      <a href="{{ Auth::user()->role == 2 ? route('shop') : route('manager.shop') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>
    <div class="content">
      <h3>Shops</h3>
      <p>{{ $shops}}</p>
    </div>
  </div>
  <div class="box" ">
    <div class="icon">
      <a href="{{route('manager.index')}}"><i class="fa fa-users" aria-hidden="true"></i></a>
    </div>
    <div class="content">
      <h3>Managers</h3>
      <p>{{ $managers }}</p>
    </div>
  </div>
</div>
  <!-- container-scroller -->
@endsection