const div = document.querySelector('.image-community');
const imgamnestia = document.querySelector("#imgamnestia");

div.addEventListener("mouseover", function(event){
    
    div.innerHTML = `<video src="../video/Amnesia_ The Bunker - Announcement Trailer.mp4" muted autoplay class="img-commu touch touch2"></video>`;
})
div.addEventListener('mouseover', function(event){
    const video = div.querySelector('video');
    if(video=true){
        
        div.innerHTML = <img  id="imgamnestia" src="../img/The bunker.jfif" class="img-commu touch touch2" alt=""></img>;
    }
   
})
