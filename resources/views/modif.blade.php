@extends('templateback')
@section('titre')
<title>Intelligence Artificiel</title>
@endsection
@section('content')  
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{url('images/bg.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 class="mb-3 bread">Ajout de nouvelle contenue</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
          <div class="col-md-8 block-9 mb-md-5">
            <form action={{route('modif')}} class="bg-light p-5 contact-form" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$article->id_contenu}}">
              <div class="form-group">
                <label for="titre">Titre</label>
                <input id="titre" type="text" class="form-control" placeholder="Titre" name="titre" value="{{$article->titre}}">
              </div>
              <div class="form-group">
                <label for="lieu">Lieu</label>
                <input id="lieu" type="text" class="form-control" placeholder="Lieu" name="lieu" value="{{$article->lieu}}">
              </div>
              <div class="form-group">
                <label for="date">Date de publication: {{$article->date_publication}}</label>
                <input id="date" type="date" class="form-control" placeholder="Date de publication" name="date" value="{{$article->date_publication}}">
              </div>
              <div class="form-group">
                <label for="selectImage">Photo</label>
                <input type="file" class="form-control" placeholder="photo" id="selectImage">
                <input type="hidden" id="imageCode" value="#" name="photo"/>

              </div>
              <div class="form-group">
                <textarea name="contenue" id="editor" cols="30" rows="7" class="form-control" ><?php echo($article->body) ?></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Modifier" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
    </section>
	@endsection

  @section('script')
  <script src={{ url('js/ckeditor.js') }}> </script>
  <script > 
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });
  </script>

<script>
  const imageCode= document.getElementById("imageCode");

  const tobase64=(file) => {
      return new Promise((resolve, reject) => {
          const fileReader=new FileReader();
          fileReader.readAsDataURL(file);

          fileReader.onload=()=>{
              resolve(fileReader.result);
          };

          fileReader.onerror=(error)=>{
              reject(error);
          };
      });
  };

  const uploadImage=async (event) => {
      const file =event.target.files[0];
      const base64=await tobase64(file);
      imageCode.value=base64;
  }

  //appel de fonction en change
  document.getElementById("selectImage").addEventListener("change",(e) =>{
      uploadImage(e);
  });


</script>

  @endsection


   