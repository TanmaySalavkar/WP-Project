function changeProfile(photo){
    const file = photo.files[0];

    if (file){
        const reader = new FileReader();

        reader.onload=function(e){
            const profilePicture = document.getElementById('profile-photo');
            profilePicture.src=e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

let Name='John';
document.getElementById('Username').innerHTML="John";

