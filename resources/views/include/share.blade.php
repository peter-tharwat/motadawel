 <div style="background: #fff" class="mt-3 d-flex row px-3 justify-content-start py-3">
    <div class="col-12 font-2 pb-3 border-bottom mb-3">
      شارك
    </div> 
    <div class="col-12 row d-flex px-0  ">  
      <a href="https://www.facebook.com/sharer/sharer.php?u={{\Request::fullUrl()}}" style="width: 120px;" class="px-0 mx-1 d-inline-block my-2">
      <div class=" btn btn-primary font-1 mx-1"  style="width: 120px;" >
        <span class="fab fa-facebook"></span> فيس بوك
      </div>
      </a>
    <a href="https://twitter.com/share?url={{\Request::fullUrl()}}" style="width: 120px;" class="px-0 mx-1 d-inline-block my-2">
    <div class=" btn btn-info font-1 mx-1" style="width: 120px;color: #fff">
      <span class="fab fa-twitter"></span> تويتر
    </div>
  </a>

  <a href="https://www.linkedin.com/shareArticle?mini=true&url={{\Request::fullUrl()}}" style="width: 120px;" class="px-0 mx-1 d-inline-block my-2">
    <div class="btn btn-primary font-1 mx-1" style="width: 120px;">
      <span class="fab fa-linkedin-in"></span> لينكد ان
    </div>
  </a> 
  <a href="https://api.whatsapp.com/send?text={{\Request::fullUrl()}}" style="width: 120px;" class="px-0 mx-1 d-inline-block my-2">
    <div class=" btn btn-success font-1 mx-1" style="width: 120px;">
      <span class="fab fa-whatsapp"></span> واتس آب
    </div>
  </a>
    </div>
  </div>