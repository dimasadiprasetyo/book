<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Welcome Login</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

            <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

            <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

            <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">
            {{-- <script nonce="9da3a93a-d2f8-42c8-9eec-b94b06487ae5">(function(w,d){!function(f,g,h,i){f[h]=f[h]||{};f[h].executed=[];f.zaraz={deferred:[],listeners:[]};f.zaraz.q=[];f.zaraz._f=function(j){return function(){var k=Array.prototype.slice.call(arguments);f.zaraz.q.push({m:j,a:k})}};for(const l of["track","set","debug"])f.zaraz[l]=f.zaraz._f(l);f.zaraz.init=()=>{var m=g.getElementsByTagName(i)[0],n=g.createElement(i),o=g.getElementsByTagName("title")[0];o&&(f[h].t=g.getElementsByTagName("title")[0].text);f[h].x=Math.random();f[h].w=f.screen.width;f[h].h=f.screen.height;f[h].j=f.innerHeight;f[h].e=f.innerWidth;f[h].l=f.location.href;f[h].r=g.referrer;f[h].k=f.screen.colorDepth;f[h].n=g.characterSet;f[h].o=(new Date).getTimezoneOffset();if(f.dataLayer)for(const s of Object.entries(Object.entries(dataLayer).reduce(((t,u)=>({...t[1],...u[1]})))))zaraz.set(s[0],s[1],{scope:"page"});f[h].q=[];for(;f.zaraz.q.length;){const v=f.zaraz.q.shift();f[h].q.push(v)}n.defer=!0;for(const w of[localStorage,sessionStorage])Object.keys(w||{}).filter((y=>y.startsWith("_zaraz_"))).forEach((x=>{try{f[h]["z_"+x.slice(7)]=JSON.parse(w.getItem(x))}catch{f[h]["z_"+x.slice(7)]=w.getItem(x)}}));n.referrerPolicy="origin";n.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(f[h])));m.parentNode.insertBefore(n,m)};["complete","interactive"].includes(g.readyState)?zaraz.init():f.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head> --}}
    


            <style>
                body{
                  margin: 0;
                  padding: 0;
                  background: url(voltage.jpg);
                  background-size: 1350px  635px;
                  background-position: center;
                  width: 1400px;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                }
                .card{
                    background: transparent;
                    color: white;
                }
            </style>  
    </head>
    
    <body class="hold-transition login-page" >
        <div class="login-box" style="background: rgba(238, 7, 7, 0)">
            <div class="login-logo">
                <a href="#" style="color: white"><b>Awas</b>KESETRUM</a>
            </div>

            <div class="card transparent" >
                <div class="card-body login-card-body" style="background: rgba(209, 196, 196, 0.171)">
                    <p class="login-box-msg" style="color: white"><b> Silahkan masukkan username dan password </b></p>
                    <form action="{{route('postlogin')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group mb-3" style="background: rgba(238, 7, 7, 0)">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background-color: white">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text" style="background-color: white">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                        <label for="remember" style="color: white">
                                            Remember Me
                                        </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>


        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
    </body>
</html>