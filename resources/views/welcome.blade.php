@extends('layouts.app')
@section('content')
<style >
    #main-nav{
        background-color: transparent!important
    }
    body{
        background-image: url('/images/bg.png')!important;background-position: top;background-repeat: no-repeat;
    }
    .nav-link:hover {
        color: #232323 !important;
    } 
    /*border-bottom: 60px solid #f16429*/
</style>
<div class="col-12 px-0 " style="position: relative;">
    <div class="col-12 px-2 d-flex justify-content-center pt-lg-5 container" style="min-height:calc(100vh - 75px) ;">
        <div class="col-12 px-2 d-inline-block pt-lg-5 mt-lg-4 ">
            <div class="col-12 px-0 m-auto pt-lg-5 row d-flex ">
                <div class="col-12 col-lg-7 px-0 my-5 my-lg-0">
                    <h1 style="color: #444;text-align: right;" class="mb-4  font-3 font-lg-8 pt-lg-5">مرحباً بك معنا !</h1>
                    <h4 class=" text-justify px-0 font-2 font-lg-2 col-12 col-lg-8 pt-4" style="color: #777;line-height: 1.9;max-width: 80%">
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد <br> النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية،
                    </h4>
                    <div class="col-12 px-0">
                        <button class="btn btn-primary px-5 font-3 py-2 pb-3 mt-3" style="border-radius: 50px">إبدا الآن</button>
                    </div>
                </div>
                <div class="col-12 col-lg-5 px-0  pt-3">
                    <div class="plyr__video-embed" id="player">
                        <iframe src="https://www.youtube.com/embed/bTqVqk7FSmY?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div style="position: absolute;bottom: 40px; left: 0px ;right:0px" class="text-center d-none d-xl-block">
            <a href="#how-it-works" class="d-inline-block text-center" style="cursor: pointer;text-decoration: unset;">
                <span class="fal fa-mouse-alt font-3" style="color: #111"></span>
                <div class="font-1 mt-1" style="color: #111">معلومات أكثر</div>
            </a>
        </div>
        </div>
        
    </div>
</div>
{{-- <div class="col-12 px-0 " style="max-height: 380px">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 120 1440 320">
        <path fill="#2b5bbb" fill-opacity="1" d="M0,256L120,266.7C240,277,480,299,720,298.7C960,299,1200,277,1320,266.7L1440,256L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
    </svg>
</div> --}}
{{--
--}}
<div class="col-12 px-0 py-4" style="background: #fff">
    <div class="col-12 px-0">
    </div>
</div>
<div class="col-12 px-2 pb-lg-5 " id="how-it-works" style="background: #fff">
    <div class="col-12 container pb-5">
        <div class="col-12 px-0 mb-5 text-center">
            <h2>الأقسام</h2>
        </div>
        <div class="col-12 px-0 d-flex row py-5">
            <div class="col-12 col-lg-4">
                <div class="col-12 p-2 course my-3" style="border:2px solid #f1f1f1;border-radius: 3px;overflow: hidden;">
                    <img src="https://nafezly-blog.s3.eu-west-3.amazonaws.com/2020/12/Untitled.jpg" style="
                  border-radius: inherit!important;
                  width: 100%;
                  height: 200px;
                  object-fit: cover;
                  font-family: 'object-fit: cover; object-position: bottom;';
                  vertical-align: middle;
                  border-radius: 0!important;
                  ">
                    <div class="col-12 px-0 py-3">
                        <h3 style="line-height: 1.5;" class="text-center">الدورات المتاحة</h3>
                        <h5 style="line-height: 1.5;font-size: 14px;color: #999" class="text-center">من خلال الدورات في موقعنا بمكنك الاطلاع على آخر الدورات المتاحة من خلالنا فيمكنك مشاكدتها او الاشتراك فيها بكل سهولة مباشرة من خلال الموقع الخاص بنا</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="col-12 p-2 course my-3" style="border:2px solid #f1f1f1;border-radius: 3px;overflow: hidden;">
                    <img src="https://nafezly-blog.s3.eu-west-3.amazonaws.com/2020/12/Untitled.jpg" style="
                  border-radius: inherit!important;
                  width: 100%;
                  height: 200px;
                  object-fit: cover;
                  font-family: 'object-fit: cover; object-position: bottom;';
                  vertical-align: middle;
                  border-radius: 0!important;
                  ">
                    <div class="col-12 px-0 py-3">
                        <h3 style="line-height: 1.5;" class="text-center">شركاء النجاح</h3>
                        <h5 style="line-height: 1.5;font-size: 14px;color: #999" class="text-center">من خلال الدورات في موقعنا بمكنك الاطلاع على آخر الدورات المتاحة من خلالنا فيمكنك مشاكدتها او الاشتراك فيها بكل سهولة مباشرة من خلال الموقع الخاص بنا</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="col-12 p-2 course my-3" style="border:2px solid #f1f1f1;border-radius: 3px;overflow: hidden;">
                    <img src="https://nafezly-blog.s3.eu-west-3.amazonaws.com/2020/12/Untitled.jpg" style="
                  border-radius: inherit!important;
                  width: 100%;
                  height: 200px;
                  object-fit: cover;
                  font-family: 'object-fit: cover; object-position: bottom;';
                  vertical-align: middle;
                  border-radius: 0!important;
                  ">
                    <div class="col-12 px-0 py-3">
                        <h3 style="line-height: 1.5;" class="text-center">منصة المحلل الفني الإحترافية</h3>
                        <h5 style="line-height: 1.5;font-size: 14px;color: #999" class="text-center">من خلال الدورات في موقعنا بمكنك الاطلاع على آخر الدورات المتاحة من خلالنا فيمكنك مشاكدتها او الاشتراك فيها بكل سهولة مباشرة من خلال الموقع الخاص بنا</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 px-2 py-5" style="background: #f1f1f1">
    <div class="col-12 container py-5">
        <div class="col-12 px-0 text-center">
            <h2>آراء المتدربين</h2>
        </div>
        <div class="col-12 px-0 d-flex row py-2">
            <div id="carouselExampleDark" class="carousel carousel-dark slide py-5" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <div class="d-block col-12" style="min-height: 230px"></div>
                        <div class="carousel-caption">
                            <h5 style="line-height: 1.7">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</h5>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <div class="d-block col-12" style="min-height: 230px"></div>
                        <div class="carousel-caption">
                            <h5 style="line-height: 1.7">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block col-12" style="min-height: 230px"></div>
                        <div class="carousel-caption">
                            <h5 style="line-height: 1.7">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</h5>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            {{-- <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleInterval" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-12 px-0 ">
                            <h4 style="color: #333" class="carousel-caption d-block w-100">
                                <img src="https://almotadawal.com/website/logo.png" class="d-block w-100" alt="...">
                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            </h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://almotadawal.com/website/logo.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://almotadawal.com/website/logo.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                    <span class="fal fa-angle-left font-8" style="color: #333"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <span class="fal fa-angle-right font-8" style="color: #333"></span>
                </a>
            </div> --}}
        </div>
    </div>
</div>
<div class="col-12 px-2 py-lg-5 " style="background: #fff">
    <div class="col-12 container py-5">
        <div class="col-12 px-0 mb-5 text-center">
            <h2>تابعنا</h2>
        </div>
        <div class="col-12 px-0 d-flex row py-5">
            <div class="col-12 col-lg-3 justify-content-center d-flex">
                <span class="fab fa-twitter font-12" style="color: #0088ff;width: 120px;height: 120px;border-radius: 50%;border:2px solid #0088ff;padding: 22px 16px"></span>
            </div>
            <div class="col-12 col-lg-3 justify-content-center d-flex">
                <span class="fab fa-youtube font-11" style="color: #b70c3e;width: 120px;height: 120px;border-radius: 50%;border:2px solid #b70c3e;padding: 25px 17px"></span>
            </div>
            <div class="col-12 col-lg-3 justify-content-center d-flex">
                <span class="fab fa-snapchat font-12" style="color: #ecb91d;width: 120px;height: 120px;border-radius: 50%;border:2px solid #ecb91d;padding: 19px 18px"></span>
            </div>
            <div class="col-12 col-lg-3 justify-content-center d-flex">
                <span class="fab fa-instagram font-12" style="color: #f44336;width: 120px;height: 120px;border-radius: 50%;border:2px solid #f44336;padding: 19px 23px"></span>
            </div>
        </div>
    </div>
</div>
{{-- <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
        <path d="M-237.02,101.14 C-33.86,305.42 220.08,48.84 498.30,285.69 L562.63,59.70 L-29.91,157.39 Z" style="stroke: none; fill: #08f;"></path>
    </svg></div>
--}}
<div class="col-12 px-0" style="background: #0088ff">
    <div class="container  py-5 px-0">
        <div class="col-12 px-0 py-5  text-center d-flex justify-content-center row">
            <div class="col-12 text-center">
                <h2 class="text-center font-2 font-md-3 font-lg-7" style="color: #fff;line-height: 1.4">إبدأ التعلم الآن ؟</h2>
                <br>
            </div>
            <div class="d-flex mx-auto px-0 justify-content-center">
                <a href="#" style="text-decoration: none!important;" class="">
                    <div style="background: #03a7ee;
    width: 166px;
    text-align: center;
    border-radius: 73px;
    color: #ffffff;
    height: 44px;
    padding-top: 7px;
    box-shadow: 0px 0px 12px #03a7ee;
" class="pb-2">
                        سجل الآن
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>{{--
<div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
        <path d="M-237.02,101.14 C-20.87,73.52 220.08,48.84 501.12,1.48 L532.73,-75.48 L-31.04,-11.34 Z" style="stroke: none; fill: #08f;"></path>
    </svg></div>
--}}
@endsection
