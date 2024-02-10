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

function updateProfile(){
    let Name=document.getElementById('Uname').value;
    window.location.replace('profile.html');
    document.getElementById('Username').innerHTML=Name;
}

