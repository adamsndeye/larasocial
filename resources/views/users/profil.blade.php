
@extends('layouts.app')

@section('title', '| Edit User')

@section('content')



<div class="container portfolio">
  <div class="row">
    <div class="col-md-12">
      <div class="heading">       
        <img src="https://image.ibb.co/cbCMvA/logo.png" />
      </div>
    </div>  
  </div>
  <div class="bio-info">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">

            <div class="bio-image">
          <?php if ($r4==true) {?> 
           
          
              <img  src="<?= $r4->file_url ;?>"  class="img-responsive" alt=""> 
              <br>  <br>  
              <a href="" class="btn btn-primary" >Modifier la photo</a>
           </div>
              <?php }else{  ?>
               
<div class="bio-image">
                 <img  src="images/avatar.png"  alt="Avatar"  > 
                 <br> <br>  

                  <a href="addImage.php?id=<?= $result->id ?>" class="btn btn-primary">Ajouter un photo de profil </a>
                  </div>
               <?php }  ?>
            
            <br><br> 
              
          </div>
        </div>  
      </div>
      <div class="col-md-6">
        <div class="bio-content">


          <h1> <?=  $result->prenom ;?> <?= $result->nom ;?></h1>
           <p><strong>Domaine: <?=  $result->domaine ;?></strong> </p>
            <p><strong>Niveau: <?=  $result->niveau ;?></strong> </p>
            <p><strong>Coordonnees</strong> Telephone:<?=  $result->telephone ;?>, Adresse <?=  $result->adresse ;?>,Email: <?=  $result->email ;?></p>

         
          <p></strong>Competence</strong>

        <?php foreach ($r2 as $competence):?>
        
       
      <tr>
         
        <td><span class="badge badge-pill badge-primary"><?=  $competence->libelle ;?> </span></td>
       
          
      </tr>
    
     <?php endforeach; ?>

   </p>
   
   
        </div>
      </div>
    </div>  
  </div>
</div>
@endsection