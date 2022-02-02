@extends('layout.app')
@section('title','Gallery')
@section('content')
<button name="submit" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#GalleryPhotoUploadModal" >Upload Gallery Photo</button>



<div class="modal fade" id="GalleryPhotoUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Gallery Upload</h5>
        </div>
        <div class="modal-body" >
         <br>
         <input class="form-control mb-3" id="galleryimgInput" type="file" style="color: white;">
        <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" id="SaveGalleryPhoto" class="btn btn-success">Upload</button>
        </div>
      </div>
    </div>
  </div>


  <section id="gallery" class="gallery section" style="margin-bottom: -20px; margin-top: -20px;">
    <div class="container-fluid">
      <div class="section-header">
     <h2 class="fadeInDown animated">Gallery</h2>
      </div>
      <div class="row no-gutter">
        @foreach($galleryphoto as $galleryphoto)
        <div class="col-lg-3 col-md-6 col-sm-6 work">
            <a href="{{$galleryphoto->gallery_photo_location}}" class="work-box"> <img src="{{$galleryphoto->gallery_photo_location}}" alt="">
          <div class="overlay">
            <div class="overlay-caption">
               <p>image description</p>
            </div>
          </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>

</section>

@endsection

@section('script')
<script type = "text/javascript">
    $('#galleryimgInput').change(function () {
            var reader=new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function (event) {
               var ImgSource= event.target.result;
                $('#imgPreview').attr('src',ImgSource)
            }
        })


    $('#SaveGalleryPhoto').on('click', function(){
    var gallery_photo = $('#galleryimgInput').prop('files')[0];
    var formData = new FormData();
    formData.append('photo', gallery_photo);
    axios.post("/galleryphotoUpload", formData).then(function(response){
        if(response.status == 200)
        {
            $('#GalleryPhotoUploadModal').modal('hide');
            toastr.success('Photo Upload Success');
            window.location.href="/Gallery";
        }
        else
        {
            alert('Issue');
        }
    }).catch(function(error){

    })
})
</script>
@endsection
