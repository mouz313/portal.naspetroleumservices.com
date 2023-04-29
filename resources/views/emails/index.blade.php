<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New User Registration Email</title>
</head>
<style>
    body{margin-top:20px;}
.section-title {
    position: relative;
}
.section-title h2 {
    color: #1d2025;
    position: relative;
    margin: 0;
    font-size: 24px;
}
@media (min-width: 768px) {
    .section-title h2 {
        font-size: 28px;
    }
}
@media (min-width: 992px) {
    .section-title h2 {
        font-size: 34px;
    }
}
.section-title.title-ex1 h2 {
    padding-bottom: 20px;
}
@media (min-width: 768px) {
    .section-title.title-ex1 h2 {
        padding-bottom: 30px;
    }
}
@media (min-width: 992px) {
    .section-title.title-ex1 h2 {
        padding-bottom: 40px;
    }
}
.section-title.title-ex1 h2:before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 12px;
    width: 110px;
    height: 1px;
    background-color: #d6dbe2;
}
@media (min-width: 768px) {
    .section-title.title-ex1 h2:before {
        bottom: 17px;
    }
}
@media (min-width: 992px) {
    .section-title.title-ex1 h2:before {
        bottom: 25px;
    }
}
.section-title.title-ex1 h2:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 12px;
    width: 40px;
    height: 1px;
    background-color: #0cc652;
}
@media (min-width: 768px) {
    .section-title.title-ex1 h2:after {
        bottom: 17px;
    }
}
@media (min-width: 992px) {
    .section-title.title-ex1 h2:after {
        bottom: 25px;
    }
}
.section-title.title-ex1.text-center h2:before {
    left: 50%;
    transform: translateX(-50%);
}
.section-title.title-ex1.text-center h2:after {
    left: 50%;
    transform: translateX(-50%);
}
.section-title.title-ex1.text-right h2:before {
    left: auto;
    right: 0;
}
.section-title.title-ex1.text-right h2:after {
    left: auto;
    right: 0;
}
.section-title.title-ex1 p {
    font-family: "Montserrat", sans-serif;
    color: #8b8e93;
    font-size: 14px;
    font-weight: 300;
}


.price-card {
    background: #f5f5f6;
    padding: 40px 35px;
    position: relative;
    border-radius: 2px;
    overflow: hidden;
}
.price-card:before {
    position: absolute;
    content: "";
    top: 0;
    right: -35px;
    width: 88px;
    height: 88px;
    background: #0cc652;
    opacity: 0.2;
    border-radius: 8px;
    transform: rotate(45deg);
}
.price-card:after {
    position: absolute;
    content: "";
    top: 30px;
    right: -35px;
    width: 88px;
    height: 88px;
    background: #0cc652;
    opacity: 0.2;
    border-radius: 8px;
    transform: rotate(45deg);
}
.price-card h2 {
    font-size: 26px;
    font-weight: 600;
}
.price-card .btn {
    font-size: 11px;
    border-radius: 100px;
    padding: 0 25px;
    border: 0;
    color: #fff;
    float: right;
}
.price-card .btn.btn-primary {
    border: 0 !important;
}
.price-card.featured {
    background: #fff;
    border: 1px solid #ebebeb;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}
.price-card:hover .btn {
    background: #0cc652;
    border-color: #0cc652;
}
p.price span {
    display: inline-block;
    padding: 45px 15px 50px;
    padding-right: 0;
    font-size: 50px;
    font-weight: 600;
    color: #0cc652;
    position: relative;
}
p.price span:before {
    position: absolute;
    content: "$";
    font-size: 16px;
    top: 25px;
    font-weight: 300;
    left: 0;
}
.pricing-offers {
    padding: 0 0 10px;
}
.pricing-offers li {
    padding: 0 0 16px;
    line-height: 18px;
}
ul li {
    list-style-type: none;
}
.btn.btn-mid {
    height: 40px;
    line-height: 40px;
    padding: 0 20px;
}
</style>
<body>

    {{-- --------------Template-------------------}}

    <section class="pricing-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <h1>NAS Petroleum Services</h1>
            </div>
            <!-- Pricing Table starts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="price-card ">
                        <h2>Please Login with these Credentials</h2>
                        <ul class="pricing-offers">
                            <li>User Name: {{ $data['name']}} </li>
                            <li>E-Mail Address: {{$data['email']}} </li>
                            <li>Password: {{$data['password']}} </li>
                        </ul>
                        <div class="row mb-0">
                            <div class="col-md-4" style="float: left; font-style: italic;">
                               <a href="{{ route('login') }}"> <button type="submit" class="btn btn-primary" style="color: #3fc875;font-size: 20px;background-color: black;">
                                    {{ __('Login') }}
                                </button></a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-primary" style="color: #3fc875;
                                    font-size: 22px;
                                    background-color: black;" href="{{ route('password.request') }}">
                                        {{ __('Rest Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    {{-- --------------End Template---------------------}}
    {{-- <h3>Delivery Email</h3>
    <p>User Name: {{ $data['name']}}</p>
    <p>Password: {{ $data['password']}}</p>
    <a href="http://127.0.0.1:8000/">Login</a> --}}
</body>
</html>